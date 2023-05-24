<x-app-layout>
    {{-- Header or Page Title --}}
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create School Year') }}
        </h2>
    </x-slot>
    @auth
    <form action="{{ route('school-years.store') }}" method="POST" class="grid grid-flow-row gap-3">
        <div class="text-right">
            <button type="submit" class="inline-flex items-center justify-center text-center px-4 py-2 w-50 h-10 bg-blue-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">Create School Year</button>
        </div>
        @csrf
        <div class="grid grid-cols-2 bg-white border rounded-md p-5 gap-4">
            <div>
                <label for="year" class="text-sm text-slate-700">School Year:</label>
                <input type="text" id="year" name="year" value="{{ old('year') }}" required class="inline-flex items-center m-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
            </div>
        </div>
        {{-- <label for="year">Year:</label>
        <input type="text" name="year" id="year" value="{{ old('year') }}" required> --}}

        <!-- Add fields for other attributes if needed -->

        {{-- <button type="submit">Create</button> --}}
    </form>
    @endauth
</x-app-layout>