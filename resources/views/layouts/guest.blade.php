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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="bg-dots-lighter bg-gray-100 font-poppins text-gray-900 antialiased dark:bg-[#111111] dark:text-white">

        {{-- <body
        class="bg-gray-100 font-poppins text-gray-900 antialiased dark:bg-gradient-to-b dark:from-[#222222] dark:via-[#1a1a1a] dark:to-[#080808] dark:text-white"> --}}
        <div class="flex min-h-screen flex-col">
            @include('layouts.guest-navigation')

            <main>
                {{ $slot }}
            </main>
            <div class="mt-auto bg-[#181818]">
                @include('layouts.footer')
            </div>
        </div>
    </body>

</html>
