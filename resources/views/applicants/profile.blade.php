<x-app-layout>
    {{-- Header or Page Title --}}
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Applicant Profile') }}
        </h2>
    </x-slot>
    <div>
        <h1 class="text-xl">Personal Information</h1>
        <div>
            <label>Full name:</label>
            <p>{{$user->applicant->lname}}, {{$user->applicant->fname}} {{$user->applicant->mname}} </p>
        </div>

        <div>
            <label>Applicant Type:</label>
            <p>{{ $user->applicant->applicant_type }}</p>
        </div>

        <div>
            <label>Email:</label>
            <p>{{ $user->applicant->applicant_type }}</p>
        </div>

        <div>
            <label>Date of Birth:</label>
            <p>{{ $user->applicant->birthdate }}</p>
        </div>

        <div>
            <label>Sex:</label>
            <p>{{ $user->applicant->sex }}</p>
        </div>

        <div>
            <label>Phone Number:</label>
            <p>{{ $user->applicant->phone_num }}</p>
        </div>

        <div>
            <label>Religion:</label>
            <p>{{ $user->applicant->religion }}</p>
        </div>

        <div>
            <label>Facebook Link:</label>
            <a href="https://{{ $user->applicant->fb_link }}">{{ $user->applicant->fb_link }}</a>
        </div>

        <div>
            <label>Home Address:</label>
            <p>{{ $applicant->address->street }}</p>
        </div>
    </div>





</x-app-layout>