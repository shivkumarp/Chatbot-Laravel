<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ChatifySite</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <!-- <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

</head>

<body class="bg-black h-screen overflow-hidden">

    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="flex h-full">
            <!-- Sidebar -->
            <aside class="w-[100px] text-white border-r border-gray-500 flex flex-col justify-between p-2">

                <!-- Top section: Menu icons -->
                <div class="space-y-6 mt-8">
                    <!-- Home Icon -->
                    <div class="w-full flex justify-center items-center cursor-pointer group">
                        <i class="fa-solid fa-house text-2xl"></i>
                    </div>

                    <!-- Data Icon -->
                    <div class="w-full flex justify-center items-center cursor-pointer group">
                        <i class="fa-solid fa-book-open text-2xl"></i>
                    </div>

                    <!-- Create Bot Icon -->
                    <div class="w-full flex justify-center items-center cursor-pointer group">
                        <i class="fa-solid fa-robot text-2xl"></i>
                    </div>
                </div>

                <!-- Bottom section: Profile and Settings -->
                <div class="space-y-6 mb-8">
                    <!-- Settings Icon -->
                    <div class="w-full flex justify-center items-center cursor-pointer group">
                        <i class="fa-solid fa-gear text-2xl"></i>
                    </div>

                    <!-- Profile Icon -->
                    <div class="w-full flex justify-center items-center cursor-pointer group">
                        <div class="w-8 h-8 bg-gray-500 rounded-full"></div>
                    </div>
                </div>
            </aside>

            <!-- Main Content Area -->
            <div class="w-full">
                <!-- Content goes here -->
            </div>
        </div>


        <!-- Main Content Area -->
        <div class="flex-1 h-full flex flex-col">
            <!-- Header -->
            <header class="w-full h-20 flex items-center justify-between px-6">
                <!-- Left Section: Workspace Name (Dropdown) -->
                <div class="relative">
                    <!-- Workspace Name -->
                    <div class="text-white text-2xl font-semibold cursor-pointer group">
                        <span>In bot</span>

                        <!-- Dropdown Menu for Workspace -->
                        <div
                            class="absolute left-0 mt-2 hidden bg-white text-black shadow-lg rounded-lg group-hover:block">
                            <ul class="p-2 space-y-2">
                                <li><a href="#"
                                        class="block px-4 py-2 text-sm hover:bg-gray-100 rounded-md text-nowrap">Workspace
                                        Option
                                        1</a></li>
                                <li><a href="#"
                                        class="block px-4 py-2 text-sm hover:bg-gray-100 rounded-md text-nowrap">Workspace
                                        Option
                                        2</a></li>
                                <li><a href="#"
                                        class="block px-4 py-2 text-sm hover:bg-gray-100 rounded-md text-nowrap">Workspace
                                        Option
                                        3</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>



            <!-- Main Section Content -->
            <section class="w-full flex-1 overflow-auto p-5 flex flex-col md:flex-row gap-4">

                <!-- First Div: Takes up remaining space on large screens -->
                {{-- <div class="w-full md:flex-1 bg-neutral-800 border border-gray-500 rounded-lg">
                    <!-- Content for the first div goes here -->
                    <div>

                    </div>
                </div> --}}

                <div class="w-full flex flex-1 gap-4 items-center justify-center">
                    <div class="w-[calc(100%-450px)] h-full p-8 bg-neutral-800 border border-gray-500 rounded-lg">

                        <!-- Title Section -->
                        <h2 class="text-3xl font-bold text-white mb-8">
                            Try asking your new AI employee a few questions! 🚀
                        </h2>

                        <!-- Suggestions Section -->
                        <div class="space-y-4">
                            <div class="text-gray-300 p-4">
                                Tell me about your organization!
                            </div>
                            <div class="text-gray-300 p-4">
                                What services do you offer?
                            </div>
                            <div class="text-gray-300 p-4">
                                Can you tell me more about your pricing?
                            </div>
                            <div class="text-gray-300 p-4">
                                How does your platform integrate with existing tools?
                            </div>
                            <div class="text-gray-300 p-4">
                                How can you help reduce costs for my business?
                            </div>
                            <div class="text-gray-300 p-4">
                                Can you show me some case studies or examples?
                            </div>
                            <div class="text-gray-300 p-4">
                                What is the expected return on investment (ROI) when using your platform?
                            </div>
                            <div class="text-gray-300 p-4">
                                Do you offer any free trials or demos?
                            </div>
                        </div>

                        <!-- Call-to-Action Button -->
                        <div class="text-center mt-8">
                            <button
                                class="bg-[#0071d9] text-white px-6 py-3 rounded-lg hover:bg-[#005bb5] transition duration-300">
                                Test Your Bot
                            </button>
                        </div>

                    </div>

                    <!-- Second Div: Fixed width on medium screens and above, full width on smaller screens -->
                    <div class="w-[450px] h-full shadow-md">
                        <div class="w-full h-full flex justify-end bg-neutral-800 border border-gray-500 rounded-lg">
                            <div class="w-full h-full flex flex-col">
                                <div class="flex-1 overflow-auto space-y-4 p-5">
                                    <div class="space-y-4" id="messages">
                                        @foreach ($messages as $message)
                                            @if ($message->role == 'user')
                                                <div class="ml-16 flex justify-end">
                                                    <div
                                                        class="bg-[#0071d9] px-4 py-2 rounded-lg min-w-20 rounded-br-none">
                                                        <p class="text-white">{{ $message->content }}</p>
                                                    </div>
                                                </div>
                                            @else
                                                <div
                                                    class="bg-[#3e4649] px-4 py-2 rounded-lg mr-16 min-w-20 rounded-bl-none">
                                                    <p class="text-white">{{ $message->content }}</p>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Form Section -->
                                <div class="p-3">
                                    <form class="flex gap-2" id="form-question">
                                        @csrf
                                        <input type="hidden" name="_chat_id" value="{{ $chat->id }}" />
                                        <div
                                            class="flex border border-gray-500 rounded-full w-full placeholder:bg-gray-500 text-gray-500 p-2 items-center">
                                            <input placeholder="Ask any question!"
                                                class="w-full p-3 focus:outline-none bg-transparent" name="question" />
                                            <button id="btn-submit-question" type="submit"
                                                class="bg-[#0071d9] rounded-full h-[45px] w-[55px] mr-1.5 flex items-center justify-center">
                                                <i class="fa-solid fa-paper-plane text-white"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

            </section>
        </div>
    </div>


</body>

</html>
