<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Send a Notification') }}
        </h2>
    </x-slot>
    <div class="grid grid-cols-2 bg-white p-5 space-x-3 mt-10">
        <div id="send-all" class="border-blue-400 border-2 text-center py-5 hover:bg-blue-300 rounded-md">
            To a Batch
        </div>
    
        <div id="send-applicant" class="border-blue-400 border-2 text-center py-5 hover:bg-blue-300 rounded-md">
            To an Applicant
        </div>
    </div>
    
    <script>
        document.getElementById('send-all').addEventListener('click', function() {
            window.location.href = "{{ route('notifications.send-all') }}";
        });
        document.getElementById('send-applicant').addEventListener('click', function() {
            window.location.href = "{{ route('notifications.send-applicant') }}";
        });
    </script>
</x-app-layout>
