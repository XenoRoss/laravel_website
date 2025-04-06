<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', 'Laravel'))</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <!-- Pull in Tailwind & the JS build scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100 dark:bg-gray-900 min-h-screen flex flex-col">
        <!-- Main site wrapper -->    

        <x-navbar :showCreate="$showCreate ?? false"/> <!-- This is a Blade component for the navigation bar -->
        
        <main class="my-10 px-6 py-12 flex-grow">
            @yield('content') <!-- This is where the page view content gets injected -->
        </main>
        
        <footer class="bg-gray-200 dark:bg-gray-800 min-h-32">
            <x-footer />
        </footer>
    </body>
    
</html>