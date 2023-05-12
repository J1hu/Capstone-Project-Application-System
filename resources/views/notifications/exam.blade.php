<x-app-layout>
    <!-- Add this form to your view file -->
    <form action="{{ route('notifications.exam-notification') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="programId">Select Program:</label>
            <select name="programId" id="programId" class="form-control" required>
                <!-- Display a list of programs for selection -->
                @foreach ($programs as $program)
                <option value="{{ $program->id }}">{{ $program->program_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exam_date">Exam Date:</label>
            <input type="date" name="exam_date" id="exam_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea name="content" id="content" class="form-control" required></textarea>
        </div>
        <x-primary-button type="submit" class="btn btn-primary">Send Exam Notification</x-primary-button>
    </form>

</x-app-layout>