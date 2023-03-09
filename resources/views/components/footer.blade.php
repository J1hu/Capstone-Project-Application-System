<div {{ $attributes->merge(['class' => 'justify-center content-center p-3 grid grid-col-1 md:grid-col-2 md:grid-flow-row md:justify-between ' . $classname]) }}>
    <a href="#top" class="flex flex-wrap content-center space-x-4 align-middle md:col-span-1">
        <div class="mx-auto m-1">
            <img src="{{ asset('assets/lvlogo.png') }}" alt="La Verdad Christian College Inc. Logo" width="70">
        </div>
        <div class="grid content-center m-1 text-center md:text-left">
            <p class="text-sm font-bold sm:text-base">LA VERDAD CHRISTIAN COLLEGE</p>
            <p class="text-sm italic leading-4">McArthur Highway, Brgy. Sampaloc, Apalit, Pampanga</p>
        </div>
    </a>
    <div class="text-center m-2 grid grid-flow-col items-center md:justify-self-end md:grid-flow-row md:col-span-1 md:text-right">
        <a href="{{ route('faqs') }}">
            <div {{ $attributes->merge(['class' => 'text-xs sm:text-sm '. $login]) }}>
                FAQs
            </div>
        </a>
        <a href="{{ route('terms') }}">
            <div {{ $attributes->merge(['class' => 'text-xs sm:text-sm '. $login]) }}>
                Terms & Conditions
            </div>
        </a>
        <a href="{{ route('privacy') }}">
            <div {{ $attributes->merge(['class' => 'text-xs sm:text-sm '. $login]) }}>
                Privacy Policy
            </div>
        </a>
        <a href="{{ config('filament.path') }}">
            <div {{ $attributes->merge(['class' => 'text-xs sm:text-sm '. $login]) }}>
                Login as Admin
            </div>
        </a>
    </div>
    <div class="text-xs mt-5 md:col-span-2 text-center">
        Copyright 2023. All Rights Reserved
    </div>
</div>