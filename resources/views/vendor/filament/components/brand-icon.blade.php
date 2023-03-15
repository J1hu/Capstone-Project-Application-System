@if (filled($brand = config('filament.brand')))
    <div @class([
        'filament-brand text-xl font-bold tracking-tight flex flex-col',
        'dark:text-white' => config('filament.dark_mode'),
    ])>
        {{-- {{
            \Illuminate\Support\Str::of($brand)
                ->snake()
                ->upper()
                ->explode('_')
                ->map(fn (string $string) => \Illuminate\Support\Str::substr($string, 0, 1))
                ->take(2)
                ->implode('')
        }} --}}
        <x-application-logo width="w-20"/>
    </div>
@endif
