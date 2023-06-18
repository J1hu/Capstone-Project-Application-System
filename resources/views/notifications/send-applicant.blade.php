<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create a Notification') }}
        </h2>
    </x-slot>
    <!-- Add this form to your view file -->
    <form action="{{ route('notifications.notification-app') }}" method="POST">
        @csrf
        <div class="text-right px-5">
            <x-primary-button type="submit" class="btn btn-primary">Send Notification</x-primary-button>
        </div>
        <div class="bg-white h-auto p-5 mt-5">
            <div>
                <div class="form-group m-1 grid grid-cols-2">
                    <div class="grid">
                        <label for="applicant">Select a Specific Applicant:</label>
                        <select name="applicant" id="applicant"
                            class="inline-flex items-center m-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
                            <option selected disabled>Select an applicant to message</option>
                            @foreach ($applicants as $applicant)
                                <option
                                    class="inline-flex items-center m-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500"
                                    value="{{ $applicant->id }}">{{ $applicant->getFullNameAttribute() }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group mt-3 grid">
                <label for="title">Title:</label>
                <input
                    class="inline-flex items-center m-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full"
                    type="text" name="title" id="title" required>
            </div>
            <div class="form-group mt-5">
                <label for="content">Content:</label>
                <x-rich-text-trix-styles />
                <x-trix-field name="content" id="content" required :initial-value="''" />
            </div>
        </div>
    </form>
</x-app-layout>
