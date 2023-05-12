<x-app-layout>
    <div class="text-center">
        <x-primary-button class="px-5" id="exam-btn">Exam Announcement</x-primary-button>
    </div>

    <div class="text-center">
        <x-primary-button class="px-5" id="interview-btn">Interview Announcement</x-primary-button>
    </div>

    <script>
        document.getElementById('exam-btn').addEventListener('click', function() {
            window.location.href = "{{ route('notifications.exam') }}";
        });

        document.getElementById('interview-btn').addEventListener('click', function() {
            window.location.href = "{{ route('notifications.interview') }}";
        });
    </script>
</x-app-layout>