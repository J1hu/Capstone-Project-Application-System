<x-form-layout>
    <div class="flex items-center justify-center h-screen">


        <form method="POST" action="{{ route('applicants.store') }}" enctype="multipart/form-data" id="form" class="absolute top-20 w-3/5 py-10">
            @csrf
            {{-- SECTION 1 - DATA PRIVACY --}}
            <div id="section-1" class="section">
                <div class="bg-white py-5 px-10 border rounded-md mx-auto mt-10 mb-3">
                    <div class="text-center font-bold text-2xl my-5">Data Privacy Notice</div>
                    <div>
                        <div>
                            <p>
                                I am fully aware that La Verdad Christian School, Inc. (LVCS), La Verdad Christian
                                College, Inc. (LVCC) and its designated representatives are duty bound and obligated
                                under the Data Privacy Act of 2012 to protect all my personal and sensitive information
                                which they collect, record, update and retain upon my enrolment and during my stay in
                                the institution.
                                <br /><br />
                                My personal data consist information regarding my identity, academic standing and health
                                condition including all documents that contain my personal identity. Such personal
                                information includes, but not limited to my name, address, names of my parents or
                                guardians, date of my birth, grades, class attendance, disciplinary records, and other
                                information necessary for basic administration and instruction.
                                <br /><br />
                                I understand that my personal data were collected and processed relative to my
                                enrollment and will be used only by LVCS/LVCC to pursue its legitimate interest as an
                                educational institution. I understand that such personal information cannot be disclosed
                                without my consent.
                                <br /><br />
                                Likewise, I am fully aware that LVCS/LVCC may share such information to its affiliates
                                or partner organizations as part of its contractual obligations, or with government
                                agencies that may need it pursuant to law or legal processes. In this regard, I hereby
                                allow LVCS/LVCC to record, process, utilize and share my personal and sensitive
                                information in the pursuit of its legitimate interest as an educational institution.
                                <br /><br />
                                If I commit any misconduct or should there be any complaint filed against me before the
                                Guidance Office, Discipline Office and the Office of Student Affairs by reason of
                                violation of existing laws, school policies, rules and regulations, I hereby authorize
                                and give my full consent in favor of LVCS/LVCC to disclose such information to my
                                parents, guardian, representative or whoever person is in charge of providing care and
                                custody for me.
                                <br /><br />
                                I hereby voluntarily give my full consent to LVCS/LVCC to collect, record, use, process,
                                share, release and retain my personal and sensitive information when needed.
                                <br /><br />
                                <strong>Parent’s Consent On Behalf of A Minor</strong>
                                <br />
                                Being the parent or legitimate guardian of the enrollee who is a minor, I hereby
                                voluntarily give my full consent to La Verdad Christian School, Inc. (LVCS) and La
                                Verdad Christian College, Inc. (LVCC) to collect, record, use, process, share, release,
                                and retain my child’s personal and sensitive information for the same purpose mentioned
                                above.
                                <br /><br />
                                <strong> CONTACT INFORMATION <span class="text-red-500">*</span></strong>
                                <br />
                                If you have questions or concerns regarding your data privacy rights and this Data
                                Privacy Consent, you may contact our Data Protection Officer thru email at
                                dpo@laverdad.edu.ph
                            </p>
                            <div class="mb-5">
                                <input type="checkbox" name="contact_consent" id="contact_consent" value="1" {{ old('contact_consent') ? 'checked' : '' }} required>
                                @if ($errors->has('contact_consent'))
                                <div class="invalid-feedback text-red-500">
                                    {{ $errors->first('contact_consent') }}
                                </div>
                                @endif
                                <label for="data_privacy_consent" class="mx-2">I ACCEPT</label>
                            </div>
                            <p>
                                <strong> IMPORTANT REMINDERS <span class="text-red-500">*</span></strong>
                                <br />
                                List of Applicants who will qualify for the Scholarship Application Program will be
                                posted on the School’s Official Facebook Page (https://www.facebook.com/lvcc.apalit).
                                Under the LVCC’s Data Privacy Policy, documents submitted by applicants who did not
                                qualify including those who did not continue their application will be shredded/deleted
                                after a year.
                            </p>
                            <div class="mb-5">
                                <input type="checkbox" name="document_consent" id="document_consent" value="1" {{ old('document_consent') ? 'checked' : '' }} required>
                                @if ($errors->has('document_consent'))
                                <div class="invalid-feedback text-red-500">
                                    {{ $errors->first('document_consent') }}
                                </div>
                                @endif
                                <label for="document_consent" class="mx-2">I ACCEPT</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid">
                    <button type="button" class="next-btn justify-self-end bg-blue-500 px-10 py-2 border-2 w-1/4 rounded-md border-slate-300 text-white" onclick="updateStepper();
                        ">Next</button>
                </div>
            </div>


            {{-- SECTION 2 --}}
            {{-- Personal Data --}}
            <div id="section-2" class="section">
                <div class="bg-white py-5 px-10 border rounded-md mx-auto mt-10 mb-3">
                    <div class="text-center my-5">
                        <h1 class="font-bold text-2xl ">Applicant's Personal Information</h1>
                        <p><span class="font-bold">Note: </span>Fields with<span class="text-red-500"> *</span> are
                            Required.</p>
                    </div>
                    <div class="grid grid-cols-2 gap-x-6 gap-y-4">
                        <div>
                            <label for="fname" class="text-sm text-slate-700">First Name<span class="text-red-500">
                                    *</span></label>
                            <input type="text" name="fname" id="fname" value="{{ old('fname') }}" required class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                            @if ($errors->has('fname'))
                            <div class="invalid-feedback text-red-500">
                                {{ $errors->first('fname') }}
                            </div>
                            @endif
                        </div>

                        <div>
                            <label for="mname" class="text-sm text-slate-700">Middle Name</label>
                            <input type="text" name="mname" id="mname" value="{{ old('mname') }}" class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                            @if ($errors->has('mname'))
                            <div class="invalid-feedback text-red-500">
                                {{ $errors->first('mname') }}
                            </div>
                            @endif
                        </div>

                        <div>
                            <label for="lname" class="text-sm text-slate-700">Last Name<span class="text-red-500">
                                    *</span></label>
                            <input type="text" name="lname" id="lname" value="{{ old('lname') }}" required class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                            @if ($errors->has('lname'))
                            <div class="invalid-feedback text-red-500">
                                {{ $errors->first('lname') }}
                            </div>
                            @endif
                        </div>

                        <div>
                            <label for="applicant_type" class="text-sm text-slate-700">Applicant Type<span class="text-red-500"> *</span></label>
                            <select name="applicant_type" id="applicant_type" required="required" class="form-control inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                                <option value="" disabled selected hidden>Select Applicant Type</option>
                                <option value="Old Student" {{ old('applicant_type') == 'Old Student' ? 'selected' : '' }}>
                                    Old
                                    Student</option>
                                <option value="New Student" {{ old('applicant_type') == 'New Student' ? 'selected' : '' }}>
                                    New
                                    Student</option>
                                <option value="Old Returnee" {{ old('applicant_type') == 'Old Returnee' ? 'selected' : '' }}>
                                    Old
                                    Returnee</option>
                            </select>
                            @if ($errors->has('applicant_type'))
                            <div class="invalid-feedback text-red-500">
                                {{ $errors->first('applicant_type') }}
                            </div>
                            @endif
                        </div>

                        <div>
                            <label for="birthdate" class="text-sm text-slate-700">Birthdate<span class="text-red-500">
                                    *</span></label>
                            <input class=" items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full" type="date" name="birthdate" id="birthdate" value="{{ old('birthdate') }}" required>
                            @if ($errors->has('birthdate'))
                            <div class="invalid-feedback text-red-500">
                                {{ $errors->first('birthdate') }}
                            </div>
                            @endif
                        </div>

                        <div class="grid">
                            <label for="sex" class="text-sm text-slate-700">Sex<span class="text-red-500">
                                    *</span></label>
                            <div class="grid grid-cols-4">
                                <div>
                                    <input type="radio" name="sex" id="male" value="Male" {{ old('sex') == 'Male' ? 'checked' : '' }} required>
                                    <label for="male">Male</label>
                                </div>
                                <div>
                                    <input type="radio" name="sex" id="female" value="Female" {{ old('sex') == 'Female' ? 'checked' : '' }} required>
                                    <label for="female">Female</label>
                                </div>
                            </div>

                            @if ($errors->has('sex'))
                            <div class="invalid-feedback text-red-500">
                                {{ $errors->first('sex') }}
                            </div>
                            @endif
                        </div>

                        <div>
                            <label for="phone_num" class="text-sm text-slate-700">Phone Number<span class="text-red-500"> *</span></label>
                            <input type="number" name="phone_num" id="phone_num" value="{{ old('phone_num') }}" required minlength="11" maxlength="11" class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                            @if ($errors->has('phone_num'))
                            <div class="invalid-feedback text-red-500">
                                {{ $errors->first('phone_num') }}
                            </div>
                            @endif
                        </div>

                        <div>
                            <label for="fb_link" class="text-sm text-slate-700">Facebook Link<span class="text-red-500"> *</span></label>
                            <input type="text" name="fb_link" id="fb_link" value="{{ old('fb_link') }}" required class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                            @if ($errors->has('fb_link'))
                            <div class="invalid-feedback text-red-500">
                                {{ $errors->first('fb_link') }}
                            </div>
                            @endif
                        </div>

                        <div>
                            <label for="religion" class="text-sm text-slate-700">Religion<span class="text-red-500">*</span></label>
                            <select name="religion" required class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                                <option value="">Select Religion</option>
                                <option value="MCGI" {{ old('religion') === 'MCGI' ? 'selected' : '' }}>MCGI</option>
                                <option value="Roman Catholic" {{ old('religion') === 'Roman Catholic' ? 'selected' : '' }}>Roman Catholic</option>
                                <option value="Jehovah's Witnesses" {{ old('religion') === "Jehovah's Witnesses" ? 'selected' : '' }}>Jehovah's Witnesses</option>
                                <option value="Iglesia ni Cristo" {{ old('religion') === 'Iglesia ni Cristo' ? 'selected' : '' }}>Iglesia ni Cristo</option>
                                <option value="Seventh-day Adventist" {{ old('religion') === 'Seventh-day Adventist' ? 'selected' : '' }}>Seventh-day Adventist</option>
                                <option value="Bible Baptist Church" {{ old('religion') === 'Bible Baptist Church' ? 'selected' : '' }}>Bible Baptist Church</option>
                                <option value="Born Again Christian" {{ old('religion') === 'Born Again Christian' ? 'selected' : '' }}>Born Again Christian</option>
                                <option value="Islam" {{ old('religion') === 'Islam' ? 'selected' : '' }}>Islam</option>
                                <option value="Others" {{ old('religion') === 'Others' ? 'selected' : '' }}>Others</option>
                            </select>
                            @if ($errors->has('religion'))
                            <div class="invalid-feedback text-red-500">
                                {{ $errors->first('religion') }}
                            </div>
                            @endif
                        </div>
                    </div>

                    {{-- Home Address --}}
                    <div class="my-5">
                        <div class="font-bold text-lg">Home Address</div>
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label for="region" class="text-sm text-slate-700">Region<span class="text-red-500"> *</span></label>
                                <select id="region" name="region" required class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                                    <option value="">Select Region</option>
                                </select>
                                @if ($errors->has('region'))
                                <div class="invalid-feedback text-red-500">
                                    {{ $errors->first('region') }}
                                </div>
                                @endif
                            </div>

                            <div>
                                <label for="province" class="text-sm text-slate-700">Province Address<span class="text-red-500"> *</span></label>
                                <select id="province" name="province" required disabled class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                                    <option value="">Select Province</option>
                                </select>
                                @if ($errors->has('province'))
                                <div class="invalid-feedback text-red-500">
                                    {{ $errors->first('province') }}
                                </div>
                                @endif
                            </div>

                            <div>
                                <label for="city_municipality" class="text-sm text-slate-700">City or Municipality<span class="text-red-500"> *</span></label>
                                <select id="city_municipality" name="city_municipality" required disabled class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                                    <option value="">Select Municipality</option>
                                </select>
                                @if ($errors->has('city_municipality'))
                                <div class="invalid-feedback text-red-500">
                                    {{ $errors->first('city_municipality') }}
                                </div>
                                @endif
                            </div>

                            <div>
                                <label for="barangay" class="text-sm text-slate-700">Barangay<span class="text-red-500"> *</span></label>
                                <select id="barangay" name="barangay" required disabled class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                                    <option value="">Select Barangay</option>
                                </select>
                                @if ($errors->has('barangay'))
                                <div class="invalid-feedback text-red-500">
                                    {{ $errors->first('barangay') }}
                                </div>
                                @endif
                            </div>
                            <div>
                                <label for="street" class="text-sm text-slate-700">Street<span class="text-red-500"> *</span></label>
                                <input type="text" id="street" name="street" required class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                                @if ($errors->has('street'))
                                <div class="invalid-feedback text-red-500">
                                    {{ $errors->first('street') }}
                                </div>
                                @endif
                            </div>
                            <div>
                                <label for="zip_code" class="text-sm text-slate-700">Zip Code<span class="text-red-500"> *</span></label>
                                <input type="text" id="zip_code" name="zip_code" required class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                                @if ($errors->has('zip_code'))
                                <div class="invalid-feedback text-red-500">
                                    {{ $errors->first('zip_code') }}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Upload a pic --}}
                    <div class="mt-5">
                        <label for="avatar" class="text-lg font-bold">Upload a Formal Picture<span class="text-red-500"> *</span></label>
                        <p class="text-slate-700 text-sm">White Background with name tag.</p>
                        <input type="file" name="avatar" id="avatar" required accept="image/*" class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                        <div id="avatarSizeError" class="invalid-feedback text-red-500" style="display: none;">
                            File size exceeds the maximum limit of 2MB.
                        </div>
                        @if ($errors->has('avatar'))
                        <div class="invalid-feedback text-red-500">
                            {{ $errors->first('avatar') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-2">
                    <button type="button" class="back-btn justify-self-start bg-slate-100 px-10 py-2 border-2 w-1/2 rounded-md border-slate-300 text-black">Back</button>
                    <button type="button" class="next-btn justify-self-end bg-blue-500 px-10 py-2 border-2 w-1/2 rounded-md border-slate-300 text-white">Next</button>
                </div>
            </div>

            {{-- SECTION 3 --}}
            {{-- Family Data --}}
            <div id="section-3" class="section">
                <div class="bg-white py-5 px-10 border rounded-md mx-auto mt-10 mb-3">
                    <div class="text-center my-5">
                        <h1 class="font-bold text-2xl">Applicant's Family Information</h1>
                        <p><span class="font-bold">Note: </span>If NOT APPLICABLE, write<span class="text-red-500 font-bold"> None</span>.</p>
                    </div>
                    <div class="grid grid-cols-2 gap-x-6 gap-y-4">
                        <div>
                            <label for="total_fam_children" class="text-sm text-slate-700">No. of Children in the
                                Family<span class="text-red-500"> *</span></label>
                            <input type="number" name="total_fam_children" id="total_fam_children" value="{{ old('total_fam_children') }}" min="1" max="99" maxlength="2" required class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                            @if ($errors->has('total_fam_children'))
                            <div class="invalid-feedback text-red-500">
                                {{ $errors->first('total_fam_children') }}
                            </div>
                            @endif
                        </div>

                        <div>
                            <label for="birth_order" class="text-sm text-slate-700">Birth Order of the Applicant<span class="text-red-500"> *</span></label>
                            <input type="number" name="birth_order" id="birth_order" value="{{ old('birth_order') }}" min="1" max="99" maxlength="2" required class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                            @if ($errors->has('birth_order'))
                            <div class="invalid-feedback text-red-500">
                                {{ $errors->first('birth_order') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    {{-- Sibs applying --}}
                    <div class="my-5 space-y-2">
                        <div>
                            <h1 class="font-bold text-lg">SIBLINGS ALSO APPLYING FOR LVCC SCHOLARSHIP GRANT</h1>
                        </div>
                        <div>
                            <p class="font-bold">Sibling 1</p>
                            <div class="grid grid-cols-2 gap-x-6">
                                <div>
                                    <label for="full_name[]" class="text-sm text-slate-700">Name<span class="text-red-500"> *</span></label>
                                    <input type="text" id="full_name" name="full_name[]" required class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full" value="{{ old('full_name.0') }}">
                                    @if ($errors->has('full_name'))
                                    <div class="invalid-feedback text-red-500">
                                        {{ $errors->first('full_name') }}
                                    </div>
                                    @endif
                                </div>
                                <div>
                                    <label for="education_level[]" class="text-sm text-slate-700">Grade Level or
                                        Program <span class="text-red-500"> *</span></label>
                                    <input type="text" id="education_level" name="education_level[]" required class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full" value="{{ old('education_level.0') }}">
                                    @if ($errors->has('education_level'))
                                    <div class="invalid-feedback text-red-500">
                                        {{ $errors->first('education_level') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div>
                            <p class="font-bold">Sibling 2</p>
                            <div class="grid grid-cols-2 gap-x-6">
                                <div>
                                    <label for="full_name[]" class="text-sm text-slate-700">Name<span class="text-red-500"> *</span></label>
                                    <input type="text" id="full_name" name="full_name[]" required class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full" value="{{ old('full_name.1') }}">
                                    @if ($errors->has('full_name'))
                                    <div class="invalid-feedback text-red-500">
                                        {{ $errors->first('full_name') }}
                                    </div>
                                    @endif
                                </div>
                                <div>
                                    <label for="education_level[]" class="text-sm text-slate-700">Grade Level or
                                        Program<span class="text-red-500"> *</span></label>
                                    <input type="text" id="education_level" name="education_level[]" required class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full" value="{{ old('education_level.1') }}">
                                    @if ($errors->has('education_level'))
                                    <div class="invalid-feedback text-red-500">
                                        {{ $errors->first('education_level') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Parents Data --}}
                    <div class="my-5 space-y-2">
                        <div class="font-bold text-lg">PARENT / GUARDIAN DATA</div>
                        <div>
                            <p class="font-bold">Mother's Data</p>
                            <div class="grid grid-cols-2 gap-x-6">
                                <div>
                                    <label for="mother_fname" class="text-sm text-slate-700">Firstname<span class="text-red-500"> *</span></label>
                                    <input type="text" id="mother_fname" name="mother_fname" required class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                                    @if ($errors->has('mother_fname'))
                                    <div class="invalid-feedback text-red-500">
                                        {{ $errors->first('mother_fname') }}
                                    </div>
                                    @endif
                                </div>
                                <div>
                                    <label for="mother_religion" class="text-sm text-slate-700">Religion<span class="text-red-500">*</span></label>
                                    <select name="mother_religion" required class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                                        <option value="">Select Religion</option>
                                        <option value="MCGI" {{ old('mother_religion') === 'MCGI' ? 'selected' : '' }}>MCGI</option>
                                        <option value="Roman Catholic" {{ old('mother_religion') === 'Roman Catholic' ? 'selected' : '' }}>Roman Catholic</option>
                                        <option value="Jehovah's Witnesses" {{ old('mother_religion') === "Jehovah's Witnesses" ? 'selected' : '' }}>Jehovah's Witnesses</option>
                                        <option value="Iglesia ni Cristo" {{ old('mother_religion') === 'Iglesia ni Cristo' ? 'selected' : '' }}>Iglesia ni Cristo</option>
                                        <option value="Seventh-day Adventist" {{ old('mother_religion') === 'Seventh-day Adventist' ? 'selected' : '' }}>Seventh-day Adventist</option>
                                        <option value="Bible Baptist Church" {{ old('mother_religion') === 'Bible Baptist Church' ? 'selected' : '' }}>Bible Baptist Church</option>
                                        <option value="Born Again Christian" {{ old('mother_religion') === 'Born Again Christian' ? 'selected' : '' }}>Born Again Christian</option>
                                        <option value="Islam" {{ old('mother_religion') === 'Islam' ? 'selected' : '' }}>Islam</option>
                                        <option value="Others" {{ old('mother_religion') === 'Others' ? 'selected' : '' }}>Others</option>
                                    </select>
                                    @if ($errors->has('mother_religion'))
                                    <div class="invalid-feedback text-red-500">
                                        {{ $errors->first('mother_religion') }}
                                    </div>
                                    @endif
                                </div>
                                <div>
                                    <label for="mother_mname" class="text-sm text-slate-700">Middle Name (Maiden
                                        Name)<span class="text-red-500"> *</span></label>
                                    <input type="text" id="mother_mname" name="mother_mname" required class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                                    @if ($errors->has('mother_mname'))
                                    <div class="invalid-feedback text-red-500">
                                        {{ $errors->first('mother_mname') }}
                                    </div>
                                    @endif
                                </div>
                                <div>
                                    <label for="mother_occupation" class="text-sm text-slate-700">Occupation<span class="text-red-500"> *</span></label>
                                    <input type="text" id="mother_occupation" name="mother_occupation" required class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                                    @if ($errors->has('mother_occupation'))
                                    <div class="invalid-feedback text-red-500">
                                        {{ $errors->first('mother_occupation') }}
                                    </div>
                                    @endif
                                </div>
                                <div>
                                    <label for="mother_lname" class="text-sm text-slate-700">Last Name: (Maiden
                                        Name)<span class="text-red-500"> *</span></label>
                                    <input type="text" id="mother_lname" name="mother_lname" required class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                                    @if ($errors->has('mother_lname'))
                                    <div class="invalid-feedback text-red-500">
                                        {{ $errors->first('mother_lname') }}
                                    </div>
                                    @endif
                                </div>
                                <div>
                                    <label for="mother_annual_income" class="text-sm text-slate-700">Annual
                                        Income<span class="text-red-500">*</span></label>
                                    <select name="mother_annual_income" id="mother_annual_income" required="required" class="form-control inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                                        <option value="" disabled selected hidden>Select Annual Income Range
                                        </option>
                                        <option value="no income">No Income</option>
                                        <option value="250,000PHP and less">250,000PHP and less</option>
                                        <option value="250,000PHP to 400,000PHP">250,000PHP to 400,000PHP</option>
                                        <option value="400,000PHP to 800,000PHP">400,000PHP to 800,000PHP</option>
                                        <option value="800,000PHP to 2,000,000PHP">800,000PHP to 2,000,000PHP</option>
                                        <option value="2,000,000PHP to 8,000,000PHP">2,000,000PHP to 8,000,000PHP
                                        </option>
                                    </select>
                                    @if ($errors->has('mother_annual_income'))
                                    <div class="invalid-feedback text-red-500">
                                        {{ $errors->first('mother_annual_income') }}
                                    </div>
                                    @endif
                                </div>
                                <div>
                                    <label for="mother_phone_num" class="text-sm text-slate-700">Phone Number<span class="text-red-500"> *</span></label>
                                    <input type="number" name="mother_phone_num" id="mother_phone_num" value="{{ old('mother_phone_num') }}" required minlength="11" maxlength="11" class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                                    @if ($errors->has('mother_phone_num'))
                                    <div class="invalid-feedback text-red-500">
                                        {{ $errors->first('mother_phone_num') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div>
                            <p class="font-bold">Father's Data</p>
                            <div class="grid grid-cols-2 gap-x-6">
                                <div>
                                    <label for="father_fname" class="text-sm text-slate-700">Firstname<span class="text-red-500"> *</span></label>
                                    <input type="text" id="father_fname" name="father_fname" required class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                                    @if ($errors->has('father_fname'))
                                    <div class="invalid-feedback text-red-500">
                                        {{ $errors->first('father_fname') }}
                                    </div>
                                    @endif
                                </div>
                                <div>
                                    <label for="father_religion" class="text-sm text-slate-700">Religion<span class="text-red-500">*</span></label>
                                    <select name="father_religion" required class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                                        <option value="">Select Religion</option>
                                        <option value="MCGI" {{ old('father_religion') === 'MCGI' ? 'selected' : '' }}>MCGI</option>
                                        <option value="Roman Catholic" {{ old('father_religion') === 'Roman Catholic' ? 'selected' : '' }}>Roman Catholic</option>
                                        <option value="Jehovah's Witnesses" {{ old('father_religion') === "Jehovah's Witnesses" ? 'selected' : '' }}>Jehovah's Witnesses</option>
                                        <option value="Iglesia ni Cristo" {{ old('father_religion') === 'Iglesia ni Cristo' ? 'selected' : '' }}>Iglesia ni Cristo</option>
                                        <option value="Seventh-day Adventist" {{ old('father_religion') === 'Seventh-day Adventist' ? 'selected' : '' }}>Seventh-day Adventist</option>
                                        <option value="Bible Baptist Church" {{ old('father_religion') === 'Bible Baptist Church' ? 'selected' : '' }}>Bible Baptist Church</option>
                                        <option value="Born Again Christian" {{ old('father_religion') === 'Born Again Christian' ? 'selected' : '' }}>Born Again Christian</option>
                                        <option value="Islam" {{ old('father_religion') === 'Islam' ? 'selected' : '' }}>Islam</option>
                                        <option value="Others" {{ old('father_religion') === 'Others' ? 'selected' : '' }}>Others</option>
                                    </select>
                                    @if ($errors->has('father_religion'))
                                    <div class="invalid-feedback text-red-500">
                                        {{ $errors->first('father_religion') }}
                                    </div>
                                    @endif
                                </div>
                                <div>
                                    <label for="father_mname" class="text-sm text-slate-700">Middle Name<span class="text-red-500"> *</span></label>
                                    <input type="text" id="father_mname" name="father_mname" required class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                                    @if ($errors->has('father_mname'))
                                    <div class="invalid-feedback text-red-500">
                                        {{ $errors->first('father_mname') }}
                                    </div>
                                    @endif
                                </div>
                                <div>
                                    <label for="father_occupation" class="text-sm text-slate-700">Occupation<span class="text-red-500"> *</span></label>
                                    <input type="text" id="father_occupation" name="father_occupation" required class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                                    @if ($errors->has('father_occupation'))
                                    <div class="invalid-feedback text-red-500">
                                        {{ $errors->first('father_occupation') }}
                                    </div>
                                    @endif
                                </div>
                                <div>
                                    <label for="father_lname" class="text-sm text-slate-700">Last Name<span class="text-red-500"> *</span></label>
                                    <input type="text" id="father_lname" name="father_lname" required class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                                    @if ($errors->has('father_lname'))
                                    <div class="invalid-feedback text-red-500">
                                        {{ $errors->first('father_lname') }}
                                    </div>
                                    @endif
                                </div>
                                <div>
                                    <label for="father_annual_income" class="text-sm text-slate-700">Annual
                                        Income<span class="text-red-500">*</span></label>
                                    <select name="father_annual_income" id="father_annual_income" required="required" class="form-control inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                                        <option value="" disabled selected hidden>Select Annual Income Range
                                        </option>
                                        <option value="no income">No Income</option>
                                        <option value="250,000PHP and less">250,000PHP and less</option>
                                        <option value="250,000PHP to 400,000PHP">250,000PHP to 400,000PHP</option>
                                        <option value="400,000PHP to 800,000PHP">400,000PHP to 800,000PHP</option>
                                        <option value="800,000PHP to 2,000,000PHP">800,000PHP to 2,000,000PHP</option>
                                        <option value="2,000,000PHP to 8,000,000PHP">2,000,000PHP to 8,000,000PHP
                                        </option>
                                    </select>
                                    @if ($errors->has('father_annual_income'))
                                    <div class="invalid-feedback text-red-500">
                                        {{ $errors->first('father_annual_income') }}
                                    </div>
                                    @endif
                                </div>
                                <div>
                                    <label for="father_phone_num" class="text-sm text-slate-700">Phone Number<span class="text-red-500"> *</span></label>
                                    <input type="number" name="father_phone_num" id="father_phone_num" value="{{ old('father_phone_num') }}" required minlength="11" maxlength="11" class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                                    @if ($errors->has('father_phone_num'))
                                    <div class="invalid-feedback text-red-500">
                                        {{ $errors->first('father_phone_num') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        {{-- Guardian's Data --}}
                        <div>
                            <div>
                                <p class="font-bold">Guardian's Data</p>
                                <div class="grid grid-cols-2 gap-x-6">
                                    <div>
                                        <label for="guardian_fname" class="text-sm text-slate-700">Firstname<span class="text-red-500"> *</span></label>
                                        <input type="text" id="guardian_fname" name="guardian_fname" required class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                                        @if ($errors->has('guardian_fname'))
                                        <div class="invalid-feedback text-red-500">
                                            {{ $errors->first('guardian_fname') }}
                                        </div>
                                        @endif
                                    </div>
                                    <div>
                                        <label for="guardian_religion" class="text-sm text-slate-700">Religion<span class="text-red-500">*</span></label>
                                        <select name="guardian_religion" required class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                                            <option value="">Select Religion</option>
                                            <option value="MCGI" {{ old('guardian_religion') === 'MCGI' ? 'selected' : '' }}>MCGI</option>
                                            <option value="Roman Catholic" {{ old('guardian_religion') === 'Roman Catholic' ? 'selected' : '' }}>Roman Catholic</option>
                                            <option value="Jehovah's Witnesses" {{ old('guardian_religion') === "Jehovah's Witnesses" ? 'selected' : '' }}>Jehovah's Witnesses</option>
                                            <option value="Iglesia ni Cristo" {{ old('guardian_religion') === 'Iglesia ni Cristo' ? 'selected' : '' }}>Iglesia ni Cristo</option>
                                            <option value="Seventh-day Adventist" {{ old('guardian_religion') === 'Seventh-day Adventist' ? 'selected' : '' }}>Seventh-day Adventist</option>
                                            <option value="Bible Baptist Church" {{ old('guardian_religion') === 'Bible Baptist Church' ? 'selected' : '' }}>Bible Baptist Church</option>
                                            <option value="Born Again Christian" {{ old('guardian_religion') === 'Born Again Christian' ? 'selected' : '' }}>Born Again Christian</option>
                                            <option value="Islam" {{ old('guardian_religion') === 'Islam' ? 'selected' : '' }}>Islam</option>
                                            <option value="Others" {{ old('guardian_religion') === 'Others' ? 'selected' : '' }}>Others</option>
                                        </select>
                                        @if ($errors->has('guardian_religion'))
                                        <div class="invalid-feedback text-red-500">
                                            {{ $errors->first('guardian_religion') }}
                                        </div>
                                        @endif
                                    </div>
                                    <div>
                                        <label for="guardian_mname" class="text-sm text-slate-700">Middle Name<span class="text-red-500"> *</span>
                                        </label>
                                        <input type="text" id="guardian_mname" name="guardian_mname" required class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                                        @if ($errors->has('guardian_mname'))
                                        <div class="invalid-feedback text-red-500">
                                            {{ $errors->first('guardian_mname') }}
                                        </div>
                                        @endif
                                    </div>
                                    <div>
                                        <label for="guardian_occupation" class="text-sm text-slate-700">Occupation<span class="text-red-500">
                                                *</span></label>
                                        <input type="text" id="guardian_occupation" name="guardian_occupation" required class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                                        @if ($errors->has('guardian_occupation'))
                                        <div class="invalid-feedback text-red-500">
                                            {{ $errors->first('guardian_occupation') }}
                                        </div>
                                        @endif
                                    </div>
                                    <div>
                                        <label for="guardian_lname" class="text-sm text-slate-700">Last Name<span class="text-red-500"> *</span></label>
                                        <input type="text" id="guardian_lname" name="guardian_lname" required class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                                        @if ($errors->has('guardian_lname'))
                                        <div class="invalid-feedback text-red-500">
                                            {{ $errors->first('guardian_lname') }}
                                        </div>
                                        @endif
                                    </div>
                                    <div>
                                        <label for="guardian_annual_income" class="text-sm text-slate-700">Annual
                                            Income<span class="text-red-500"> *</span></label>
                                        <select required="required" name="guardian_annual_income" id="guardian_annual_income" class="form-control inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                                            <option value="" disabled selected hidden>Select Annual Income Range
                                            </option>
                                            <option value="no income">No Income</option>
                                            <option value="250,000PHP and less">250,000PHP and less</option>
                                            <option value="250,000PHP to 400,000PHP">250,000PHP to 400,000PHP</option>
                                            <option value="400,000PHP to 800,000PHP">400,000PHP to 800,000PHP</option>
                                            <option value="800,000PHP to 2,000,000PHP">800,000PHP to 2,000,000PHP
                                            </option>
                                            <option value="2,000,000PHP to 8,000,000PHP">2,000,000PHP to 8,000,000PHP
                                            </option>
                                        </select>
                                        @if ($errors->has('guardian_annual_income'))
                                        <div class="invalid-feedback text-red-500">
                                            {{ $errors->first('guardian_annual_income') }}
                                        </div>
                                        @endif
                                    </div>
                                    <div>
                                        <label for="guardian_phone_num" class="text-sm text-slate-700">Phone
                                            Number<span class="text-red-500"> *</span></label>
                                        <input type="number" name="guardian_phone_num" id="guardian_phone_num" value="{{ old('guardian_phone_num') }}" required minlength="11" maxlength="11" class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                                        @if ($errors->has('guardian_phone_num'))
                                        <div class="invalid-feedback text-red-500">
                                            {{ $errors->first('guardian_phone_num') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            {{-- Upload certificate --}}
                            <div class="my-5">
                                <label for="certificate" class="text-lg font-bold">Upload Image file of one of the
                                    following <span class="text-red-500"> *</span></label>
                                <ul class="text-slate-700 text-sm list-disc list-inside">
                                    <li>Photocopy of Parent/Legal Guardian's Income Tax Return (ITR)</li>
                                    <li>or Certificate of Non-Tax Payment</li>
                                    <li>or Certificate of Indigency</li>
                                </ul>
                                <input type="file" name="certificate" accept="image/*" id="certificate" required class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-1/2">
                                <div id="certSizeError" class="invalid-feedback text-red-500" style="display: none;">
                                    File size exceeds the maximum limit of 2MB.
                                </div>
                                @if ($errors->has('certificate'))
                                <div class="invalid-feedback text-red-500">
                                    {{ $errors->first('certificate') }}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2">
                    <button type="button" class="back-btn justify-self-start bg-slate-100 px-10 py-2 border-2 w-1/2 rounded-md border-slate-300 text-black">Back</button>
                    <button type="button" class="next-btn justify-self-end bg-blue-500 px-10 py-2 border-2 w-1/2 rounded-md border-slate-300 text-white">Next</button>
                </div>
            </div>




            {{-- SECTION 4 --}}
            {{-- Educational Background --}}
            <div id="section-4" class="section">
                <div class="bg-white py-5 px-10 border rounded-md mx-auto mt-10 mb-3">
                    <div class="text-center font-bold text-2xl my-5">Educational Background</div>
                    <div class="grid grid-cols-2 gap-x-6 gap-y-4">
                        <div>
                            <label for="last_school" class="text-sm text-slate-700">Last School Attended<span class="text-red-500"> *</span></label>
                            <input type="text" name="last_school" id="last_school" value="{{ old('last_school') }}" required class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                            @if ($errors->has('last_school'))
                            <div class="invalid-feedback text-red-500">
                                {{ $errors->first('last_school') }}
                            </div>
                            @endif
                        </div>
                        <div>
                            <label for="school_type" class="text-sm text-slate-700">School Type<span class="text-red-500"> *</span></label>
                            <select required="required" name="school_type" id="school_type" class="form-control inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                                <option value="" disabled selected hidden>Select School Type</option>
                                <option value="Public" {{ old('school_type') == 'Public' ? 'selected' : '' }}>Public
                                </option>
                                <option value="Private" {{ old('school_type') == 'Private' ? 'selected' : '' }}>
                                    Private
                                </option>
                                <option value="State University" {{ old('school_type') == 'State University' ? 'selected' : '' }}>
                                    State University</option>
                            </select>
                            @if ($errors->has('school_type'))
                            <div class="invalid-feedback text-red-500">
                                {{ $errors->first('school_type') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div>
                        <label for="last_school_address" class="text-sm text-slate-700">Address of Last School Attended<span class="text-red-500"> *</span></label>
                        <input type="text" name="last_school_address" id="last_school_address" class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full" value="{{ old('last_school_address') }}" required>
                        @if ($errors->has('last_school_address'))
                        <div class="invalid-feedback text-red-500">
                            {{ $errors->first('last_school_address') }}
                        </div>
                        @endif
                    </div>

                    <div class="my-5 space-y-2">
                        <div class="font-bold text-lg">ACADEMIC AWARDS AND ACHIEVEMENTS DURING THE PREVIOUS YEAR <span class="text-red-500"> *</span></div>
                        <div class="grid grid-cols-2">
                            <div>
                                <input type="checkbox" name="award_name[]" id="highest_honors" value="highest_honors" {{ in_array('highest_honors', old('award_name', [])) ? 'checked' : '' }}>
                                @if ($errors->has('highest_honors'))
                                <div class="invalid-feedback text-red-500">
                                    {{ $errors->first('highest_honors') }}
                                </div>
                                @endif
                                <label for="award_name" class="mx-2">With Highest Honors</label>
                            </div>
                            <div>
                                <input type="checkbox" name="award_name[]" id="high_honors" value="high_honors" {{ in_array('high_honors', old('award_name', [])) ? 'checked' : '' }}>
                                @if ($errors->has('award_name'))
                                <div class="invalid-feedback text-red-500">
                                    {{ $errors->first('award_name') }}
                                </div>
                                @endif
                                <label for="high_honors" class="mx-2">With High Honors</label>
                            </div>
                            <div>
                                <input type="checkbox" name="award_name[]" id="honors" value="honors" {{ in_array('honors', old('award_name', [])) ? 'checked' : '' }}>
                                @if ($errors->has('award_name'))
                                <div class="invalid-feedback text-red-500">
                                    {{ $errors->first('award_name') }}
                                </div>
                                @endif
                                <label for="honors" class="mx-2">With Honors</label>
                            </div>
                            <div>
                                <input type="checkbox" name="award_name[]" id="valedictorian" value="valedictorian" {{ in_array('valedictorian', old('award_name', [])) ? 'checked' : '' }}>
                                @if ($errors->has('award_name'))
                                <div class="invalid-feedback text-red-500">
                                    {{ $errors->first('award_name') }}
                                </div>
                                @endif
                                <label for="valedictorian" class="mx-2">Valedictorian</label>
                            </div>
                            <div>
                                <input type="checkbox" name="award_name[]" id="salutatorian" value="salutatorian" {{ in_array('salutatorian', old('award_name', [])) ? 'checked' : '' }}>
                                @if ($errors->has('award_name'))
                                <div class="invalid-feedback text-red-500">
                                    {{ $errors->first('award_name') }}
                                </div>
                                @endif
                                <label for="salutatorian" class="mx-2">Salutatorian</label>
                            </div>
                            <div>
                                <input type="checkbox" name="award_name[]" id="dean's_lister" value="dean_lister" {{ in_array('dean_lister', old('award_name', [])) ? 'checked' : '' }}>
                                @if ($errors->has('award_name'))
                                <div class="invalid-feedback text-red-500">
                                    {{ $errors->first('award_name') }}
                                </div>
                                @endif
                                <label for="dean_lister" class="mx-2">Dean's Lister</label>
                            </div>
                            <div>
                                <input type="checkbox" name="award_name[]" id="president_list" value="president_list" {{ in_array('president_list', old('award_name', [])) ? 'checked' : '' }}>
                                @if ($errors->has('award_name'))
                                <div class="invalid-feedback text-red-500">
                                    {{ $errors->first('award_name') }}
                                </div>
                                @endif
                                <label for="president_list" class="mx-2">President's Lister</label>
                            </div>
                            <div>
                                <input type="checkbox" name="award_name[]" id="not_applicable" value="not_applicable" {{ in_array('not_applicable', old('award_name', [])) ? 'checked' : '' }}>
                                @if ($errors->has('award_name'))
                                <div class="invalid-feedback text-red-500">
                                    {{ $errors->first('award_name') }}
                                </div>
                                @endif
                                <label for="not_applicable" class="mx-2">Not Applicable</label>
                            </div>
                            <div class="col-span-2">
                                <input type="checkbox" name="award_name[]" id="others" value="others" {{ in_array('others', old('award_name', [])) ? 'checked' : '' }}>
                                <label for="others" class="mx-2">Others:</label>
                                <input type="text" id="award_name" name="award_name[]" class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full" {{ in_array('others', old('award_name', [])) ? 'required' : '' }}>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-x-6 gap-y-4">
                        <div>
                            <label for="lrn" class="text-sm text-slate-700">Learner Reference Number (LRN)<span class="text-red-500"> *</span></label>
                            <input type="number" name="lrn" id="lrn" min="0" value="{{ old('lrn') }}" required class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full" maxlength="12">
                            @if ($errors->has('lrn'))
                            <div class="invalid-feedback text-red-500">
                                {{ $errors->first('lrn') }}
                            </div>
                            @endif
                        </div>
                        <div>
                            <label for="esc_grantee" class="text-sm text-slate-700">Is the student an ESC
                                Grantee?<span class="text-red-500"> *</span></label>
                            <select required="required" name="esc_grantee" id="esc_grantee" class="form-control inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                                <option value="" disabled selected hidden>Select option</option>
                                <option value="Yes" {{ old('esc_grantee') == 'Yes' ? 'selected' : '' }}>Yes</option>
                                <option value="No" {{ old('esc_grantee') == 'No' ? 'selected' : '' }}>No</option>
                                <option value="N/A" {{ old('esc_grantee') == 'N/A' ? 'selected' : '' }}>Not Applicable</option>
                            </select>
                            @if ($errors->has('esc_grantee'))
                            <div class="invalid-feedback text-red-500">
                                {{ $errors->first('esc_grantee') }}
                            </div>
                            @endif
                        </div>
                        <div>
                            <label for="esc_num" class="text-sm text-slate-700">ESC Number (if applicable)</label>
                            <input type="number" name="esc_num" id="esc_num" maxlength="20" value="{{ old('esc_num') }}" class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                            @if ($errors->has('esc_num'))
                            <div class="invalid-feedback text-red-500">
                                {{ $errors->first('esc_num') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    {{-- Upload report card --}}
                    <div class="my-5">
                        <label for="report_card" class="text-lg font-bold">Upload Image of the following<span class="text-red-500"> *</span></label>
                        <ul class="text-slate-700 text-sm list-disc list-inside">
                            <li>Photocopy of Previous year's Report Card (F138)</li>
                            <li>Photocopy of Certification of Grades/TOR (For College Transferees)</li>
                        </ul>
                        <input type="file" name="report_card" id="report_card" accept="image/*" required class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-1/2">
                        <div id="cardSizeError" class="invalid-feedback text-red-500" style="display: none;">
                            File size exceeds the maximum limit of 2MB.
                        </div>
                        @if ($errors->has('report_card'))
                        <div class="invalid-feedback text-red-500">
                            {{ $errors->first('report_card') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-2">
                    <button type="button" class="back-btn justify-self-start bg-slate-100 px-10 py-2 border-2 w-1/2 rounded-md border-slate-300 text-black">Back</button>
                    <button type="button" class="next-btn justify-self-end bg-blue-500 px-10 py-2 border-2 w-1/2 rounded-md border-slate-300 text-white">Next</button>
                </div>
            </div>


            {{-- SECTION 5 --}}
            {{-- Program to take --}}
            <div id="section-5" class="section">
                <div class="bg-white py-5 px-10 border rounded-md mx-auto mt-10 mb-3">
                    <div class="text-center font-bold text-2xl my-5">Program Selection</div>
                    <div>
                        <label for="program_id" class="text-sm text-slate-700">Program Choice<span class="text-red-500"> *</span></label>
                        <select name="program_id" id="program_id" required="required" class="form-control inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                            <option value="" disabled selected hidden>Select Program</option>
                            @foreach ($programs as $program)
                            <option value="{{ $program->id }}" {{ old('program_id') == $program->id ? 'selected' : '' }}>
                                {{ $program->program_name }}
                            </option>
                            @endforeach
                        </select>
                        @if ($errors->has('program_id'))
                        <div class="invalid-feedback text-red-500">
                            {{ $errors->first('program_id') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-2">
                    <button type="button" class="back-btn justify-self-start bg-slate-100 px-10 py-2 border-2 w-1/2 rounded-md border-slate-300 text-black">Back</button>
                    <button type="button" class="next-btn justify-self-end bg-blue-500 px-10 py-2 border-2 w-1/2 rounded-md border-slate-300 text-white">Next</button>
                </div>
            </div>



            {{-- SECTION 6 --}}
            {{-- Others --}}
            <div id="section-6" class="section">
                <div class="bg-white py-5 px-10 border rounded-md mx-auto mt-10 mb-3">
                    <div class="text-center font-bold text-2xl my-5">Other Information</div>
                    <div class="font-bold text-lg my-3">INTERNET AND GADGETS</div>
                    <div class="grid grid-cols-2 gap-x-6 gap-y-4">
                        <div>
                            <p>Device/Gadgets to be used during Blended Learning<span class="text-red-500"> *</span></p>
                            <div>
                                <input type="checkbox" name="gadget_name[]" id="smartphone" value="smartphone" {{ in_array('smartphone', old('gadget_name', [])) ? 'checked' : '' }}>
                                <label for="smartphone" class="mx-2">Smartphone</label>
                            </div>
                            <div>
                                <input type="checkbox" name="gadget_name[]" id="tablet" value="tablet" {{ in_array('tablet', old('gadget_name', [])) ? 'checked' : '' }}>
                                <label for="tablet" class="mx-2">Tablet</label>
                            </div>
                            <div>
                                <input type="checkbox" name="gadget_name[]" id="laptop" value="laptop" {{ in_array('laptop', old('gadget_name', [])) ? 'checked' : '' }}>
                                <label for="laptop" class="mx-2">Laptop</label>
                            </div>
                            <div>
                                <input type="checkbox" name="gadget_name[]" id="desktop" value="desktop" {{ in_array('desktop', old('gadget_name', [])) ? 'checked' : '' }}>
                                <label for="desktop" class="mx-2">Desktop/PC</label>
                            </div>
                            @if ($errors->has('gadget_name'))
                            <div class="invalid-feedback text-red-500">
                                {{ $errors->first('gadget_name') }}
                            </div>
                            @endif
                        </div>
                        <div>
                            <p>Internet Connection to be used during Blended Learning<span class="text-red-500">
                                    *</span></p>
                            <div>
                                <input type="checkbox" name="internet_name[]" id="postpaid" value="postpaid" {{ in_array('postpaid', old('internet_name', [])) ? 'checked' : '' }}>
                                @if ($errors->has('internet_name'))
                                <div class="invalid-feedback text-red-500">
                                    {{ $errors->first('internet_name') }}
                                </div>
                                @endif
                                <label for="postpaid" class="mx-2">Prepaid Mobile Data</label>
                            </div>
                            <div>
                                <input type="checkbox" name="internet_name[]" id="prepaid" value="prepaid" {{ in_array('prepaid', old('internet_name', [])) ? 'checked' : '' }}>
                                @if ($errors->has('internet_name'))
                                <div class="invalid-feedback text-red-500">
                                    {{ $errors->first('internet_name') }}
                                </div>
                                @endif
                                <label for="prepaid" class="mx-2">Postpaid Mobile Data</label>
                            </div>
                            <div>
                                <input type="checkbox" name="internet_name[]" id="prepaid_wifi" value="prepaid_wifi" {{ in_array('prepaid_wifi', old('internet_name', [])) ? 'checked' : '' }}>
                                @if ($errors->has('internet_name'))
                                <div class="invalid-feedback text-red-500">
                                    {{ $errors->first('internet_name') }}
                                </div>
                                @endif
                                <label for="prepaid_wifi" class="mx-2">Prepaid Wifi (Ex: Globe at Home, PLDT
                                    Home, etc.)</label>
                            </div>
                            <div>
                                <input type="checkbox" name="internet_name[]" id="broadband" value="broadband" {{ in_array('broadband', old('internet_name', [])) ? 'checked' : '' }}>
                                @if ($errors->has('internet_name'))
                                <div class="invalid-feedback text-red-500">
                                    {{ $errors->first('internet_name') }}
                                </div>
                                @endif
                                <label for="broadband" class="mx-2">Broadband Line (Ex: PLDT Fibr,
                                    Converge, Sky Fibr, etc.)</label>
                            </div>
                        </div>
                    </div>
                    <div class="font-bold text-lg my-3">ELECTRIC CONSUMPTION FOR THE LAST THREE MONTHS</div>
                    <div class="grid grid-cols-2 gap-x-6 gap-y-4">
                        <div>
                            <label for="electric_month_1" class="text-sm text-slate-700">Month 1<span class="text-red-500"> *</span></label>
                            <select required="required" name="electric_bills[0][electric_month]" id="electric_month_1" class="form-control inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                                <option value="" disabled selected hidden>Select a month</option>
                                <option value="january">January</option>
                                <option value="february">February</option>
                                <option value="march">March</option>
                                <option value="april">April</option>
                                <option value="may">May</option>
                                <option value="june">June</option>
                                <option value="july">July</option>
                                <option value="august">August</option>
                                <option value="september">September</option>
                                <option value="october">October</option>
                                <option value="november">November</option>
                                <option value="december">December</option>
                            </select>
                        </div>
                        <div>
                            <label for="electric_amount_1" class="text-sm text-slate-700">Electric Bill for Month
                                1<span class="text-red-500"> *</span></label>
                            <input type="number" id="electric_amount_1" name="electric_bills[0][electric_amount]" minlength="0" maxlength="6" required class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                        </div>
                        <div>
                            <label for="electric_month_2" class="text-sm text-slate-700">Month 2<span class="text-red-500"> *</span></label>
                            <select required="required" name="electric_bills[1][electric_month]" id="electric_month_2" class="form-control inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                                <option value="" disabled selected hidden>Select a month</option>
                                <option value="january">January</option>
                                <option value="february">February</option>
                                <option value="march">March</option>
                                <option value="april">April</option>
                                <option value="may">May</option>
                                <option value="june">June</option>
                                <option value="july">July</option>
                                <option value="august">August</option>
                                <option value="september">September</option>
                                <option value="october">October</option>
                                <option value="november">November</option>
                                <option value="december">December</option>
                            </select>
                        </div>
                        <div>
                            <label for="electric_amount_2" class="text-sm text-slate-700">Electric Bill for Month
                                2<span class="text-red-500"> *</span></label>
                            <input type="number" id="electric_amount_2" name="electric_bills[1][electric_amount]" minlength="0" maxlength="6" required class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                        </div>
                        <div>
                            <label for="electric_month_3" class="text-sm text-slate-700">Month 3<span class="text-red-500"> *</span></label>
                            <select required="required" name="electric_bills[2][electric_month]" id="electric_month_3" class="form-control inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                                <option value="" disabled selected hidden>Select a month</option>
                                <option value="january">January</option>
                                <option value="february">February</option>
                                <option value="march">March</option>
                                <option value="april">April</option>
                                <option value="may">May</option>
                                <option value="june">June</option>
                                <option value="july">July</option>
                                <option value="august">August</option>
                                <option value="september">September</option>
                                <option value="october">October</option>
                                <option value="november">November</option>
                                <option value="december">December</option>
                            </select>
                        </div>
                        <div>
                            <label for="electric_amount_3" class="text-sm text-slate-700">Electric Bill for Month
                                3<span class="text-red-500"> *</span></label>
                            <input type="number" id="electric_amount_3" name="electric_bills[2][electric_amount]" minlength="0" maxlength="6" required class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                        </div>
                    </div>
                    <div class="mt-5">
                        <label for="free_ebill_reason" class="text-sm text-slate-700">If your electric consumption is
                            free, please provide a brief explanation why it’s free. </label>
                        <input type="text" id="free_ebill_reason" name="free_ebill_reason" class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                    </div>
                    {{-- Upload a ebill proof --}}
                    <div class="my-5">
                        <label for="ebill_proof">Upload a Clear Picture of the Electric Bills for the last three months
                            <span class="text-red-500"> *</span></label>
                        <input type="file" name="ebill_proof" id="ebill_proof" accept="image/*" required class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-1/2">
                        <div id="eBillSizeError" class="invalid-feedback text-red-500" style="display: none;">
                            File size exceeds the maximum limit of 2MB.
                        </div>
                        @if ($errors->has('ebill_proof'))
                        <div class="invalid-feedback text-red-500">
                            {{ $errors->first('ebill_proof') }}
                        </div>
                        @endif
                    </div>
                    <div class="my-5 space-y-2">
                        <div class="font-bold text-lg">OWNERSHIP OF THE HOUSING UNIT<span class="text-red-500">
                                *</span></div>
                        <div>
                            <div>
                                <input type="radio" name="ownership_type" id="owned_fully_paid" value="Owned, Fully Paid" {{ old('ownership_type') == 'Owned, Fully Paid' ? 'checked' : '' }}>
                                <label for="owned_fully_paid" class="mx-2">Owned, Fully Paid</label>
                            </div>
                            <div>
                                <input type="radio" name="ownership_type" id="owned_amortized" value="Owned, Amortized" {{ old('ownership_type') == 'Owned, Amortized' ? 'checked' : '' }}>
                                <label for="owned_amortized" class="mx-2">Owned, Amortized</label>
                            </div>
                            <div>
                                <input type="radio" name="ownership_type" id="rented" value="Rented" {{ old('ownership_type') == 'Rented' ? 'checked' : '' }}>
                                <label for="rented" class="mx-2">Rented</label>
                            </div>
                            <div>
                                <input type="radio" name="ownership_type" id="free_living" value="Free/Living with relatives/Inherited" {{ old('ownership_type') == 'Free/Living with relatives/Inherited' ? 'checked' : '' }}>
                                <label for="free_living" class="mx-2">Free/Living with relatives/Inherited</label>
                            </div>
                        </div>
                        <div>
                            <label for="monthly_rental" class="mx-2">If you're renting, please enter monthly rental
                                fee:</label>
                            <input type="number" id="monthly_rental" maxlength="6" name="monthly_rental" value="{{ old('monthly_rental') }}" class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2">
                    <button type="button" class="back-btn justify-self-start bg-slate-100 px-10 py-2 border-2 w-1/2 rounded-md border-slate-300 text-black">Back</button>
                    <button type="button" class="next-btn justify-self-end bg-blue-500 px-10 py-2 border-2 w-1/2 rounded-md border-slate-300 text-white">Next</button>

                </div>
            </div>
            {{-- SECTION 7 --}}
            {{-- Program to take --}}
            <div id="section-7" class="section">
                <div class="bg-white py-5 px-10 border rounded-md mx-auto mt-10 mb-3">
                    <div class="text-center font-bold text-2xl my-5">Signed Declaration and Data Privacy Consent</div>
                    <p class="capitalized">Signed declaration by the parents/legal guardian:</p>
                    <p><em>“I/We hereby certify to the truthfulness and completeness of the information provided. Any
                            misinformation or withholding of information will automatically disqualify my/our child from
                            the
                            LVCC Scholarship Program. In connection with this application for financial aid, I/we hereby
                            authorize the LVCC Scholarship Committee to conduct an investigation on the family's
                            finances,
                            including bank accounts, credit card, SSS, GSIS, etc. and visit our family's dwelling
                            place.”</em>
                    </p>
                    <div class="mb-5">
                        <input type="checkbox" name="data_privacy_consent" required id="data_privacy_consent" value="1" {{ old('data_privacy_consent') ? 'checked' : '' }}>
                        @if ($errors->has('data_privacy_consent'))
                        <div class="invalid-feedback text-red-500">
                            {{ $errors->first('data_privacy_consent') }}
                        </div>
                        @endif
                        <label for="data_privacy_consent" class="mx-2">I ACCEPT</label>
                    </div>
                </div>
                <div class="grid grid-cols-2">
                    <button type="button" class="back-btn justify-self-start bg-slate-100 px-10 py-2 border-2 w-1/2 rounded-md border-slate-300 text-black">Back</button>
                    <button type="submit" class="justify-self-end bg-blue-700 px-10 py-2 border-2 w-fit rounded-md border-slate-300 text-white">Submit Application</button>
                </div>
            </div>
        </form>
    </div>
    </div>
    <!-- Modal -->
    <div id="modal" class="fixed z-10 inset-0 overflow-hidden hidden">
        <div class="flex items-center justify-center h-screen px-4 bg-slate-400 bg-opacity-50">
            <div class="bg-white rounded-lg shadow-xl max-w-md w-full px-6 py-4">
                <div>
                    <div class="flex justify-between items-center">
                        <h1 class="font-bold uppercase text-lg text-yellow-500">Warning!</h1>
                        <span class="close text-3xl text-gray-500 font-bold hover:text-yellow-600 cursor-pointer">&times;</span>
                    </div>
                    <p class="mt-3">Please fill the required fields to proceed to the next page.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="errorModal" class="fixed z-10 inset-0 overflow-hidden hidden">
        <div class="flex items-center justify-center h-screen px-4 bg-slate-400 bg-opacity-50">
            <div class="bg-white rounded-lg shadow-xl max-w-md w-full px-6 py-4">
                <div>
                    <div class="flex justify-between items-center">
                        <h1 class="font-bold uppercase text-lg text-yellow-500">Warning!</h1>
                        <span class="close text-3xl text-gray-500 font-bold hover:text-yellow-600 cursor-pointer">&times;</span>
                    </div>
                    <p class="mt-3" id="errorMessage"></p>
                </div>
            </div>
        </div>
    </div>


</x-form-layout>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Load regions on page load
        loadRegions();

        // Handle region selection change event
        $('#region').on('change', function() {
            var regionId = $(this).val();

            if (regionId) {
                // Enable and load provinces based on the selected region
                loadProvinces(regionId);
            } else {
                // Reset and disable province, municipality, and barangay dropdowns
                resetDropdown('#province');
                resetDropdown('#city_municipality');
                resetDropdown('#barangay');
            }
        });

        // Handle province selection change event
        $('#province').on('change', function() {
            var provinceId = $(this).val();

            if (provinceId) {
                // Enable and load municipalities based on the selected province
                loadMunicipalities(provinceId);
            } else {
                // Reset and disable municipality and barangay dropdowns
                resetDropdown('#city_municipality');
                resetDropdown('#barangay');
            }
        });

        // Handle municipality selection change event
        $('#city_municipality').on('change', function() {
            var municipalityId = $(this).val();

            if (municipalityId) {
                // Enable and load barangays based on the selected municipality
                loadBarangays(municipalityId);
            } else {
                // Reset and disable barangay dropdown
                resetDropdown('#barangay');
            }
        });

        function loadRegions() {
            // Make an AJAX request to fetch the regions
            $.ajax({
                url: '/regions', // Replace with your Laravel route for fetching regions
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Populate the region dropdown with options
                    populateDropdown('#region', data);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        }

        function loadProvinces(regionId) {
            // Make an AJAX request to fetch the provinces based on the selected region
            $.ajax({
                url: '/provinces/' + regionId, // Replace with your Laravel route for fetching provinces by region
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Populate the province dropdown with options
                    populateDropdown('#province', data);

                    // Enable the province dropdown
                    enableDropdown('#province');

                    // Reset and disable municipality and barangay dropdowns
                    resetDropdown('#city_municipality');
                    resetDropdown('#barangay');
                    disableDropdown('#city_municipality');
                    disableDropdown('#barangay');
                },
                error: function(xhr, status, error) {
                    // Handle the error case if the AJAX request fails
                    console.error(error);
                }
            });
        }

        function loadMunicipalities(provinceId) {
            // Make an AJAX request to fetch the municipalities based on the selected province
            $.ajax({
                url: '/municipalities/' + provinceId, // Replace with your Laravel route for fetching municipalities by province
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Populate the city_municipality dropdown with options
                    populateDropdown('#city_municipality', data);

                    // Enable the city_municipality dropdown
                    enableDropdown('#city_municipality');

                    // Reset and disable barangay dropdown
                    resetDropdown('#barangay');
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        }

        function loadBarangays(municipalityId) {
            // Make an AJAX request to fetch the barangays based on the selected municipality
            $.ajax({
                url: '/barangays/' + municipalityId, // Replace with your Laravel route for fetching barangays by municipality
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Populate the barangay dropdown with options
                    populateDropdown('#barangay', data);

                    // Enable the barangay dropdown
                    enableDropdown('#barangay');
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        }

        function populateDropdown(selector, data) {
            var dropdown = $(selector);

            // Clear existing options
            dropdown.empty();

            // Add a default option
            dropdown.append('<option value="">Select...</option>');

            // Add options from the data
            $.each(data, function(index, item) {
                dropdown.append('<option value="' + item.id + '">' + item.name + '</option>');
            });
        }

        function enableDropdown(selector) {
            $(selector).prop('disabled', false);
        }

        function resetDropdown(selector) {
            $(selector).empty().prop('disabled', true);
        }
    });

    $(document).ready(function() {
        // Show the first section and hide the others
        $('#section-1').show();
        $('#section-2').hide();
        $('#section-3').hide();
        $('#section-4').hide();
        $('#section-5').hide();
        $('#section-6').hide();
        $('#section-7').hide();

        var modal = document.getElementById("modal");

        // Get the form and submit button elements
        var form = document.getElementById('form');
        var submitBtn = document.getElementById('submit-btn');
        var errorModal = document.getElementById('errorModal');
        var errorMessage = document.getElementById('errorMessage');

        // Add an event listener to the form's submit event
        form.addEventListener('submit', function(event) {
            // Get the selected checkboxes

            var gadget = document.querySelectorAll('input[name="gadget_name[]"]:checked');
            var internet = document.querySelectorAll('input[name="internet_name[]"]:checked');
            var award = document.querySelectorAll('input[name="award_name[]"]:checked');
            var selectedMonth1 = document.getElementById('electric_month_1').value;
            var selectedMonth2 = document.getElementById('electric_month_2').value;
            var selectedMonth3 = document.getElementById('electric_month_3').value;
            var selectedProgram = document.getElementById('program_id').value;
            var ownership = document.querySelector('input[name="ownership_type"]:checked');
            var escGranteeSelect = document.getElementById('esc_grantee');
            var selectedOption = escGranteeSelect.value;

            // Check if at least one checkbox is selected
            if (gadget.length === 0) {
                // Prevent the form from submitting
                event.preventDefault();
                // Display an error message to the user
                errorMessage.textContent = 'Please select at least one gadget.';
                errorModal.style.display = 'block';
            }

            // Check if at least one checkbox is selected
            if (internet.length === 0) {
                // Prevent the form from submitting
                event.preventDefault();
                // Display an error message to the user
                errorMessage.textContent = 'Please select at least one internet type.';
                errorModal.style.display = 'block';
            }

            // Check if at least one checkbox is selected
            if (award.length === 0) {
                // Prevent the form from submitting
                event.preventDefault();
                // Display an error message to the user
                errorMessage.textContent = 'Please select at least one award. If none, please select not applicable.';
                errorModal.style.display = 'block';
            }

            // Check if a month is selected
            if (selectedMonth1 === '') {
                // Prevent the form from submitting
                event.preventDefault();
                // Display an error message to the user
                errorMessage.textContent = 'Please select the 1st month for electric bills.';
                errorModal.style.display = 'block';
            }

            // Check if a month is selected
            if (selectedMonth2 === '') {
                // Prevent the form from submitting
                event.preventDefault();
                // Display an error message to the user
                errorMessage.textContent = 'Please select the 1st month for electric bills.';
                errorModal.style.display = 'block';
            }

            // Check if a month is selected
            if (selectedMonth3 === '') {
                // Prevent the form from submitting
                event.preventDefault();
                // Display an error message to the user
                errorMessage.textContent = 'Please select the 1st month for electric bills.';
                errorModal.style.display = 'block';
            }

            // Check if a program is selected
            if (selectedProgram === '') {
                // Prevent the form from submitting
                event.preventDefault();
                // Display an error message to the user
                errorMessage.textContent = 'Please select a program of your choice.';
                errorModal.style.display = 'block';
            }

            // Check if an option is selected
            if (!ownership) {
                // Prevent the form from submitting
                event.preventDefault();
                // Display an error message to the user
                errorMessage.textContent = 'Please select ownership type.';
                errorModal.style.display = 'block';
            } else if (ownership.value === 'Others' && document.getElementById('ownership_type').value === '') {
                // Check if the "Others" option is selected but the text input is empty
                event.preventDefault();
                errorMessage.textContent = 'Please provide an ownership type in the "Others" field.';
                errorModal.style.display = 'block';
            }

            // Check if an option is selected
            if (selectedOption === '') {
                // Prevent the form from submitting
                event.preventDefault();
                // Display an error message to the user
                errorMessage.textContent = 'Please select esc grantee type.';
                errorModal.style.display = 'block';
            }
        });

        // Get the close button element
        var closeButton = document.querySelector('#errorModal .close');

        // Add an event listener to the close button's click event
        closeButton.addEventListener('click', function() {
            errorModal.style.display = 'none';
        });


        // Handle next button clicks
        $('.next-btn').click(function() {
            var current = $(this).closest('.section');
            var next = current.next('.section');
            updateStepper();

            // Check if required input fields and select fields are filled
            var requiredFields_1 = current.find('input[required]');
            var requiredFields_2 = current.find('select');
            var isValid = true;

            requiredFields_1.each(function() {
                if ($(this).is('input[type="checkbox"]') && !$(this).prop('checked')) {
                    isValid = false;
                    $(this).addClass('error');
                } else if ($(this).is('input') && $(this).val() === '') {
                    isValid = false;
                    $(this).addClass('error');
                } else {
                    $(this).removeClass('error');
                }
            });

            requiredFields_2.each(function() {
                if ($(this).val() === '') {
                    isValid = false;
                    $(this).addClass('error');
                } else if ($(this).is('select') && $(this).val() === '') {
                    isValid = false;
                    $(this).addClass('error');
                } else {
                    $(this).removeClass('error');
                }
            });


            // Proceed to next section or show error message
            if (isValid) {
                current.hide();
                next.show();
                scrollToTop();
            } else {
                // Display modal with error message
                var modal = $('#modal');
                modal.show();
            }

            function scrollToTop() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            }
        });

        const lrnInput = document.getElementById('lrn');

        lrnInput.addEventListener('input', function(event) {
            const value = event.target.value;

            // Remove any occurrence of 'e' from the input value
            const sanitizedValue = value.replace(/e/gi, '');

            // Update the input value with the sanitized value
            event.target.value = sanitizedValue;
        });

        var span = document.getElementsByClassName("close")[0];
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // Handle back button clicks
        $('.back-btn').click(function() {
            var current = $(this).closest('.section');
            var prev = current.prev('.section');
            current.hide();
            prev.show();
        });

        // Add an event listener to the file input element
        document.getElementById('avatar').addEventListener('change', function() {
            var fileInput = this;
            var maxSize = 2 * 1024 * 1024; // Maximum size in bytes (2MB)

            // Check if the selected file exceeds the maximum size
            if (fileInput.files[0] && fileInput.files[0].size > maxSize) {
                // Show the error message
                document.getElementById('avatarSizeError').style.display = 'block';
                // Clear the file input value to prevent submitting the oversized file
                fileInput.value = '';
            } else {
                // Hide the error message (if previously shown)
                document.getElementById('avatarSizeError').style.display = 'none';
            }
        });

        // Add an event listener to the file input element
        document.getElementById('certificate').addEventListener('change', function() {
            var fileInput = this;
            var maxSize = 2 * 1024 * 1024; // Maximum size in bytes (2MB)

            // Check if the selected file exceeds the maximum size
            if (fileInput.files[0] && fileInput.files[0].size > maxSize) {
                // Show the error message
                document.getElementById('certSizeError').style.display = 'block';
                // Clear the file input value to prevent submitting the oversized file
                fileInput.value = '';
            } else {
                // Hide the error message (if previously shown)
                document.getElementById('certSizeError').style.display = 'none';
            }
        });

        // Add an event listener to the file input element
        document.getElementById('report_card').addEventListener('change', function() {
            var fileInput = this;
            var maxSize = 2 * 1024 * 1024; // Maximum size in bytes (2MB)

            // Check if the selected file exceeds the maximum size
            if (fileInput.files[0] && fileInput.files[0].size > maxSize) {
                // Show the error message
                document.getElementById('cardSizeError').style.display = 'block';
                // Clear the file input value to prevent submitting the oversized file
                fileInput.value = '';
            } else {
                // Hide the error message (if previously shown)
                document.getElementById('cardSizeError').style.display = 'none';
            }
        });

        // Add an event listener to the file input element
        document.getElementById('ebill_proof').addEventListener('change', function() {
            var fileInput = this;
            var maxSize = 2 * 1024 * 1024; // Maximum size in bytes (2MB)

            // Check if the selected file exceeds the maximum size
            if (fileInput.files[0] && fileInput.files[0].size > maxSize) {
                // Show the error message
                document.getElementById('eBillSizeError').style.display = 'block';
                // Clear the file input value to prevent submitting the oversized file
                fileInput.value = '';
            } else {
                // Hide the error message (if previously shown)
                document.getElementById('eBillSizeError').style.display = 'none';
            }
        });
    });

    // Array of input field IDs
    const inputFieldIds = [
        "phone_num",
        "total_fam_children",
        "birth_order",
        "mother_phone_num",
        "father_phone_num",
        "guardian_phone_num",
        "lrn",
        "esc_num",
        "electric_amount_1",
        "electric_amount_2",
        "electric_amount_3",
        "monthly_rental",
    ];

    // Loop through each ID and apply the restrictToNumbers function
    inputFieldIds.forEach(function(id) {
        const inputField = document.getElementById(id);
        restrictToNumbers(inputField);
    });

    function restrictToNumbers(inputField) {
        if (inputField) {
            inputField.addEventListener("input", function(event) {
                var maxLength = inputField.getAttribute("maxlength");
                if (maxLength && event.target.value.length > maxLength) {
                    event.target.value = event.target.value.slice(0, maxLength);
                }
            });
            inputField.addEventListener("keypress", function(event) {
                if (isNaN(event.key)) {
                    event.preventDefault();
                }
            });
        }
    }

    // Loop through each ID and apply the restrictToNumbers function
    inputFieldIds.forEach(function(id) {
        const inputField = document.getElementById(id);
        restrictToNumbers(inputField);
    });

    // Stepper
    let currentStep = 1;

    const stepperItems = document.querySelectorAll('.flex.w-full.items-center');
    stepperItems.forEach((item, index) => {
        item.addEventListener('click', () => {
            // Update the current step
            currentStep = index + 1;

            // Update the UI
            updateStepper();
        });
    });

    function updateStepper() {
        stepperItems.forEach((item, index) => {
            if (index < currentStep - 1) {
                item.classList.add('after:text-blue-600', 'after:border-white');
            } else if (index === currentStep - 1) {
                item.classList.remove('after:text-blue-600', 'after:border-blue-100');
                item.classList.add('after:text-gray-500', 'after:border-gray-100');
            } else {
                item.classList.remove('after:text-blue-600', 'after:border-blue-100', 'after:text-gray-500',
                    'after:border-gray-100');
            }
        });
    }
</script>