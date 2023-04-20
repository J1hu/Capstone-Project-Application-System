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
            <label>Program to be taken at LVCC:</label>
            <p>{{ $user->applicant->program->program_name }}</p>
        </div>

        <div>
            <label>Email:</label>
            <p>{{ $user->email }}</p>
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
            <h1>Home Address:</h1>
            <p>{{ $applicant->address->street }}, {{ $applicant->address->barangay }}, {{ $applicant->address->city_municipality }}, {{ $applicant->address->province }}</p>
        </div>

        <div>
            <img src="{{ asset('avatars/' . $applicant->avatar) }}" width="200px" height="200px" alt="Applicant Avatar">
        </div>

        <div>
            <h1>Mother Information:</h1>
            <label>Name:</label>
            <p>{{$user->applicant->mother->mother_fname}} {{$user->applicant->mother->mother_mname}} {{$user->applicant->mother->mother_lname}}</p>
            <label>Religion:</label>
            <p>{{$user->applicant->mother->mother_religion}}</p>
            <label>Occupation:</label>
            <p>{{$user->applicant->mother->mother_occupation}}</p>
            <label>Annual Income:</label>
            <p>{{$user->applicant->mother->mother_annual_income}}</p>
            <label>Phone Number:</label>
            <p>{{$user->applicant->mother->mother_phone_num}}</p>
        </div>

        <div>
            <h1>Father Information:</h1>
            <label>Name:</label>
            <p>{{$user->applicant->father->father_fname}} {{$user->applicant->father->father_mname}} {{$user->applicant->father->father_lname}}</p>
            <label>Religion:</label>
            <p>{{$user->applicant->father->father_religion}}</p>
            <label>Occupation:</label>
            <p>{{$user->applicant->father->father_occupation}}</p>
            <label>Annual Income:</label>
            <p>{{$user->applicant->father->father_annual_income}}</p>
            <label>Phone Number:</label>
            <p>{{$user->applicant->father->father_phone_num}}</p>
        </div>

        <div>
            <h1>Guardian Information:</h1>
            <label>Name:</label>
            <p>{{$user->applicant->guardian->guardian_fname}} {{$user->applicant->guardian->guardian_mname}} {{$user->applicant->guardian->guardian_lname}}</p>
            <label>Religion:</label>
            <p>{{$user->applicant->guardian->guardian_religion}}</p>
            <label>Occupation:</label>
            <p>{{$user->applicant->guardian->guardian_occupation}}</p>
            <label>Annual Income:</label>
            <p>{{$user->applicant->guardian->guardian_annual_income}}</p>
            <label>Phone Number:</label>
            <p>{{$user->applicant->guardian->guardian_phone_num}}</p>
        </div>

        <div>
            <h1>Educational Background:</h1>
            <label>Last School Attended:</label>
            <p>{{$user->applicant->last_school}}</p>
            <label>Type of School:</label>
            <p>{{$user->applicant->school_type}}</p>
            <label>School's Address:</label>
            <p>{{$user->applicant->last_school_address}}</p>
        </div>

        <div>
            <h1>Academic Awards and Achievements</h1>
            <ul>
                @foreach($user->applicant->acadAwards as $award)
                <li>{{ $award->award_name }}</li>
                @endforeach
            </ul>
        </div>

        <div>
            <h1>Other Information:</h1>

            <div>
                <h2>Gadgets to be used during blended learning:</h2>
                <ul>
                    @foreach($user->applicant->gadgets as $gadget)
                    <li>{{ $gadget->gadget_name }}</li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h2>Gadgets to be used during blended learning:</h2>
                <ul>
                    @foreach($user->applicant->gadgets as $gadget)
                    <li>{{ $gadget->gadget_name }}</li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h2>Internet Connection to be used during blended learning:</h2>
                <ul>
                    @foreach($user->applicant->internetTypes as $internet)
                    <li>{{ $internet->internet_name }}</li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h2>Electric consumption for the last three months:</h2>

                @foreach($user->applicant->electricBills as $electric)
                <p> Month of: {{ $electric->electric_month }}</p>
                <p> Amount: {{ $electric->electric_amount }}</p>
                @endforeach
            </div>

            <div>
                <h2>Reason electric consumption is free:</h2>
                <p>{{ $user->applicant->free_ebill_reason }}</p>
            </div>

            <div>
                <h2>House Ownership Type: </h2>
                <p>{{ $user->applicant->houseOwnership->ownership_type }}</p>
            </div>

            <div>
                <h2>Monthly Rental:</h2>
                <p>{{ $user->applicant->monthly_rental }}</p>
            </div>

            <div>
                <h2>Signed Declaration and Data Privacy Consent</h2>
                <p>
                    “I/We hereby certify to the truthfulness and completeness of the information provided. Any misinformation or withholding of information will automatically disqualify my/our child from the LVCC Scholarship Program. In connection with this application for financial aid, I/we hereby authorize the LVCC Scholarship Committee to conduct an investigation on the family's finances, including bank accounts, credit card, SSS, GSIS, etc. and visit our family's dwelling place.”
                </p>

                @if($user->applicant->data_privacy_consent)
                <span>Yes</span>
                @else
                <span>No</span>
                @endif
            </div>

        </div>

    </div>





</x-app-layout>