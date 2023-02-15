<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LVCC Scholarship Application System</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700&family=Roboto:wght@500;700;900&display=swap" rel="stylesheet">
        @vite('resources/css/app.css')
    </head>
    <body class="antialiased">
        <div id="top">
            <x-guest-navigation classname="h-24 w-screen bg-blue-800 text-white" login="bg-white text-blue-900 hover:bg-blue-500"></x-guest-navigation>
        </div>
    </body>
</html>
