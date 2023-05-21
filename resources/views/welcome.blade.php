<x-body>
{{-- Banner --}}
<div class="h-screen bg-gradient-to-tr from-sky-500 to-blue-900 relative">
    <img class="object-cover lvbuilding h-screen lg:w-screen" src="{{ asset('assets/lvbuilding.png') }}"
        alt="LVCC Building">
    <div
        class="absolute top-20 p-5 left-5 right-10 bg-white bg-opacity-80 text-blue-800 text-left md:w-3/4 lg:w-2/3 xl:w-1/2 md:left-10 lg:top-15 lg:left-20">
        <h1 class="title text-5xl font-black sm:text-6xl md:text-7xl lg:text-8xl">
            STUDY NOW, <br /> PAY NEVER!
        </h1>
        <p class="my-5 p-2 text-lg font-semibold text-slate-900 sm:text-xl">
            La Verdad Christian College provides students a high quality and carefully defined educational program
            emphasizing Christian values, various skills and vast creative activities.
        </p>
        <div class="text-center flex items-center justify-center sm:justify-start">
            <a href="{{ route('register') }}">
                <div
                    class="w-auto text-center py-2 px-10 font-bold rounded-sm text-sm text-white transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-blue-700 duration-300 hover:text-white">
                    APPLY FOR SCHOLARSHIP
                </div>
            </a>
        </div>
    </div>
</div>
{{-- Youtube --}}
<div class="h-fit my-10 md:h-screen md:my-0">
    <div
        class="h-full grid grid-cols-1 gap-4 content-center w-auto text-center md:flex md:flex-row md:items-center md:align-middle md:my-auto md:mx-10">
        {{-- <div class="w-10 h-10 border-2 border-slate-300 float-left"></div> --}}
        <div class="p-2 md:p-0 md:basis-1/2 md:ml-5 lg:px-10 xl:px:24">
            <h1 class="title text-3xl font-black text-sky-700 my-5 md:mt-0 md:text-4xl lg:text-5xl">
                WHY CHOOSE LA VERDAD?
            </h1>
            <p class="my-5 mx-10 font-semibold text-justify sm:mx-15 md:mx-0">
                The La Verdad Christian College or LVCC is a private non-stock, non-sectarian educational
                institution established in Apalit, Pampanga, Philippines. It is the first private school in the
                Philippines that grants scholarship programs to deserving students by providing tuition-free
                education and no miscellaneous fees. It is one of the best schools in Pampanga, up to regional and
                national levels. LVCC aims to be the frontrunner in providing academic excellence and morally
                upright principles.
            </p>
        </div>
        <div
            class="mx-auto text-center flex items-center justify-center w-5/6 h-72 sm:h-80 md:flex md:order-first md:basis-1/2 md:h-64 md:w-9/12 lg:h-96">
            <iframe class="w-full h-full mx-auto" src="https://www.youtube.com/embed/_EjOK8lFvag"
                title="ALAMIN: PAANO MAKAPAGAARAL NG LIBRE SA LA VERDAD CHRISTIAN COLLEGE" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen>
            </iframe>
        </div>
    </div>
</div>
{{-- Full Scholarship --}}
<div class="h-fit lg:h-96 bg-indigo-700">
    <div class="h-full relative grid grid-cols-1 gap-4 content-center w-auto text-center px-5 md:px-10">
        <div
            class="mt-10 border-dashed border-slate-300 rotate-6 w-8 h-8 border-2 sm:w-10 sm:h-10 md:w-12 md:h-12 md:border-4 lg:w-14 lg:h-14 lg:mt-24 xl:ml-14">
        </div>
        <div
            class="mt-7 absolute right-10 float-right border-slate-300 rotate-45 w-5 h-5 border-2 sm:w-7 sm:h-7 md:w-9 md:h-9 md:border-4 lg:w-12 lg:h-12 lg:mt-16 xl:mr-14">
        </div>
        <h1 class="title text-5xl font-black text-center text-white md:my-5 md:mt-0 lg:text-5xl">
            LVCC FULL SCHOLARSHIP GRANT
        </h1>
        <p
            class="text-white flex mx-10 text-center items-center justify-center sm:mx-15 md:my-5 md:mx-0 lg:px-40 xl:px-72">
            All applicants who pass the scholarship examination with at least 75% of the highest possible score,
            pass the academic interview and proven to be economically incapacitated
        </p>
        <div
            class="mb-10 border-double border-slate-300 rotate-45 w-9 h-9 border-4 sm:w-10 sm:h-10 md:w-12 md:h-12 md:border-6 lg:w-14 lg:h-14 lg:mb-24 lg:ml-10">
        </div>
        <div
            class="absolute bottom-5 right-10 border-dotted border-slate-300 rotate-12 w-5 h-5 border-2 sm:w-7 sm:h-7 md:w-9 md:h-9 lg:border-4 lg:w-12 lg:h-12 lg:mb-16 lg:mr-14">
        </div>
    </div>
</div>
{{-- To Prepare --}}
<div class="h-fit my-10 md:h-screen md:my-0 lg:h-fit lg:my-14">
    <div
        class="h-full grid grid-cols-1 gap-4 content-center w-auto text-center md:flex md:flex-row md:items-center md:align-middle md:my-auto md:mx-10">
        <div class="p-2 md:p-0 md:basis-1/2 md:ml-5 lg:px-10 xl:px:24">
            <h1 class="title text-3xl font-black text-sky-700 my-5 md:mt-0 md:text-4xl lg:text-5xl">
                THINGS TO PREPARE
            </h1>
            <ul class="list-disc list-inside my-5 mx-10 font-semibold text-justify sm:mx-15 md:mx-0">
                <li>Accomplished Online Application Form</li>
                <li>Printed Application Confirmation Slip <span class="italic">(May be downloaded after accomplishing the Online Application Form)</span></li>
                <li>2x2 Recent Formal Picture <span class="italic">(White background with Name Tag)</span></li>
                <li>Copy of previous year's Report Card (F138) with LRN</li>
                <li>Certification of Grades/TOR <span class="italic">(For College Transferees)</span></li>
                <li>Parent/Legal Guardian's Income Tax Return (ITR) or <br>
                    Certificate of Non-Tax Payment or  Certificate of Indigency</li>
            </ul>
        </div>
        <div
            class="mx-auto text-center flex items-center justify-center w-5/6 h-72 sm:my-15 md:basis-1/2 md:h-64 md:w-9/12 lg:h-96">
            <img src="{{ asset('assets/prepare.svg') }}" alt="Student Preparing her things" width="350">
        </div>
    </div>
</div>
{{-- Benefits of FS --}}
<div class="h-fit my-10 lg:my-36">
    <div class="grid gap-4 mb-4 md:grid-flow-row md:grid-cols-2 md:gap-0">
        <div
            class="relative mx-auto p-5 flex flex-col content-center bg-indigo-700 rounded title overflow-hidden w-5/6 sm:px-10">
            <div class="text-3xl text-white font-black z-10 md:my-auto">BENEFITS OF FULL SCHOLARS</div>
            <div class="absolute w-36 h-36 p-0 -right-6 -top-4 bg-blue-300 rounded-full md:h-56 md:w-56 md:-right-24">
            </div>
        </div>
        <x-perks-card edits="w-5/6" title="No Miscellaneous & Tuition Fees"
            desc="Full Scholar students are offered a no charge fees on any school expenses and as well as their tuition fees.">
        </x-perks-card>
    </div>
    <div class="grid gap-4 mb-4 md:grid-flow-row md:grid-cols-3 md:gap-0">
        <x-perks-card edits="w-5/6" title="Free Uniform"
            desc="Full Scholar students are granted with a free uniform for their regular classes days as well as free P.E uniform for their sports and physical activities.">
        </x-perks-card>
        <x-perks-card edits="w-5/6" title="Free Food"
            desc="Full Scholar students are granted with a free lunch everyday depends on their schedule.">
        </x-perks-card>
        <x-perks-card edits="w-5/6" title="Free Books"
            desc="Full Scholar students are granted with a free access of books in the LVCC Library.">
        </x-perks-card>
    </div>
</div>
{{-- Programs --}}
<div class="h-fit my-10">
    <h1 class="text-center title text-3xl font-black text-sky-700 my-5 md:mt-0 md:text-4xl lg:text-5xl my-8">
                    PROGRAMS OFFERED
                </h1>
    <div class="grid gap-x-2 gap-y-6 grid-cols-3">
        <div class="text-center">
                <img
                src="{{ asset('assets/ict.png') }}"
                class="mx-auto mb-4 w-40 rounded-full shadow-lg"
                alt="Avatar" />
            <h5 class="mb-2 text-xl font-medium leading-tight">BS Information Systems</h5>
        </div>

        <div class="text-center">
                <img
                src="{{ asset('assets/jpia.png') }}"
                class="mx-auto mb-4 w-40 rounded-full shadow-lg"
                alt="Avatar" />
            <h5 class="mb-2 text-xl font-medium leading-tight">BS Accountancy</h5>
        </div>

        <div class="text-center">
                <img
                src="{{ asset('assets/bssw.png') }}"
                class="mx-auto mb-4 w-40 rounded-full shadow-lg"
                alt="Avatar" />
            <h5 class="mb-2 text-xl font-medium leading-tight">BS Social Work</h5>
        </div>

        <div class="text-center">
                <img
                src="{{ asset('assets/jpia.png') }}"
                class="mx-auto mb-4 w-40 rounded-full shadow-lg"
                alt="Avatar" />
            <h5 class="mb-2 text-xl font-medium leading-tight">BS Accounting Information System</h5>
        </div>

        <div class="text-center">
                <img
                src="{{ asset('assets/bab.png') }}"
                class="mx-auto mb-4 w-40 rounded-full shadow-lg"
                alt="Avatar" />
            <h5 class="mb-2 text-xl font-medium leading-tight">BA Broadcasting</h5>
        </div>

        <div class="text-center mb-20">
                <img
                src="{{ asset('assets/ict.png') }}"
                class="mx-auto mb-4 w-40 rounded-full shadow-lg"
                alt="Avatar" />
            <h5 class="mb-2 text-xl font-medium leading-tight">Assoc. Computer Technology</h5>
        </div>
    </div>
</div>
{{-- Apply now --}}
<div class="h-64 bg-blue-300 m-10 p-5 rounded-lg sm:h-72 md:h-96">
    <div class="h-full relative grid grid-cols-1 gap-4 content-center w-auto text-center px-5 md:px-10">
        <h1 class="title text-3xl font-black text-center text-sky-700 md:my-5 md:mt-0 md:text-5xl">
            APPLY NOW AND BE A LA VERDARIAN!
        </h1>
        <div class="text-center flex items-center justify-center">
            <a href="{{ route('register') }}">
                <div
                    class="w-auto text-center py-2 px-10 font-bold rounded-sm text-sm text-sky-700 hover:text-white transition ease-in-out delay-150 bg-blue-50 hover:-translate-y-1 hover:scale-110 hover:bg-blue-500 duration-300
                    ">
                    APPLY FOR SCHOLARSHIP
                </div>
            </a>
        </div>
    </div>
</div>

</x-body>
