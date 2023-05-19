<div {{ $attributes->merge(['class' => 'justify-center content-center p-3 grid grid-col-1 md:grid-col-2 md:grid-flow-row md:justify-between ' . $classname]) }}>
    <a href="#top" class="flex flex-wrap content-center space-x-4 align-middle md:col-span-1">
        <div class="mx-auto m-1">
            <x-application-logo container="flex" titlefluid="grid" logo="w-12 mx-2" title="font-bold text-base" subtitle="text-xs leading-tight" />
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
        <a href="{{ route('admin.login') }}">
            <div {{ $attributes->merge(['class' => 'text-xs sm:text-sm '. $login]) }}>
                Login as Admin
            </div>
        </a>
    </div>
    <div class="text-xs mt-5 md:col-span-2 text-center">
        Copyright 2023. All Rights Reserved
    </div>
</div>