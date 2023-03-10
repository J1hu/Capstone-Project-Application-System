<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased ">
    <div class="xl:flex xl:flex-row">
        <div>
            <img class="object-cover lvbuilding h-screen sm:w-screen" src="{{ asset('assets/withbgbuilding.jpg') }}"
                alt="LVCC Building">
        </div>
        <div
            class="absolute mx-auto top-0 items-center pt-6 min-h-screen w-full flex flex-col sm:justify-center sm:pt-0 xl:static xl:bg-white xl:w-2/4 dark:bg-gray-900">
            <div
                class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg xl:shadow-none">
                {{-- Logo --}}
                <div class="mx-auto items-center w-full flex flex-col sm:justify-center sm:pt-0">
                    <div>
                        <a href="/">
                            <x-application-logo />
                        </a>
                    </div>
                    <div class="my-3 sm:my-5">
                        <p class="title font-bold sm:text-lg md:text-xl">
                            SCHOLARSHIP APPLICATION SYSTEM
                        </p>
                    </div>
                </div>
                {{ $slot }}
            </div>
        </div>
    </div>
</body>

</html>
