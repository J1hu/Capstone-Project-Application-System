<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create a Notification for:') }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-2 space-x-3 mt-16">
        <button class="p-10 bg-white text-blue-700 hover:bg-blue-100 rounded-md" id="send-sy">Send Notification to a <span class="font-bold">Batch</span></button>
        <button class="p-10 bg-white text-blue-700 hover:bg-blue-100 rounded-md" id="send-app">Send Notification to an <span class="font-bold">Applicant</span></button>
    </div>

    <script>
        document.getElementById('send-sy').addEventListener('click', function() {
            window.location.href = "{{ route('notifications.view-sy') }}";
        });

        document.getElementById('send-app').addEventListener('click', function() {
            window.location.href = "{{ route('notifications.view-applicant') }}";
        });
    </script>
</x-app-layout>
