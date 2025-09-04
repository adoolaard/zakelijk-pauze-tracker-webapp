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
    <body class="font-sans antialiased" x-data="{ open: false }">
        <div class="min-h-screen bg-gray-100 flex">
            <!-- Mobile menu -->
            <div x-show="open" class="sm:hidden">
                <div class="fixed inset-0 z-40 flex">
                    <div class="fixed inset-0 bg-black bg-opacity-25" @click="open=false"></div>
                    <nav class="relative w-64 bg-gray-800 h-full">
                        @include('layouts.navigation')
                    </nav>
                </div>
            </div>

            <!-- Sidebar -->
            <nav class="hidden sm:flex sm:flex-col sm:w-64 sm:h-screen bg-gray-800">
                @include('layouts.navigation')
            </nav>

            <!-- Content -->
            <div class="flex-1 flex flex-col">
                <header class="bg-white shadow flex items-center justify-between p-4">
                    <button @click="open = true" class="sm:hidden text-gray-700 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
                    </button>
                    @isset($header)
                        <div class="text-gray-800 text-lg">{{ $header }}</div>
                    @endisset
                </header>
                <main class="p-4 flex-1">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
