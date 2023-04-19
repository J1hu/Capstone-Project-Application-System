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
    <div class="dark:bg-slate-900 xl:flex xl:flex-row ">
        <div class="fixed">
            <img class="object-cover lvbuilding h-screen sm:w-screen" src="{{ asset('assets/withbgbuilding.jpg') }}"
                alt="LVCC Building">
        </div>
        <div class="mx-auto py-6 w-fit flex justify-center items-center h-screen z-50">
            <div
                class="w-full sm:max-w-md mt-6 px-6 py-10 bg-white dark:bg-slate-800 shadow-md overflow-hidden sm:rounded-lg xl:shadow-none">
                {{-- Logo --}}
                <div class="mx-auto items-center w-full flex flex-col sm:justify-center sm:pt-0 mb-5">
                    <div>
                        <a href="/">
                            <x-application-logo container="flex" titlefluid="grid" logo="w-12 mx-2"
                                title="font-bold text-base" subtitle="text-xs leading-tight" />
                        </a>
                    </div>
                </div>
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <form method="POST" action="{{ route('admin.store') }}">
                    @csrf
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div>
                        <button type="submit" class="items-center px-4 py-3 bg-blue-500 dark:bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-300 uppercase tracking-widest hover:bg-blue-700 dark:hover:bg-blue-500 focus:bg-blue-900 dark:focus:bg-blue-900 active:bg-blue-900 dark:active:bg-blue-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-indigo-500 transition ease-in-out duration-150 my-5 w-full px-auto">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
