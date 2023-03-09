<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LVCC Scholarship Application System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700&family=Roboto:wght@500;700;900&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="antialiased snap-none overflow-x-hidden">
    {{-- Navigation --}}
    <div id="top">
        <x-guest-navigation classname="h-24 w-screen" login="text-white hover:text-white">
        </x-guest-navigation>
    </div>
