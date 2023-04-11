<form method="POST" action="{{ route('applicants.store') }}" enctype="multipart/form-data">
    @csrf

    <div>
        <label for="fname">First Name</label>
        <input type="text" name="fname" id="fname" value="{{ old('fname') }}" required>
        @if ($errors->has('fname'))
        <div class="invalid-feedback text-red-500">
            {{ $errors->first('fname') }}
        </div>
        @endif
    </div>

    <div>
        <label for="mname">Middle Name</label>
        <input type="text" name="mname" id="mname" value="{{ old('mname') }}">
        @if ($errors->has('mname'))
        <div class="invalid-feedback text-red-500">
            {{ $errors->first('mname') }}
        </div>
        @endif
    </div>

    <div>
        <label for="lname">Last Name</label>
        <input type="text" name="lname" id="lname" value="{{ old('lname') }}" required>
        @if ($errors->has('lname'))
        <div class="invalid-feedback text-red-500">
            {{ $errors->first('lname') }}
        </div>
        @endif
    </div>

    <div>
        <label for="applicant_type">Applicant Type</label>
        <select name="applicant_type" id="applicant_type" required>
            <option value="">-- Select Applicant Type --</option>
            <option value="Old Student" {{ old('applicant_type') == 'Old Student' ? 'selected' : '' }}>Old Student</option>
            <option value="New Student" {{ old('applicant_type') == 'New Student' ? 'selected' : '' }}>New Student</option>
            <option value="Old Returnee" {{ old('applicant_type') == 'Old Returnee' ? 'selected' : '' }}>Old Returnee</option>
        </select>
        @if ($errors->has('applicant_type'))
        <div class="invalid-feedback text-red-500">
            {{ $errors->first('applicant_type') }}
        </div>
        @endif
    </div>

    <div>
        <label for="sex">Sex</label>
        <input type="radio" name="sex" id="male" value="Male" {{ old('sex') == 'Male' ? 'checked' : '' }} required>
        <label for="male">Male</label>
        <input type="radio" name="sex" id="female" value="Female" {{ old('sex') == 'Female' ? 'checked' : '' }} required>
        <label for="female">Female</label>
        @if ($errors->has('sex'))
        <div class="invalid-feedback text-red-500">
            {{ $errors->first('sex') }}
        </div>
        @endif
    </div>

    <div>
        <label for="birthdate">Birthdate</label>
        <input type="date" name="birthdate" id="birthdate" value="{{ old('birthdate') }}" required>
        @if ($errors->has('birthdate'))
        <div class="invalid-feedback text-red-500">
            {{ $errors->first('birthdate') }}
        </div>
        @endif
    </div>

    <div>
        <label for="phone_num">Phone Number</label>
        <input type="text" name="phone_num" id="phone_num" value="{{ old('phone_num') }}" required>
        @if ($errors->has('phone_num'))
        <div class="invalid-feedback text-red-500">
            {{ $errors->first('phone_num') }}
        </div>
        @endif
    </div>

    <div>
        <label for="fb_link">Facebook Link</label>
        <input type="text" name="fb_link" id="fb_link" value="{{ old('fb_link') }}" required>
        @if ($errors->has('fb_link'))
        <div class="invalid-feedback text-red-500">
            {{ $errors->first('fb_link') }}
        </div>
        @endif
    </div>

    <div>
        <label for="religion">Religion</label>
        <input type="text" name="religion" id="religion" value="{{ old('religion') }}" required>
        @if ($errors->has('religion'))
        <div class="invalid-feedback text-red-500">
            {{ $errors->first('religion') }}
        </div>
        @endif
    </div>

    <div>
        <label for="avatar">Avatar</label>
        <input type="file" name="avatar" id="avatar" required>
        @if ($errors->has('avatar'))
        <div class="invalid-feedback text-red-500">
            {{ $errors->first('avatar') }}
        </div>
        @endif
    </div>

    <div>
        <label for="total_fam_members">Total Family Members</label>
        <input type="number" name="total_fam_members" id="total_fam_members" value="{{ old('total_fam_members') }}" required>
        @if ($errors->has('total_fam_members'))
        <div class="invalid-feedback text-red-500">
            {{ $errors->first('total_fam_members') }}
        </div>
        @endif
    </div>

    <div>
        <label for="birth_order">Birth Order</label>
        <input type="text" name="birth_order" id="birth_order" value="{{ old('birth_order') }}" required>
        @if ($errors->has('birth_order'))
        <div class="invalid-feedback text-red-500">
            {{ $errors->first('birth_order') }}
        </div>
        @endif
    </div>
    <div>
        <label for="last_school">Last School Attended</label>
        <input type="text" name="last_school" id="last_school" value="{{ old('last_school') }}" required>
        @if ($errors->has('last_school'))
        <div class="invalid-feedback text-red-500">
            {{ $errors->first('last_school') }}
        </div>
        @endif
    </div>
    <div>
        <label for="last_school_address">Address of Last School Attended</label>
        <textarea name="last_school_address" id="last_school_address" required>{{ old('last_school_address') }}</textarea>
        @if ($errors->has('last_school_address'))
        <div class="invalid-feedback text-red-500">
            {{ $errors->first('last_school_address') }}
        </div>
        @endif
    </div>
    <div>
        <label for="school_type">School Type</label>
        <select name="school_type" id="school_type" required>
            <option value="" disabled selected>Select School Type</option>
            <option value="Public" {{ old('school_type') == 'Public' ? 'selected' : '' }}>Public</option>
            <option value="Private" {{ old('school_type') == 'Private' ? 'selected' : '' }}>Private</option>
            <option value="State University" {{ old('school_type') == 'State University' ? 'selected' : '' }}>State University</option>
        </select>
        @if ($errors->has('school_type'))
        <div class="invalid-feedback text-red-500">
            {{ $errors->first('school_type') }}
        </div>
        @endif
    </div>
    <div>
        <label for="lrn">Learner Reference Number (LRN)</label>
        <input type="text" name="lrn" id="lrn" value="{{ old('lrn') }}" required>
        @if ($errors->has('lrn'))
        <div class="invalid-feedback text-red-500">
            {{ $errors->first('lrn') }}
        </div>
        @endif
    </div>
    <div>
        <label for="esc_grantee">Is the student an ESC Grantee?</label>
        <select name="esc_grantee" id="esc_grantee" required>
            <option value="" disabled selected>Select</option>
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
        <label for="esc_num">ESC Number (if applicable)</label>
        <input type="text" name="esc_num" id="esc_num" value="{{ old('esc_num') }}">
        @if ($errors->has('esc_num'))
        <div class="invalid-feedback text-red-500">
            {{ $errors->first('esc_num') }}
        </div>
        @endif
    </div>
    <div>
        <label for="program_id">Program Choice</label>
        <select name="program_id" id="program_id" required>
            <option value="" disabled selected>Select Program</option>
            @foreach($programs as $program)
            <option value="{{ $program->id }}" {{ old('program_id') == $program->id ? 'selected' : '' }}>{{ $program->program_name }}</option>
            @endforeach
        </select>
        @if ($errors->has('program_id'))
        <div class="invalid-feedback text-red-500">
            {{ $errors->first('program_id') }}
        </div>
        @endif
    </div>
    <div>
        <label for="free_ebill_reason">Reason for availing of the free e-bill service</label>
        <textarea name="free_ebill_reason" id="free_ebill_reason" required>{{ old('free_ebill_reason') }}</textarea>
        @if ($errors->has('free_ebill_reason'))
        <div class="invalid-feedback text-red-500">
            {{ $errors->first('free_ebill_reason') }}
        </div>
        @endif
    </div>
    <div>
        <label for="monthly_rental">Monthly Rental</label>
        <input type="number" name="monthly_rental" id="monthly_rental" min="0" step="0.01" value="{{ old('monthly_rental') }}" required>
        @if ($errors->has('monthly_rental'))
        <div class="invalid-feedback text-red-500">
            {{ $errors->first('monthly_rental') }}
        </div>
        @endif
    </div>
    <div>
        <label for="data_privacy_consent">Data Privacy Consent</label>
        <input type="checkbox" name="data_privacy_consent" id="data_privacy_consent" value="1" {{ old('data_privacy_consent') ? 'checked' : '' }}>
        @if ($errors->has('data_privacy_consent'))
        <div class="invalid-feedback text-red-500">
            {{ $errors->first('data_privacy_consent') }}
        </div>
        @endif
    </div>

    <div>
        <label for="date_accomplished">Date Accomplished</label>
        <input type="date" name="date_accomplished" id="date_accomplished" value="{{ old('date_accomplished') }}" required>
        @if ($errors->has('date_accomplished'))
        <div class="invalid-feedback text-red-500">
            {{ $errors->first('date_accomplished') }}
        </div>
        @endif
    </div>
    <div>
        <button type="submit">Submit Application</button>
    </div>
</form>