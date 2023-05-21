<x-app-layout>
    <form action="{{ route('applicants.update', $applicant->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Personal Information -->
        <div class="grid grid-cols-3">
            <div class="m-3">
                <label for="fname">First Name:</label>
                <input class="inline-flex items-center m-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full" type="text" name="fname" value="{{ $applicant->fname }}" required>
            </div>
            <div class="m-3">
                <label for="mname">Middle Name:</label>
                <input class="inline-flex items-center m-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full" type="text" name="mname" value="{{ $applicant->mname }}" required>
            </div>
            <div class="m-3">
                <label for="lname">Last Name:</label>
                <input class="inline-flex items-center m-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full" type="text" name="lname" value="{{ $applicant->lname }}" required>
            </div>
        </div>

        <div class="grid grid-cols-3">
            <div class="m-3">
                <label for="sex">Sex:</label>
                <select class="form-control inline-flex items-center m-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full" name="sex" required>
                    <option value="Male" {{ $applicant->sex === 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ $applicant->sex === 'Female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>
            <div class="m-3">
                <label for="birthdate">Birthdate:</label>
                <input class="inline-flex items-center m-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full" type="date" name="birthdate" value="{{ $applicant->birthdate }}" required>
            </div>
            <div class="m-3">
                <label for="phone_num">Phone Number:</label>
                <input class="inline-flex items-center m-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full" type="text" min=0 name="phone_num" value="{{ $applicant->phone_num }}" required>
            </div>
        </div>

        <div class="m-3">
            <label for="program_id">Program Choice</label>
            <select name="program_id" id="program_id" required class="inline-flex items-center my-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                @foreach ($programs as $program)
                <option value="{{ $program->id }}" {{ old('program_id', intval($applicant->program_id)) == $program->id ? 'selected' : '' }}>
                    {{ $program->program_name }}
                </option>
                @endforeach
            </select>
        </div>


        <div class="grid grid-cols-2">
            <div class="m-3">
                <!-- Avatar -->
                <label for="avatar">Upload New:</label>
                <input class="inline-flex items-center m-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full" type="file" name="avatar">
            </div>
            <div class="m-3">
                <!-- Certificates -->
                <label for="certificate">Upload New ITR:</label>
                <input class="inline-flex items-center m-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full" type="file" name="certificate">
            </div>
        </div>
        <div class="grid grid-cols-2">
            <div class="m-3">
                <!-- Report Card -->
                <label for="report_card">Upload New Report Card:</label>
                <input class="inline-flex items-center m-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full" type="file" name="report_card">
            </div>
            <div class="m-3">
                <!-- Ebill Proof -->
                <label for="ebill_proof">Upload New Ebill Proof:</label>
                <input class="inline-flex items-center m-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full" type="file" name="ebill_proof">
            </div>
        </div>
        <!-- Add other fields -->

        <button type="submit" class="btn btn-primary justify-self-end bg-blue-500 hover:bg-blue-700 px-10 py-2 border-2 w-fit rounded-md border-slate-300 text-white mt-4">Update</button>
    </form>

</x-app-layout>