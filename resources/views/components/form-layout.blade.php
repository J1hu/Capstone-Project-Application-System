<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-blue-200">
    <div class="relative dark:bg-gray-900">
        <nav x-data="{ open: false }"
            class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 fixed px-5 py-2 top-0 w-full z-50">
            <!-- Primary Navigation Menu -->
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <x-application-logo container="flex" titlefluid="grid" logo="w-12 mx-2" title="font-bold text-base"
                        subtitle="text-xs leading-tight" />
                </div>
            </div>
        </nav>
        {{ $slot }}
    </div>
</body>
</html>
