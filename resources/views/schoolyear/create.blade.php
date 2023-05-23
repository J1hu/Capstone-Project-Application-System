<x-app-layout>
    <h1>Create School Year</h1>

    <form action="{{ route('school-years.store') }}" method="POST">
        @csrf

        <label for="year">Year:</label>
        <input type="text" name="year" id="year" value="{{ old('year') }}" required>

        <!-- Add fields for other attributes if needed -->

        <button type="submit">Create</button>
    </form>
</x-app-layout>