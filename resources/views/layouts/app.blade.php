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
    <body class="font-sans antialiased bg-gradient-to-br from-indigo-100 via-blue-50 to-white min-h-screen">
        <div class="min-h-screen">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white/70 shadow-lg backdrop-blur-md rounded-b-2xl sticky top-0 z-20">
                    <div class="max-w-7xl mx-auto py-8 px-6 sm:px-8 lg:px-12 flex items-center">
                        <h1 class="text-3xl font-extrabold text-indigo-800 tracking-tight">{{ $header }}</h1>
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="max-w-7xl mx-auto mt-10 px-4 sm:px-8 lg:px-12">
                <div class="bg-white/80 rounded-3xl shadow-2xl p-10 min-h-[60vh] transition-all duration-300">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </body>
</html>
