<?php

namespace App\Http\Controllers;

use App\Helpers\ServerEvent;
use App\Models\Chat;
use App\Models\Embedding;
use App\Models\Message;
use App\Service\QueryEmbedding;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{

    protected QueryEmbedding $query;

    public function __construct(QueryEmbedding $query)
    {
        $this->query = $query;
    }

    public function index()
    {
        return view('chat', [
            'chats' => Chat::with('embed_collection')->orderBy('created_at', 'desc')->get()
        ]);
    }

    public function show($id)
    {
        $chat = Chat::with('embed_collection')->find($id);
        return view('conversation', [
            'chat' => $chat,
            'embed_collection' => $chat->embed_collection->toArray(),
            'messages' => Message::query()->where('chat_id', $chat->id)->get()
        ]);
    }

    public function store(Request $request)
    {
        return response()->stream(function () use ($request) {
            try {
                $chat_id = $request->chat_id;
                $chat = Chat::with('embed_collection')->find($chat_id);
                $question = $request->question;
                $queryVectors = $this->query->getQueryEmbedding($question);
    
                // Fetch all embeddings for the given embed collection
                $embeddings = Embedding::where('embed_collection_id', $chat->embed_collection->id)->get();
    
                // Calculate similarity scores for each embedding
                $similarities = $embeddings->map(function ($embedding) use ($queryVectors) {
                    $embeddingVector = json_decode($embedding->embedding, true);
                    // Calculate similarity between $queryVectors and $embeddingVector
                    // Implement your similarity calculation logic here
                    $similarity = $this->calculateSimilarity($queryVectors, $embeddingVector);
                    return ['text' => $embedding->text, 'similarity' => $similarity];
                });
    
                // Sort embeddings by similarity scores
                $sortedEmbeddings = $similarities->sortByDesc('similarity')->take(2);
    
                // Extract text from sorted embeddings
                $context = $sortedEmbeddings->pluck('text')->implode("\n");
    
                // Send the context to the client
                $stream = $this->query->askQuestionStreamed($context, $question);
                $resultText = "";
                foreach ($stream as $response) {
                    $text = $response->choices[0]->delta->content;
                    $resultText .= $text;
                    if (connection_aborted()) {
                        break;
                    }
                    ServerEvent::send($text, "");
                }
    
                // Insert messages into the database
                Message::insert([
                    [
                        'chat_id' => $chat_id,
                        'role' => Message::ROLE_USER,
                        'content' => $question
                    ],
                    [
                        'chat_id' => $chat_id,
                        'role' => Message::ROLE_BOT,
                        'content' => $resultText
                    ]
                ]);
            } catch (Exception $e) {
                Log::error($e);
                ServerEvent::send("");
            }
        }, 200, [
            'Cache-Control' => 'no-cache',
            'Connection' => 'keep-alive',
            'X-Accel-Buffering' => 'no',
            'Content-Type' => 'text/event-stream',
        ]);
    }
    
    
    private function calculateSimilarity($vector1, $vector2)
    {
        // Ensure that the vectors are JSON-encoded strings
        $vector1 = is_array($vector1) ? json_encode($vector1) : $vector1;
        $vector2 = is_array($vector2) ? json_encode($vector2) : $vector2;

        // Decode the JSON-encoded vectors
        $vector1Array = json_decode($vector1, true);
        $vector2Array = json_decode($vector2, true);

        // Calculate the dot product
        $dotProduct = 0;
        foreach ($vector1Array as $key => $value) {
            $dotProduct += $value * $vector2Array[$key];
        }

        // Calculate the magnitudes of the vectors
        $magnitude1 = sqrt(array_sum(array_map(function ($x) { return $x * $x; }, $vector1Array)));
        $magnitude2 = sqrt(array_sum(array_map(function ($x) { return $x * $x; }, $vector2Array)));

        // Calculate the cosine similarity
        $similarity = $dotProduct / ($magnitude1 * $magnitude2);

        return $similarity;
    }
}
