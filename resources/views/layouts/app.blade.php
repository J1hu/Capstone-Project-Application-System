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

    {{-- Icons --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <x-rich-text-trix-styles />

</head>

<body class="antialiased bg-gray-100">
    <div class="relative dark:bg-gray-900">
        @include('layouts.navigation')
        @include('layouts.sidenavigation')

        <!-- Page Content -->
        <main class="right-0 py-6 px-4 sm:px-6 lg:px-8 w-4/5 absolute top-20">
            <!-- Page Heading -->
            @if (isset($header))
            <header>
                <div class="max-w-7xl mx-auto grid grid-cols-2">
                    {{ $header }}
                </div>
            </header>
            @endif
            {{ $slot }}
        </main>
    </div>
</body>

</html>