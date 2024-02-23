<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Voting App</title>

        <!-- Fonts -->
        {{-- <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

        @livewireStyles

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans bg-gray-background text-gray-900 text-sm antialiased">
        <header class="flex flex-col md:flex-row items-center justify-between px-8 py-2">
            <a href="#"><img src="{{ asset('image/logo-dark.svg') }}" alt="logo"></a>
            <div class="flex items-center mt-2 md:mt-0">
                @if (Route::has('login'))
                    <div class="p-6 text-right">
                        @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                        @else
                            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
                <a href="#">
                    <img src="https://gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y" alt="avatar" class="h-10 w-10 rounded-full" />
                </a>
            </div>
        </header>

        <main class="container mx-auto max-w-custom flex flex-col md:flex-row">
            <div class="w-70 md:mr-5 mx-auto md:mx-0">
                <div class="border-2 rounded-xl bg-white mt-16 md:sticky md:top-8"
                    style="
                    border-image-source: linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0));
                    background-image: linear-gradient(to bottom, #ffffff, #ffffff), linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0));
                    background-origin: border-box;
                    background-clip: content-box, border-box;
                    "
                >
                    <div class="text-center px-6 py-2 pt-8">
                        <h3 class="font-semibold text-base">Add an idea</h3>
                        <p class="text-xs mt-4">
                            @auth
                                Let us know what you would like and we'll take a look over!
                            @else
                                Please login to create an idea.
                            @endauth
                        </p>
                    </div>

                    @auth
                        <livewire:create-idea />
                    @else
                        <div class="my-6 mx-4 text-center flex items-center justify-between space-x-3">
                            <a
                                href="{{ route('login') }}"
                                class="block w-2/3 py-2 text-xs bg-blue text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-200 ease-in-out"
                                >
                                    <span class="uppercase">Login</span>
                            </a>
                            <a
                                href="{{ route('register') }}"
                                class="block py-2 w-2/3 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-200 ease-in-out uppercase"
                            >
                                Sign Up
                            </a>
                        </div>
                    @endauth

                </div>
            </div>

            <div class="w-full px-2 md:px-0 md:w-700">
                <nav class="flex items-center justify-between text-xs">
                    <ul class="hidden md:flex uppercase font-semibold border-b-4 pb-3 space-x-10">
                        <li><a href="#" class="border-b-4 border-blue pb-3">All Ideas (87)</a></li>
                        <li><a href="#" class="text-gray-400 transition duration-500 ease-in border-b-4 pb-3 hover:border-blue">Considering (87)</a></li>
                        <li><a href="#" class="text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">In Progress (87)</a></li>
                    </ul>

                    <ul class="hidden md:flex uppercase font-semibold border-b-4 pb-3 space-x-10">
                        <li><a href="#" class="text-gray-400 transition duration-500 ease-in border-b-4 pb-3 hover:border-blue">Implemented (87)</a></li>
                        <li><a href="#" class="text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">Closed (87)</a></li>
                    </ul>
                </nav>

                <div class="mt-8">
                    {{ $slot }}
                </div>

            </div>
        </main>

        {{-- @livewireScripts --}}
    </body>
</html>
