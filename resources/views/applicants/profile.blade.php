<x-app-layout>
    {{-- Header or Page Title --}}
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-5">
            {{ __('Applicant Profile') }}
        </h2>
    </x-slot>

    {{-- first card --}}
    <div class="bg-white border rounded-md p-5">
        <div class="grid grid-cols-3">
            @if (file_exists(public_path('storage/avatars/' . $applicant->avatar)))
            <div>
                <img src="{{ asset('storage/avatars/' . $applicant->avatar) }}" width="150px" height="150px" alt="Applicant Avatar">
            </div>
            @else
            <div>
                <img src="{{ asset('assets/sample-avatar.jpg') }}" width="150px" height="150px" alt="Applicant Avatar">
            </div>
            @endif
            <div class="col-span-2 grid grid-cols-3">
                <div class="grid-rows-5 col-span-2">
                    <p class="text-lg font-bold uppercase">{{ $applicant->fname }} {{ $applicant->mname }}
                        {{ $applicant->lname }}
                    </p>
                    <div class="grid grid-cols-2">
                        <p><em>{{ $user->applicant->phone_num }}</em></p>
                        <p><em>{{ $user->email }}</em></p>
                    </div>
                    <br />
                    <div class="grid grid-cols-2">
                        <p class="font-bold">Applicant Type:</p>
                        <p class="">{{ $applicant->applicant_type }}</p>
                    </div>
                    <div class="grid grid-cols-2">
                        <p class="font-bold">Program to be Taken at LVCC:</p>
                        <p class="">{{ $applicant->program->program_name }}</p>
                    </div>
                </div>
                <div>
                    {{-- for edit button --}}
                </div>
            </div>
        </div>
    </div>

    {{-- Tabs --}}
    <div class="my-4 border-b bg-white border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
            <li class="mr-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Personal Info</button>
            </li>
            <li class="mr-2" role="presentation">
                <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-blue-500 hover:border-blue-300 dark:hover:text-blue-300" id="family_data-tab" data-tabs-target="#family_data" type="button" role="tab" aria-controls="family_data" aria-selected="false">Family Data</button>
            </li>
            <li class="mr-2" role="presentation">
                <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-blue-500 hover:border-blue-300 dark:hover:text-blue-300" id="educ_bg-tab" data-tabs-target="#educ_bg" type="button" role="tab" aria-controls="educ_bg" aria-selected="false">Educational Background</button>
            </li>
            <li class="mr-2" role="presentation">
                <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-blue-500 hover:border-blue-300 dark:hover:text-blue-300" id="others-tab" data-tabs-target="#others" type="button" role="tab" aria-controls="others" aria-selected="false">Other Information</button>
            </li>
            <li role="presentation">
                <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-blue-500 hover:border-blue-300 dark:hover:text-blue-300" id="sign-tab" data-tabs-target="#sign" type="button" role="tab" aria-controls="sign" aria-selected="false">Signed Declaration</button>
            </li>
        </ul>
    </div>
    <div id="myTabContent">
        <div class="hidden p-4 rounded-lg bg-white dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="grid grid-cols-4">
                <div class="grid grid-flow-row">
                    <label class="font-semibold">Date of Birth:</label>
                    <label class="font-semibold">Sex:</label>
                    <label class="font-semibold">Religion:</label>
                    <label class="font-semibold">Facebook Link:</label>
                    <h1>Home Address:</h1>
                </div>
                <div class="col-span-3">
                    <p class="capitalize">{{ $user->applicant->birthdate }}</p>
                    <p class="capitalize">{{ $user->applicant->sex }}</p>
                    <p class="capitalize">{{ $user->applicant->religion }}</p>
                    <a href="https://{{ $user->applicant->fb_link }}" class="text-blue-500">{{ $user->applicant->fb_link }}</a>
                    <p class="capitalize">{{ $applicant->address->street }}, {{ $barangayName }},
                        {{ $cityName }}, {{ $provinceName }}, {{ $regionName }}
                    </p>
                </div>
            </div>
        </div>
        <div class="hidden space-y-4" id="family_data" role="tabpanel" aria-labelledby="family_data-tab">
            <div class="p-4 rounded-lg bg-white dark:bg-gray-800">
                <p class="font-bold">Siblings:</p>
                <div class="grid grid-cols-4">
                    @foreach ($user->applicant->siblings as $sibling)
                    <div class="grid grid-flow-row">
                        <label class="font-semibold">Name:</label>
                        <label class="font-semibold">Education level:</label>
                    </div>
                    <div class="col-span-3">
                        <p class="capitalize">{{ $sibling->full_name }}</p>
                        <p class="capitalize">{{ $sibling->education_level }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="p-4 rounded-lg bg-white dark:bg-gray-800">
                <p class="font-bold">Mother's Data</p>
                <div class="grid grid-cols-4">
                    <div class="grid grid-flow-row">
                        <label class="font-semibold">Name:</label>
                        <label class="font-semibold">Religion:</label>
                        <label class="font-semibold">Occupation:</label>
                        <label class="font-semibold">Annual Income:</label>
                        <label class="font-semibold">Phone Number:</label>
                    </div>
                    <div class="col-span-3">
                        <p class="capitalize">{{ $user->applicant->mother->mother_fname }} {{ $user->applicant->mother->mother_mname }}
                            {{ $user->applicant->mother->mother_lname }}
                        </p>
                        <p class="capitalize">{{ $user->applicant->mother->mother_religion }}</p>
                        <p class="capitalize">{{ $user->applicant->mother->mother_occupation }}</p>
                        <p class="capitalize">{{ $user->applicant->mother->mother_annual_income }}</p>
                        <p class="capitalize">{{ $user->applicant->mother->mother_phone_num }}</p>
                    </div>
                </div>
            </div>
            <div class="p-4 rounded-lg bg-white dark:bg-gray-800">
                <p class="font-bold">Fathers's Data</p>
                <div class="grid grid-cols-4">
                    <div class="grid grid-flow-row">
                        <label class="font-semibold">Name:</label>
                        <label class="font-semibold">Religion:</label>
                        <label class="font-semibold">Occupation:</label>
                        <label class="font-semibold">Annual Income:</label>
                        <label class="font-semibold">Phone Number:</label>
                    </div>
                    <div class="col-span-3">
                        <p class="capitalize">{{ $user->applicant->father->father_fname }} {{ $user->applicant->father->father_mname }}
                            {{ $user->applicant->father->father_lname }}
                        </p>
                        <p class="capitalize">{{ $user->applicant->father->father_religion }}</p>
                        <p class="capitalize">{{ $user->applicant->father->father_occupation }}</p>
                        <p class="capitalize">{{ $user->applicant->father->father_annual_income }}</p>
                        <p class="capitalize">{{ $user->applicant->father->father_phone_num }}</p>
                    </div>
                </div>
            </div>
            <div class="p-4 rounded-lg bg-white dark:bg-gray-800">
                <p class="font-bold">Guardian's Data</p>
                <div class="grid grid-cols-4">
                    <div class="grid grid-flow-row">
                        <label class="font-semibold">Name:</label>
                        <label class="font-semibold">Religion:</label>
                        <label class="font-semibold">Occupation:</label>
                        <label class="font-semibold">Annual Income:</label>
                        <label class="font-semibold">Phone Number:</label>
                    </div>
                    <div class="col-span-3">
                        <p class="capitalize">{{ $user->applicant->guardian->guardian_fname }}
                            {{ $user->applicant->guardian->guardian_mname }}
                            {{ $user->applicant->guardian->guardian_lname }}
                        </p>
                        <p class="capitalize">{{ $user->applicant->guardian->guardian_religion }}</p>
                        <p class="capitalize">{{ $user->applicant->guardian->guardian_occupation }}</p>
                        <p class="capitalize">{{ $user->applicant->guardian->guardian_annual_income }}</p>
                        <p class="capitalize">{{ $user->applicant->guardian->guardian_phone_num }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden space-y-4" id="educ_bg" role="tabpanel" aria-labelledby="educ_bg-tab">
            <div class="p-4 rounded-lg bg-white dark:bg-gray-800">
                <div class="grid grid-cols-4">
                    <div class="grid grid-flow-row">
                        <label class="font-semibold">Last School Attended:</label>
                        <label class="font-semibold">Type of School:</label>
                        <label class="font-semibold">School's Address:</label>
                    </div>
                    <div class="col-span-3">
                        <p class="capitalize">{{ $user->applicant->last_school }}</p>
                        <p class="capitalize">{{ $user->applicant->school_type }}</p>
                        <p class="capitalize">{{ $user->applicant->last_school_address }}</p>
                    </div>
                </div>
            </div>
            <div class="p-4 rounded-lg bg-white dark:bg-gray-800">
                <p class="font-bold">Academic Awards and Achievements</p>
                <div>
                    <ul class="list-inside list-disc">
                        @foreach ($applicant->acadAwards as $award)
                        @if (!empty(trim($award->award_name)))
                        <li class="capitalize">{{ $award->award_name }}</li>
                        @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="hidden space-y-4" id="others" role="tabpanel" aria-labelledby="others-tab">
            <div class="p-4 rounded-lg bg-white dark:bg-gray-800">
                <p class="font-bold">Gadgets to be used during blended learning:</p>
                <div>
                    <ul class="list-inside list-disc">
                        @foreach ($user->applicant->gadgets as $gadget)
                        <li class="capitalize">{{ $gadget->gadget_name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="p-4 rounded-lg bg-white dark:bg-gray-800">
                <p class="font-bold">Internet Connection to be used during blended learning:</p>
                <div>
                    <ul class="list-inside list-disc">
                        @foreach ($user->applicant->internetTypes as $internet)
                        <li class="capitalize">{{ $internet->internet_name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="p-4 rounded-lg bg-white dark:bg-gray-800">
                <p class="font-bold">Electric consumption for the last three months:</p>
                <div class="grid grid-cols-4">
                    @foreach ($user->applicant->electricBills as $electric)
                    <div class="grid grid-flow-row my-1">
                        <label class="font-semibold">Month of:</label>
                        <label class="font-semibold">Amount:</label>
                    </div>
                    <div class="col-span-3">
                        <p class="capitalize">{{ $electric->electric_month }}</p>
                        <p class="capitalize">{{ $electric->electric_amount }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="p-4 rounded-lg bg-white dark:bg-gray-800">
                <div class="grid grid-cols-4">
                    <div class="grid grid-flow-row">
                        @if (!empty($user->applicant->free_ebill_reason))
                        <div>
                            <label class="font-semibold">Reason electric consumption is free:</label>
                            <p class="capitalize">{{ $user->applicant->free_ebill_reason }}</p>
                        </div>
                        @endif
                        <div>
                            <label class="font-semibold">House Ownership Type:</label>
                            <p class="capitalize">{{ $user->applicant->houseOwnership->ownership_type }}</p>
                        </div>
                        <div>
                            <label class="font-semibold">Monthly Rental:</label>
                            <p class="capitalize">
                                {{ $user->applicant->monthly_rental ? $user->applicant->monthly_rental : 'No Monthly Rental' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden" id="sign" role="tabpanel" aria-labelledby="sign-tab">
            <div class="p-4 rounded-lg bg-white dark:bg-gray-800">
                <p class="font-bold">Signed Declaration and Data Privacy Consent</p>
                <p class="my-2">
                    “I/We hereby certify to the truthfulness and completeness of the information provided. Any
                    misinformation or withholding of information will automatically disqualify my/our child from the
                    LVCC Scholarship Program. In connection with this application for financial aid, I/we hereby
                    authorize the LVCC Scholarship Committee to conduct an investigation on the family's finances,
                    including bank accounts, credit card, SSS, GSIS, etc. and visit our family's dwelling place.”
                </p>

                @if ($user->applicant->data_privacy_consent)
                <span>I agree</span>
                @else
                <span>I do not agree.</span>
                @endif
            </div>
        </div>
    </div>

    <script>
        // Get all tab buttons and content divs
        const tabButtons = document.querySelectorAll('[data-tabs-target]');
        const tabContents = document.querySelectorAll('[role="tabpanel"]');

        // Add event listener to each tab button
        tabButtons.forEach((button, index) => {
            button.addEventListener('click', () => {
                // Toggle the active class on the clicked button
                tabButtons.forEach(button => {
                    button.classList.remove('border-blue-500', 'text-blue-500');
                    button.setAttribute('aria-selected', 'false');
                });
                button.classList.add('border-blue-500', 'text-blue-500');
                button.setAttribute('aria-selected', 'true');

                // Hide all tab content
                tabContents.forEach(content => {
                    content.classList.add('hidden');
                });

                // Show the content associated with the clicked button
                const target = button.getAttribute('data-tabs-target');
                const content = document.querySelector(target);
                content.classList.remove('hidden');
            });

            // Trigger click event on the first tab button after the page has loaded
            if (index === 0) {
                button.click();
            }
        });
    </script>

</x-app-layout>