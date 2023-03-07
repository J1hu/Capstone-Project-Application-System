<div {{ $attributes->merge(['class' => 'mx-auto p-5 flex flex-col content-center bg-blue-300 rounded sm:px-10 ' . $edits]) }}>
    <div class="text-xl font-bold md:text-2xl">{{ $title }}</div>
    <div>{{ $desc }}</div>
</div>