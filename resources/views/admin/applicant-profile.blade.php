<x-app-layout>
    {{-- Header or Page Title --}}
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-5">
            {{ __('Applicant Profile') }}
        </h2>
    </x-slot>
    @csrf
    {{-- first card --}}
    <div class="bg-white border rounded-md p-5">
        <div class="grid grid-cols-5">
            @if (file_exists(public_path('storage/avatars/' . $applicant->avatar)))
            <div>
                <img src="{{ asset('storage/avatars/' . $applicant->avatar) }}" width="150px" height="150px" alt="Applicant Avatar">
            </div>
            @else
            <div>
                <img src="{{ asset('assets/sample-avatar.jpg') }}" width="150px" height="150px" alt="Applicant Avatar">
            </div>
            @endif


            <div class="col-span-4 grid grid-cols-3">
                <div class="grid-rows-5 col-span-2">
                    <div class="grid grid-cols-2">
                        <div>
                            <p class="text-lg font-bold uppercase">{{ $applicant->fname }} {{ $applicant->mname }}
                                {{ $applicant->lname }}
                            </p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2">
                        <p><em>{{ $applicant->phone_num }}</em></p>
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
                <div class="text-right relative">
                    @hasanyrole('admin|registrar_staff')
                    <div>
                        <td class="p-2"><a href="{{ route('applicants.edit', $applicant->id) }}" class="bg-green-500 text-white px-2 py-1 rounded-md">Edit Applicant</a></td>
                    </div>
                    @endhasanyrole
                    @hasanyrole('admin|registrar_staff')
                    <div class=" absolute bottom-0 right-0">
                        <form action="{{ route('application.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="applicant_id" value="{{ $applicant->id }}">
                            <label for="application_status">Application Status:</label>
                            <select class="form-control items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500" name="application_status" id="application_status">
                                @foreach($application_status as $status)
                                <option value="{{ $status->application_status_name }}" {{ $applicant->application_status->application_status_name === $status->application_status_name ? 'selected' : '' }}>
                                    {{ $status->application_status_name }}
                                </option>
                                @endforeach
                            </select>
                            <button class="bg-green-500 text-white px-2 py-1 rounded-md" type="submit">Update Status</button>
                        </form>
                    </div>
                    @endhasanyrole
                </div>
            </div>
        </div>
    </div>

    {{-- Tabs --}}
    <div>
        <div class="my-4 border-b bg-white border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTabs" data-tabs-toggle="#assessment" role="tablist">
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-blue-500 hover:border-blue-300 dark:hover:text-blue-300" id="profile-assessment-tab" data-tabs-target="#profile_assessment" type="button" role="tab" aria-controls="profile_assessment" aria-selected="false">Profile Assessment</button>
                </li>
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-blue-500 hover:border-blue-300 dark:hover:text-blue-300" id="exam-score-tab" data-tabs-target="#exam_score" type="button" role="tab" aria-controls="exam_score" aria-selected="false">Exam Score</button>
                </li>
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-blue-500 hover:border-blue-300 dark:hover:text-blue-300" id="initial-assessment-tab" data-tabs-target="#initial_assessment" type="button" role="tab" aria-controls="initial_assessment" aria-selected="false">Interview Assessment</button>
                </li>
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-blue-500 hover:border-blue-300 dark:hover:text-blue-300" id="final-assessment-tab" data-tabs-target="#final_assessment" type="button" role="tab" aria-controls="final_assessment" aria-selected="false">Final Assessment</button>
                </li>
            </ul>
        </div>

        <div id="assessment">
            {{-- For Evaluation --}}
            @hasanyrole('program_head|registrar_staff|admin|mancom')
            <div class="hidden p-4 rounded-lg bg-white dark:bg-gray-800" id="profile_assessment" role="tabpanel" aria-labelledby="profile-assessment-tab">
                <h2 class="font-bold">Profile Preassessment</h2>
                @if (is_null($preassessment))
                @hasanyrole('program_head|registrar_staff|admin')
                <form method="POST" action="{{ route('preassessments.store') }}" class="mt-4">
                    @csrf

                    <div class="form-group">
                        <input type="text" class="form-control" id="applicant_id" name="applicant_id" value="{{ $applicant->id }}" hidden required>
                    </div>

                    <div class="form-group flex flex-col">
                        <label for="is_approved" class="text-sm text-slate-700">Exam Approval:</label>
                        <select class="form-control items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-1/4" id="is_approved" name="is_approved" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                        @if ($errors->has('is_approved'))
                        <div class="invalid-feedback text-red-500">
                            {{ $errors->first('is_approved') }}
                        </div>
                        @endif
                    </div>

                    <div class="form-group flex flex-col">
                        <label for="remarks" class="text-sm text-slate-700">Remarks:</label>
                        <textarea class="form-control items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full" id="remarks" name="remarks" required></textarea>
                        @if ($errors->has('remarks'))
                        <div class="invalid-feedback text-red-500">
                            {{ $errors->first('remarks') }}
                        </div>
                        @endif
                    </div>

                    <div class="grid">
                        <button type="submit" class="btn btn-primary justify-self-end bg-blue-500 hover:bg-blue-700 px-10 py-2 border-2 w-fit rounded-md border-slate-300 text-white mt-4">Submit</button>
                    </div>
                </form>
                @endhasanyrole
                @hasrole('mancom')
                <div>
                    <p>The applicant has not yet been preassessed.</p>
                </div>
                @endhasrole
            </div>
            @elseif ($preassessment)
            <div class="mt-4 space-y-3">
                <div class="flex space-x-10">
                    <p class="font-bold">Exam Approval:</p>
                    @if ($preassessment->is_approved)
                    <p class="text-blue-500">Approved</p>
                    @else
                    <p class="text-red-600">Not Approved</p>
                    @endif
                </div>

                <div class="form-group flex flex-col">
                    <label for="remarks" class="font-bold">Remarks:</label>
                    <textarea class="form-control items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full" id="remarks" name="remarks" required disabled>{{ $preassessment->remarks }}</textarea>
                </div>
            </div>
            @endif
            @endhasanyrole
        </div>

        {{-- Exam Score --}}
        <div class="hidden p-4 rounded-lg bg-white dark:bg-gray-800" id="exam_score" role="tabpanel" aria-labelledby="exam-score-tab">
            <h2 class="font-bold">Exam Score</h2>
            @if (is_null($exam_score))
            <p>Applicant has not yet taken the exam</p>
            @hasanyrole('registrar_staff|admin')
            <form method="POST" action="{{ route('exam_scores.store') }}">
                @csrf

                <div class="form-group">
                    <input type="text" class="form-control" id="applicant_id" name="applicant_id" value="{{ $applicant->id }}" hidden required>
                </div>

                <div class="form-group">
                    <label for="intelligence_score">Intelligence Score:</label><br>
                    <input class="form-control items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-1/4" type="number" class="form-control" id="intelligence_score" name="intelligence_score" value="{{ old('intelligence_score') }}" required>
                    @if ($errors->has('intelligence_score'))
                    <div class="invalid-feedback">
                        {{ $errors->first('intelligence_score') }}
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="aptitude_score">Aptitude Score:</label><br>
                    <input class="form-control items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-1/4" type="number" class="form-control" id="aptitude_score" name="aptitude_score" value="{{ old('aptitude_score') }}" required>
                    @if ($errors->has('aptitude_score'))
                    <div class="invalid-feedback">
                        {{ $errors->first('aptitude_score') }}
                    </div>
                    @endif
                </div>

                <button class="bg-green-500 text-white px-2 py-1 rounded-md" type="submit" class="btn btn-primary">Submit</button>
            </form>
            @endhasanyrole
            @elseif ($exam_score)
            <div>
                <div>
                    <label>Intelligence Exam Score:</label>
                    <p>{{ $exam_score->intelligence_score }}</p>
                </div>
                <div>
                    <label>Aptitude Exam Score:</label>
                    <p>{{ $exam_score->aptitude_score }}</p>
                </div>
                <div>
                    <label>Average Score:</label>
                    <p>{{ $exam_score->average_score }}</p>
                </div>
            </div>
            @endif
        </div>

        {{-- Initial Assessment --}}
        <div class="hidden p-4 rounded-lg bg-white dark:bg-gray-800" id="initial_assessment" role="tabpanel" aria-labelledby="initial-assessment-tab">
            <h2 class="font-bold">Interview Assessment</h2>
            @if (is_null($initial_assessment))
            @hasanyrole('admin|registrar_staff|program_head')
            <form method="POST" action="{{ route('initial_assessments.store') }}" class="mt-4 space-y-2">
                @csrf
                <input type="hidden" name="applicant_id" value="{{ $applicant->id }}">

                <div class="form-group flex flex-col">
                    <label for="remarks" class="text-sm text-slate-700">Remarks:</label>
                    <textarea class="form-control @error('remarks') is-invalid @enderror items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full" id="remarks" name="remarks">{{ old('remarks') }}</textarea>
                    @error('remarks')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group flex flex-col">
                    <label for="scholarship_type" class="text-sm text-slate-700">Scholarship Type:</label>
                    <select class="form-control @error('scholarship_type') is-invalid @enderror items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-1/4" id="scholarship_type" name="scholarship_type">
                        <option value="">Select Scholarship Type</option>
                        <option value="Institutional Scholar" {{ old('scholarship_type') === 'Institutional Scholar' ? 'selected' : '' }}>Institutional Scholar</option>
                        <option value="Presidential Scholar" {{ old('scholarship_type') === 'Presidential Scholar' ? 'selected' : '' }}>Presidential Scholar</option>
                        <option value="Half Scholar" {{ old('scholarship_type') === 'Half Scholar' ? 'selected' : '' }}>Half Scholar</option>
                    </select>
                    @error('scholarship_type')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="grid">
                    <button type="submit" class="btn btn-primary justify-self-end bg-blue-500 hover:bg-blue-700 px-10 py-2 border-2 w-fit rounded-md border-slate-300 text-white mt-4">Submit</button>
                </div>
            </form>
            @endhasanyrole
            @hasrole('mancom')
            <div>
                <p>The applicant has not yet been interviewed.</p>
            </div>
            @endhasrole
            @elseif ($initial_assessment)
            <div class="space-y-2">
                <div class="flex flex-col">
                    <label class="text-sm text-slate-700">Evaluator's Initial Interview Remarks:</label>
                    <p>{{ $initial_assessment->remarks }}</p>
                </div>
                <div class="flex flex-col">
                    <label class="text-sm text-slate-700">Initial Scholarship Type:</label>
                    <p>{{ $initial_assessment->scholarship_type }}</p>
                </div>
            </div>
            @endif
        </div>

        {{-- Final Assessment --}}
        <div class="hidden p-4 rounded-lg bg-white dark:bg-gray-800" id="final_assessment" role="tabpanel" aria-labelledby="final-assessment-tab">
            <h2 class="font-bold">Final Assessment</h2>
            @if (is_null($final_assessment))
            @hasanyrole('admin|registrar_staff|mancom')
            <form method="POST" action="{{ route('final_assessments.store') }}" class="mt-4 space-y-2">
                @csrf
                <input type="hidden" name="applicant_id" value="{{ $applicant->id }}">

                <div class="form-group flex flex-col">
                    <label for="remarks" class="text-sm text-slate-700">Remarks:</label>
                    <textarea class="form-control @error('remarks') is-invalid @enderror items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full" id="remarks" name="remarks">{{ old('remarks') }}</textarea>
                    @error('remarks')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group flex flex-col">
                    <label for="scholarship_type" class="text-sm text-slate-700">Scholarship Type:</label>
                    <select class="form-control @error('scholarship_type') is-invalid @enderror items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-1/4" id="scholarship_type" name="scholarship_type" id="scholarship_type" name="scholarship_type">
                        <option value="">Select Scholarship Type</option>
                        <option value="Institutional Scholar" {{ old('scholarship_type') === 'Institutional Scholar' ? 'selected' : '' }}>Institutional Scholar</option>
                        <option value="Presidential Scholar" {{ old('scholarship_type') === 'Presidential Scholar' ? 'selected' : '' }}>Presidential Scholar</option>
                        <option value="Half Scholar" {{ old('scholarship_type') === 'Half Scholar' ? 'selected' : '' }}>Half Scholar</option>
                    </select>
                    @error('scholarship_type')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="grid">
                    <button type="submit" class="btn btn-primary justify-self-end bg-blue-500 hover:bg-blue-700 px-10 py-2 border-2 w-fit rounded-md border-slate-300 text-white mt-4">Submit</button>
                </div>
            </form>
            @endhasanyrole
            @hasrole('program_head')
            <div>
                <p>The applicant has not yet been final assessed.</p>
            </div>
            @endhasrole
            @elseif ($final_assessment)
            <div>
                <div>
                    <label>Evaluator's Final Interview Remarks:</label>
                    <p>{{ $final_assessment->remarks }}</p>
                </div>
                <div>
                    <label>Final Scholarship Type:</label>
                    <p>{{ $final_assessment->scholarship_type }}</p>
                </div>
            </div>
            @endif
        </div>
    </div>

    {{-- Tabs --}}
    <div>
        <div class="my-4 border-b bg-white border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-blue-500 hover:border-blue-300 dark:hover:text-blue-300" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Personal Info</button>
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
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-blue-500 hover:border-blue-300 dark:hover:text-blue-300" id="sign-tab" data-tabs-target="#sign" type="button" role="tab" aria-controls="sign" aria-selected="false">Signed Declaration</button>
                </li>
                <li role="presentation">
                    <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-blue-500 hover:border-blue-300 dark:hover:text-blue-300" id="sign-tab" data-tabs-target="#images" type="button" role="tab" aria-controls="images" aria-selected="false">Uploaded Files</button>
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
                        <p class="capitalize">{{ $applicant->birthdate }}</p>
                        <p class="capitalize">{{ $applicant->sex }}</p>
                        <p class="capitalize">{{ $applicant->religion }}</p>
                        <a href="https://{{ $applicant->fb_link }}" class="text-blue-500">{{ $applicant->fb_link }}</a>
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
                        @foreach ($applicant->siblings as $sibling)
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
                            <p class="capitalize">{{ $applicant->mother->mother_fname }}
                                {{ $applicant->mother->mother_mname }}
                                {{ $applicant->mother->mother_lname }}
                            </p>
                            <p class="capitalize">{{ $applicant->mother->mother_religion }}</p>
                            <p class="capitalize">{{ $applicant->mother->mother_occupation }}</p>
                            <p class="capitalize">{{ $applicant->mother->mother_annual_income }}</p>
                            <p class="capitalize">{{ $applicant->mother->mother_phone_num }}</p>
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
                            <p class="capitalize">{{ $applicant->father->father_fname }}
                                {{ $applicant->father->father_mname }}
                                {{ $applicant->father->father_lname }}
                            </p>
                            <p class="capitalize">{{ $applicant->father->father_religion }}</p>
                            <p class="capitalize">{{ $applicant->father->father_occupation }}</p>
                            <p class="capitalize">{{ $applicant->father->father_annual_income }}</p>
                            <p class="capitalize">{{ $applicant->father->father_phone_num }}</p>
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
                            <p class="capitalize">{{ $applicant->guardian->guardian_fname }}
                                {{ $applicant->guardian->guardian_mname }}
                                {{ $applicant->guardian->guardian_lname }}
                            </p>
                            <p class="capitalize">{{ $applicant->guardian->guardian_religion }}</p>
                            <p class="capitalize">{{ $applicant->guardian->guardian_occupation }}</p>
                            <p class="capitalize">{{ $applicant->guardian->guardian_annual_income }}</p>
                            <p class="capitalize">{{ $applicant->guardian->guardian_phone_num }}</p>
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
                            <p class="capitalize">{{ $applicant->last_school }}</p>
                            <p class="capitalize">{{ $applicant->school_type }}</p>
                            <p class="capitalize">{{ $applicant->last_school_address }}</p>
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
                            @foreach ($applicant->gadgets as $gadget)
                            <li class="capitalize">{{ $gadget->gadget_name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="p-4 rounded-lg bg-white dark:bg-gray-800">
                    <p class="font-bold">Internet Connection to be used during blended learning:</p>
                    <div>
                        <ul class="list-inside list-disc">
                            @foreach ($applicant->internetTypes as $internet)
                            <li class="capitalize">{{ $internet->internet_name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="p-4 rounded-lg bg-white dark:bg-gray-800">
                    <p class="font-bold">Electric consumption for the last three months:</p>
                    <div class="grid grid-cols-4">
                        @foreach ($applicant->electricBills as $electric)
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
                            @if (!empty($applicant->free_ebill_reason))
                            <div>
                                <label class="font-semibold">Reason electric consumption is free:</label>
                                <p class="capitalize">{{ $applicant->free_ebill_reason }}</p>
                            </div>
                            @endif
                            <div>
                                <label class="font-semibold">House Ownership Type:</label>
                                <p class="capitalize">{{ $applicant->houseOwnership->ownership_type }}</p>
                            </div>
                            <div>
                                <label class="font-semibold">Monthly Rental:</label>
                                <p class="capitalize">
                                    {{ $applicant->monthly_rental ? $applicant->monthly_rental : 'No Monthly Rental' }}
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

                    @if ($applicant->data_privacy_consent)
                    <span class="text-blue-500">Applicant Agreed.</span>
                    @else
                    <span class="text-red-600">Applicant did not agreed.</span>
                    @endif
                </div>
            </div>
            <div class="hidden p-4 rounded-lg bg-white dark:bg-gray-800" id="images" role="tabpanel" aria-labelledby="images-tab">
                <div>
                    <div id="myModal" class="modal">
                        <img class="modal-content" id="img" alt="">
                    </div>
                    <section data-aos="fade-up" data-aos-duration="2000" data-aos-anchor-placement="center-bottom">
                        <div class="gallery gap-8 columns-3">
                            <div>
                                @if (file_exists(public_path('storage/certificates/' . $applicant->certificate)))
                                <img class="myImg" src="{{ asset('storage/certificates/' . $applicant->certificate) }}" alt="Certificate" width="100px">
                                @else
                                <img class="myImg" src="{{ asset('assets/sample-itr.webp') }}" alt="Fallback Certificate" width="100px">
                                @endif
                            </div>

                            <div>
                                @if (file_exists(public_path('storage/report-cards/' . $applicant->report_card)))
                                <img class="myImg" src="{{ asset('storage/report-cards/' . $applicant->report_card) }}" alt="Report Card" width="100px">
                                @else
                                <img class="myImg" src="{{ asset('assets/sample-reportcard.jpg') }}" alt="Fallback Report Card" width="100px">
                                @endif
                            </div>

                            <div>
                                @if (file_exists(public_path('storage/ebill-proofs/' . $applicant->ebill_proof)))
                                <img class="myImg" src="{{ asset('storage/ebill-proofs/' . $applicant->ebill_proof) }}" alt="Electric Bill" width="100px">
                                @else
                                <img class="myImg" src="{{ asset('assets/sample-ebill.png') }}" alt="Fallback Electric Bill" width="100px">
                                @endif
                            </div>

                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <!-- Internal Script -->
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init();
            //Get the modal
            var modal = document.getElementById('myModal');

            //Get the image and insert it inside the modal - use its "alt" text as a caption
            var img = $('.myImg');
            var modalImg = $("#img");
            $('.myImg').click(function() {
                modal.style.display = "block";
                var newSrc = this.src;
                modalImg.attr('src', newSrc);
            });

            //if you click on anything except the modal itself or the "open modal" link, close the modal
            $(document).click(function(event) {
                //if you click on anything except the modal itself or the "open modal" link, close the modal
                if (!$(event.target).closest(".myImg, .modal-content").length) {
                    modal.style.display = "none";
                }
            });
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
        });
    </script>

</x-app-layout>