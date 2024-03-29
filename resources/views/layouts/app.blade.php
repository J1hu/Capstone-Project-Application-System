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

    {{-- Animations --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Animations -->
    <script type="text/javascript" src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <!-- External Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="/script.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <x-rich-text-trix-styles />

    <!-- Datatables -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>

<body class="antialiased bg-gray-100">
    <style>
        /*custom styling */
        #myTable_wrapper {
            padding: 10px;
        }

        #myTable_filter input[type="search"] {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 6px;
        }

        #myTable_length select {
            border: 1px solid #ccc;
            border-radius: 4px;
            padding-left: 5px;
            padding-right: 30px;
        }

        .odd {
            background-color: #fff;
        }

        .even {
            background-color: #f8f8f8;
        }

        .resident-row:hover {
            background-color: #e5f7f7;
        }
    </style>
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
    @yield('scripts')
</body>

</html>