<x-app-layout>
    <form action="{{ route('applicants.update', $applicant->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Personal Information -->
        <label for="fname">First Name:</label>
        <input type="text" name="fname" value="{{ $applicant->fname }}" required>

        <!-- Add other personal information fields -->

        <!-- Avatar -->
        <label for="avatar">Avatar:</label>
        <input type="file" name="avatar">

        <!-- Certificates -->
        <label for="certificate">Certificates:</label>
        <input type="file" name="certificate">

        <!-- Report Card -->
        <label for="report_card">Report Card:</label>
        <input type="file" name="report_card">

        <!-- Ebill Proof -->
        <label for="ebill_proof">Ebill Proof:</label>
        <input type="file" name="ebill_proof">

        <!-- Add other fields -->

        <button type="submit" class="btn btn-primary justify-self-end bg-blue-500 hover:bg-blue-700 px-10 py-2 border-2 w-fit rounded-md border-slate-300 text-white mt-4">Update</button>
    </form>

</x-app-layout>