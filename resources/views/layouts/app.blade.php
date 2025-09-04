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
        <!-- Sidebar -->
        <aside :class="{'-translate-x-full': !open}" class="fixed top-0 left-0 z-40 w-64 h-screen transform transition-transform bg-white border-r sm:translate-x-0" aria-label="Sidebar">
            @include('layouts.navigation')
        </aside>

        <!-- Main content -->
        <div class="min-h-screen bg-gray-100 sm:ml-64">
            <header class="bg-white shadow flex items-center justify-between p-4 sm:justify-end">
                <button @click="open = !open" class="sm:hidden text-gray-700 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
                </button>
                @isset($header)
                    <div class="text-gray-800 text-lg">{{ $header }}</div>
                @endisset
            </header>
            <main class="p-4">
                {{ $slot }}
            </main>
        </div>

        <!-- Overlay -->
        <div x-show="open" class="fixed inset-0 z-30 bg-black opacity-25 sm:hidden" @click="open = false"></div>
    </body>
</html>
