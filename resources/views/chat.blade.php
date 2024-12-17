<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ChatifySite</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <!-- <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" /> -->
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

</head>

<body class="bg-black text-white font-sans antialiased">

    <!-- Main Section -->
    <section class="flex items-center justify-center min-h-screen p-6">
        <div class="w-full max-w-5xl p-10 bg-neutral-800 border border-gray-600 rounded-lg shadow-lg">

            <!-- Header -->
            <div class="text-center mb-8">
                <p class="max-w-2xl mx-auto mt-2 text-gray-300 lg:text-lg">
                    Enter a website URL below to scrape its content and save the data effortlessly.
                </p>
            </div>

            <!-- Conversation List -->
            <div class="max-w-3xl mx-auto">
                <div class="relative flex flex-col bg-neutral-900 shadow-lg p-6 space-y-6 rounded-2xl">

                    <!-- Loop: Replace with dynamic backend loop -->
                    @foreach ($chats as $chat)
                        <div class="flex items-center justify-between">
                            <!-- Icon + Content -->
                            <div class="flex items-center gap-3">
                                <!-- Icon -->
                                <div class="w-8 h-8 flex items-center justify-center bg-[#0071d9] rounded-full">
                                    <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 19l-7-7 7-7" />
                                    </svg>
                                </div>
                                <!-- Content -->
                                <div>
                                    <p class="text-gray-300 text-sm">
                                        {{ $chat->embed_collection->created_at->diffForHumans() }}
                                    </p>
                                    <p class="text-white font-medium hover:underline">
                                        <a href="{{ route('chat.show', $chat->id) }}">
                                            {{ $chat->embed_collection->name }}
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <!-- Arrow -->
                            <div>
                                <svg class="w-6 h-6 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </div>
                        <hr class="border-gray-700" />
                    @endforeach

                    <!-- Progress Text -->
                    <p id="progress-text" class="text-gray-400 text-sm mt-2"></p>

                    <!-- URL Submission Form -->
                    <form class="flex gap-3 mt-4" id="form-submit-link">
                        @csrf
                        <input placeholder="Paste any link..."
                            class="w-full p-3 bg-neutral-800 text-gray-300 rounded-md border border-gray-700 focus:ring-2 focus:ring-[#0071d9] focus:outline-none"
                            name="link" />
                        <button id="btn-submit-indexing" type="submit"
                            class="flex items-center gap-2 px-4 py-2 bg-[#0071d9] hover:bg-[#0070d9ec] text-white rounded-md shadow transition duration-300">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Submit</span>
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </section>
</body>

</html>
