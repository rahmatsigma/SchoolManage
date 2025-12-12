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
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-cover bg-center relative" 
             style="background-image: url('https://wallpapers.com/images/featured/school-aesthetic-8nx6k00gogj55fe8.jpg');">
            
            <div class="absolute inset-0 bg-gray-900/60 backdrop-blur-sm z-0"></div>

            <div class="relative z-10 mb-6">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-white drop-shadow-lg" />
                </a>
            </div>

            <div class="relative z-10 w-full sm:max-w-md mt-6 px-8 py-10 bg-white/10 border border-white/20 shadow-2xl overflow-hidden sm:rounded-2xl backdrop-blur-xl">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>