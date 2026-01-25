<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pelaporan SMK Bina Informatika</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased font-sans">
    {{-- Navigation --}}
    <nav id="navbar" class="bg-white fixed w-full z-20 top-0 start-0 border-b border-gray-200">
        <div id="navbarContent" class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <!-- Logo Section -->
            <a href="/" class="flex items-center">
                <img src="{{ asset('images/Logo.svg') }}" alt="Logo" class="w-12 h-12">
                <span class="text-black font-semibold text-2xl pl-2"></span>
            </a>

            <!-- Button Section -->
            <div class="flex md:order-2 space-x-3">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-4 py-2">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-[#129661] hover:text-[#1296618f] font-medium rounded-lg text-sm px-4 py-2">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-white bg-[#129661] hover:bg-[#1296618f] font-medium rounded-lg text-sm px-4 py-2">
                            Register
                        </a>
                    @endif
                @endauth
                
                <!-- Mobile menu button -->
                <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-gray-500 rounded-lg md:hidden hover:bg-gray-100" aria-controls="navbar-default" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>
            </div>

            <!-- Menu Items -->
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-default">
                <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-neutral-primary md:flex-row md:space-x-8 md:mt-0 md:border-0">
                    <li>
                        <a href="#" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-[#129661] md:p-0" aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#benefit" class="block py-2 px-3 text-[#12] rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#129661] md:p-0">Benefit</a>
                    </li>
                    <li>
                        <a href="" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#129661] md:p-0">Deposit</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>