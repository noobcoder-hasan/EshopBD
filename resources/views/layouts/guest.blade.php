<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

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
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-10 sm:pt-0">
            <div class="mb-4">
                <a href="/">
                    <x-application-logo class="w-24 h-24 fill-current text-indigo-500 drop-shadow-xl transition-transform duration-300 hover:scale-105" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-2 px-8 py-8 bg-white/70 shadow-2xl rounded-3xl backdrop-blur-md transition-all duration-300">
                <h1 class="text-3xl font-extrabold text-center text-indigo-800 mb-8 tracking-tight">Welcome</h1>
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
