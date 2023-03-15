@if (filled($brand = config('filament.brand')))
    <div @class([
        'filament-brand text-xl font-bold tracking-tight',
        'dark:text-white flex flex-row items-center gap-4' => config('filament.dark_mode'),
    ])>
    <x-application-logo width="w-10" class="basis-1/4"/>
    <div class="col-span-2 basis-3/4">{{ $brand }}</div>
    </div>
@endif
