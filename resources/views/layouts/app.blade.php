<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="fixed inset-0 z-[-1]">
             <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQasrohn6waSPvBhnI0SW7XCG9zG6qDhu_KjQ&s" 
                  class="w-full h-full object-cover" alt="Background">
             <div class="absolute inset-0 bg-gradient-to-br from-gray-900/80 via-gray-900/60 to-gray-800/80 backdrop-blur-sm"></div>
        </div>

        <div class="min-h-screen">
            @include('layouts.navigation')

            @isset($header)
                <header class="bg-white/10 backdrop-blur-md shadow-sm border-b border-white/10">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <h2 class="font-semibold text-xl text-white leading-tight">
                            {{ $header }}
                        </h2>
                    </div>
                </header>
            @endisset

            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>