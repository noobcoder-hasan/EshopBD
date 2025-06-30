<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Welcome to EShopBD - Sign in or register to explore our online store.">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Montserrat', 'Figtree', sans-serif; }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased bg-gradient-to-br from-indigo-100 via-blue-50 to-white min-h-screen">
  
    <nav class="bg-white/90 backdrop-blur-md shadow-md fixed top-0 left-0 w-full z-50" role="navigation" aria-label="Main navigation">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Left: Brand Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ url('/') }}" class="text-xl font-bold text-indigo-700 hover:text-indigo-900 transition-colors duration-200" aria-label="Go to EShopBD homepage">
                        EShopBD
                    </a>
                </div>

                <!-- Right: Navigation Links -->
                <div class="hidden sm:flex space-x-6">
                    <a href="{{ url('/') }}" class="text-gray-700 hover:text-indigo-600 font-medium transition-colors duration-200" aria-label="Go to Home">
                        Home
                    </a>
                    @if (Route::currentRouteName() === 'login')
                        <a href="{{ route('register') }}" class="text-gray-700 hover:text-indigo-600 font-medium transition-colors duration-200" aria-label="Go to Register">
                            Register
                        </a>
                    @elseif (Route::currentRouteName() === 'register')
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-indigo-600 font-medium transition-colors duration-200" aria-label="Go to Login">
                            Login
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </nav>


    <main class="pt-20 sm:pt-24 md:pt-28 flex flex-col items-center min-h-screen" role="main">
        <div class="mb-6">
            <a href="/">
                <x-application-logo class="w-20 sm:w-24 h-20 sm:h-24 fill-current text-indigo-500 drop-shadow-xl transition-transform duration-300 hover:scale-105" aria-label="EShopBD Logo" />
            </a>
        </div>

        <div class="w-full max-w-md sm:max-w-lg px-6 sm:px-8 py-6 sm:py-8 bg-white/70 shadow-2xl rounded-2xl sm:rounded-3xl backdrop-blur-md">
            <h1 class="text-2xl sm:text-3xl font-extrabold text-center text-indigo-800 mb-6 sm:mb-8">Welcome</h1>
            {{ $slot }}
        </div>
    </main>
</body>
</html>