<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      x-data="{ dark: localStorage.getItem('dark') === 'true' }"
      :class="{ 'dark': dark }"
      x-init="$watch('dark', val => localStorage.setItem('dark', val))">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- This prevents the "Flash of Unrendered Content" on page load -->
    <script>
        if (localStorage.getItem('dark') === 'true') {
            document.documentElement.classList.add('dark');
        }
    </script>
    
    <!-- Tailwind & JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 dark:bg-gray-900"> <!-- This now serves as a fallback only -->

    <!-- App wrapper that controls transitions + layout -->
    <div class="min-h-screen flex flex-col transition-colors duration-300 ease-in-out text-gray-800 dark:text-gray-100">

        <x-navbar :showCreate="$showCreate ?? false" />

        <main class="my-10 px-6 py-12 flex-grow">
            @yield('content')
        </main>

        <footer class="bg-gray-200 dark:bg-gray-800 transition-colors duration-300">
            <x-footer />
        </footer>

    </div>
</body>
</html>