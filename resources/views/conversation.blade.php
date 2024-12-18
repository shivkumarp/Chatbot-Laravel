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

        <aside class="w-[80px] text-white border-r border-gray-500 flex flex-col justify-between bg-neutral-800 h-full">

            <!-- Top section: Menu icons -->
            <div class="space-y-6 mt-16">
                <!-- Home Icon -->
                <div class="w-full flex justify-center items-center cursor-pointer group">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>

                </div>

                <!-- Data Icon -->
                <div class="w-full flex justify-center items-center cursor-pointer group">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                    </svg>

                </div>

                <!-- Create Bot Icon -->
                <div class="w-full flex justify-center items-center cursor-pointer group">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" />
                    </svg>

                </div>
            </div>

            <!-- Bottom section: Profile and Settings -->
            <div class="space-y-6 mb-8">
                <!-- Settings Icon -->
                <div class="w-full flex justify-center items-center cursor-pointer group">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4.5 12a7.5 7.5 0 0 0 15 0m-15 0a7.5 7.5 0 1 1 15 0m-15 0H3m16.5 0H21m-1.5 0H12m-8.457 3.077 1.41-.513m14.095-5.13 1.41-.513M5.106 17.785l1.15-.964m11.49-9.642 1.149-.964M7.501 19.795l.75-1.3m7.5-12.99.75-1.3m-6.063 16.658.26-1.477m2.605-14.772.26-1.477m0 17.726-.26-1.477M10.698 4.614l-.26-1.477M16.5 19.794l-.75-1.299M7.5 4.205 12 12m6.894 5.785-1.149-.964M6.256 7.178l-1.15-.964m15.352 8.864-1.41-.513M4.954 9.435l-1.41-.514M12.002 12l-3.75 6.495" />
                    </svg>

                </div>

                <div class="relative flex justify-center group">
                    <!-- Profile Icon -->
                    <img id="avatarButton" type="button" class="w-10 h-10 rounded-full cursor-pointer"
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTv1Tt9_33HyVMm_ZakYQy-UgsLjE00biEArg&s" alt="User dropdown">

                    
                        <!-- Dropdown menu -->
                    <div id="userDropdown"
                        class="z-10 absolute left-full bottom-5 -ml-3 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600 hidden group-hover:block">
                        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                            <div>Bonnie Green</div>
                            <div class="font-medium truncate">name@flowbite.com</div>
                        </div>
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="avatarButton">
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                            </li>
                        </ul>
                        <div class="py-1">
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                out</a>
                        </div>
                    </div>
                </div>


            </div>
        </aside>


        <!-- Main Content Area -->
        <div class="flex-1 h-full flex flex-col">
            <!-- Header -->
            <header class="w-full h-20 flex items-center justify-between px-6">
                <!-- Left Section: Workspace Name (Dropdown) -->
                <div class="relative">
                    <!-- Workspace Name -->
                    <div class="text-white text-xl font-semibold cursor-pointer group">
                        <div class="flex items-center justify-center hover:bg-neutral-800 py-1 px-4 rounded-lg">
                            <span class="mr-2">xyoraa</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mt-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </div>



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
                                                class="w-full p-3 focus:outline-none bg-transparent"
                                                name="question" />
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
