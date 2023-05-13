<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    {{-- Icons --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <x-rich-text-trix-styles />

</head>

<body class="font-sans text-gray-900 antialiased ">
    <div class="dark:bg-slate-900 xl:flex xl:flex-row ">
        <div>
            <img class="object-cover lvbuilding h-screen sm:w-screen" src="{{ asset('assets/withbgbuilding.jpg') }}" alt="LVCC Building">
        </div>
        <div class="absolute dark:bg-inherit mx-auto top-0 items-center pt-6 min-h-screen w-full flex flex-col sm:justify-center sm:pt-0 xl:static xl:bg-white xl:dark:bg-inherit xl:w-2/4">
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-slate-800 shadow-md overflow-hidden sm:rounded-lg xl:shadow-none">
                {{-- Logo --}}
                <div class="mx-auto items-center w-full flex flex-col sm:justify-center sm:pt-0">
                    <div>
                        <a href="/">
                            <x-application-logo container="flex" titlefluid="grid" logo="w-12 mx-2" title="font-bold text-base" subtitle="text-xs leading-tight" />
                        </a>
                    </div>
                </div>
                {{ $slot }}
            </div>
        </div>
    </div>
</body>

</html>