<x-app-layout>
    {{-- Header or Page Title --}}
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Applicant Profile') }}
        </h2>
    </x-slot>
    <form action="" method="get">
        @foreach ($users as $user)
            <input type="text" value="{{$user->fname}}">
        @endforeach
    </form>





</x-app-layout>