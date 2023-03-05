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
        {{-- Navigation --}}
        <div id="top">
            <x-guest-navigation classname="h-24 w-screen" login="bg-blue-900 text-white hover:bg-blue-700 hover:text-white"></x-guest-navigation>
        </div>
        {{-- Banner --}}
        <div class="h-screen bg-gradient-to-tr from-sky-500 to-blue-900 relative">
            <img class="object-cover lvbuilding h-screen lg:w-screen" src="{{ asset('assets/lvbuilding.png') }}" alt="LVCC Building">
            <div class="absolute top-20 left-5 right-10 w-auto text-slate-50 text-left md:left-10 lg:top-15 lg:left-20">
                <h1 class="title text-5xl font-black bg-sky-900 bg-opacity-70 my-5 p-2 md:bg-transparent md:text-8xl md:w-3/4 lg:w-2/3 xl:w-1/2">
                    STUDY NOW, PAY NEVER!
                </h1>
                <p class="bg-sky-900 bg-opacity-70 my-5 p-2 font-semibold md:w-2/3 lg:w-2/3 lg:bg-transparent xl:w-1/2">
                    La Verdad Christian College provides students a high quality and carefully defined educational program emphasizing Christian values, various skills and vast creative activities.
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
        {{-- Youtube --}}
        <div class="h-fit my-10 md:h-screen md:my-0">
            <div class="h-full grid grid-cols-1 gap-4 content-center w-auto text-center md:flex md:flex-row md:items-center md:align-middle md:my-auto md:mx-10">
                {{-- <div class="w-10 h-10 border-2 border-slate-300 float-left"></div> --}}
                <div class="p-2 md:p-0 md:basis-1/2 md:ml-5 lg:px-10 xl:px:24">
                    <h1 class="title text-3xl font-black text-sky-700 my-5 md:mt-0 lg:text-5xl">
                        WHY CHOOSE LA VERDAD?
                    </h1>
                    <p class="my-5 mx-10 font-semibold text-justify sm:mx-15 md:mx-0">
                        The La Verdad Christian College or LVCC is a private non-stock, non-sectarian educational institution established in Apalit, Pampanga, Philippines. It is the first private school in the Philippines that grants scholarship programs to deserving students by providing tuition-free education and no miscellaneous fees. It is one of the best schools in Pampanga, up to regional and national levels. LVCC aims to be the frontrunner in providing academic excellence and morally upright principles.
                    </p>
                </div>
                <div class="mx-auto text-center flex items-center justify-center w-5/6 h-72 sm:h-80 md:flex md:order-first md:basis-1/2 md:h-64 md:w-9/12 lg:h-96">
                    <iframe class="w-full h-full mx-auto" src="https://www.youtube.com/embed/_EjOK8lFvag" title="ALAMIN: PAANO MAKAPAGAARAL NG LIBRE SA LA VERDAD CHRISTIAN COLLEGE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
        {{-- Full Scholarship --}}
        <div class="h-fit lg:h-96 bg-indigo-700">
            <div class="h-full relative grid grid-cols-1 gap-4 content-center w-auto text-center px-5 md:px-10">
                <div class="mt-10 border-dashed border-slate-300 rotate-6 w-8 h-8 border-2 sm:w-10 sm:h-10 md:w-12 md:h-12 md:border-4 lg:w-14 lg:h-14 lg:mt-24 xl:ml-14"></div>
                <div class="mt-7 absolute right-10 float-right border-slate-300 rotate-45 w-5 h-5 border-2 sm:w-7 sm:h-7 md:w-9 md:h-9 md:border-4 lg:w-12 lg:h-12 lg:mt-16 xl:mr-14"></div>
                <h1 class="title text-5xl font-black text-center text-white md:my-5 md:mt-0 lg:text-5xl">
                    LVCC FULL SCHOLARSHIP GRANT
                </h1>
                <p class="text-white flex mx-10 text-center items-center justify-center sm:mx-15 md:my-5 md:mx-0 lg:px-40 xl:px-72">
                    All applicants who pass the scholarship examination with at least 75% of the highest possible score, pass the academic interview and proven to be economically incapacitated
                </p>
                <div class="mb-10 border-double border-slate-300 rotate-45 w-9 h-9 border-4 sm:w-10 sm:h-10 md:w-12 md:h-12 md:border-6 lg:w-14 lg:h-14 lg:mb-24 lg:ml-10"></div>
                <div class="absolute bottom-5 right-10 border-dotted border-slate-300 rotate-12 w-5 h-5 border-2 sm:w-7 sm:h-7 md:w-9 md:h-9 lg:border-4 lg:w-12 lg:h-12 lg:mb-16 lg:mr-14"></div>
            </div>
        </div>
    </body>
</html>
