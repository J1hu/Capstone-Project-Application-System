<div {{ $attributes->merge(['class' => ' '.$container]) }}>
    <img src="{{ asset('assets/lvlogo.png') }}" alt="La Verdad Christian College Inc. Logo" {{ $attributes->merge(['class' => 'm-2 '.$logo]) }}>
    <div {{ $attributes->merge(['class' => 'hidden content-center md:grid '.$titlefluid]) }}>
        <h1 {{ $attributes->merge(['class' => 'font-bold sm:text-lg '.$title]) }}>LA VERDAD CHRISTIAN COLLEGE</h1>
        <p {{ $attributes->merge(['class' => 'italic leading-4 '.$subtitle]) }}>McArthur Highway, Brgy. Sampaloc, Apalit, Pampanga</p>
    </div>
</div>