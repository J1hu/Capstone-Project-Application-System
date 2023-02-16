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
    <body class="antialiased snap-none overflow-x-hidden">
        <div id="top">
            <x-guest-navigation classname="h-24 w-screen" login="bg-blue-900 text-white hover:bg-blue-700 hover:text-white"></x-guest-navigation>
        </div>
        <div class="h-screen bg-gradient-to-tr from-sky-500 to-blue-900 relative">
            <img class="object-cover lvbuilding h-screen lg:w-screen" src="{{ asset('assets/lvbuilding.png') }}" alt="LVCC Building">
            <div class="absolute top-20 lg:top-10 left-5 md:left-10 lg:left-20 right-10 w-auto text-slate-50 text-left">
                <h1 class="title text-5xl font-black bg-sky-900 bg-opacity-70 my-5 p-2 md:bg-transparent md:text-8xl md:w-3/4 lg:w-2/3 xl:w-1/2">
                    STUDY NOW, PAY NEVER!
                </h1>
                <p class="bg-sky-900 bg-opacity-70 my-5 p-2 md:w-2/3 lg:w-2/3 xl:w-1/2 font-semibold lg:bg-transparent">
                    La Verdad Christian School provides students a high quality and carefully defined educational program emphasizing Christian values, various skills and vast creative activities.
                </p>
                <div class="text-center flex items-center justify-center md:justify-start">
                    <a href="{{ route('login') }}">
                        <div class="w-auto text-center py-2 px-10 font-bold rounded-sm text-sm bg-white text-sky-700 hover:bg-blue-700 hover:text-white">
                            APPLY FOR SCHOLARSHIP
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>
