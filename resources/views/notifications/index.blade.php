<x-app-layout>
    <!-- Add this form to your view file -->
    <form action="{{ route('notifications.notification') }}" method="POST">
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
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea name="content" id="content" class="form-control" required></textarea>
        </div>
        <x-primary-button type="submit" class="btn btn-primary">Send Notification</x-primary-button>
    </form>

</x-app-layout>