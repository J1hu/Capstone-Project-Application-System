<div {{ $attributes->merge(['class' => 'px-3 sm:px-10 grid grid-col-2 grid-flow-col content-center ' . $classname]) }}>
    <a href="{{ route('home') }}" class="flex flex-wrap content-center space-x-4 align-middle">
        <div>
            <x-application-logo />
        </div>
        <div class="hidden content-center md:grid">
            <p class="font-bold sm:text-lg">LA VERDAD CHRISTIAN COLLEGE</p>
            <p class="italic leading-4">McArthur Highway, Brgy. Sampaloc, Apalit, Pampanga</p>
        </div>
    </a>
    <div class="text-center flex justify-end items-center">
        <a href="{{ route('login') }}">
            <div
            {{ $attributes->merge(['class' => 'w-24 text-center p-2 sm:w-36 lg:font-bold rounded-sm text-sm transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-blue-700 duration-300 '. $login]) }}>
                LOGIN
            </div>
        </a>
    </div>
</div>
