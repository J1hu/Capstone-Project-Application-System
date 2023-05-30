<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create a Notification') }}
        </h2>
    </x-slot>
    <!-- Add this form to your view file -->
    <form action="{{ route('notifications.notification') }}" method="POST">
        @csrf
        <div class="text-right px-5">
            <x-primary-button type="submit" class="btn btn-primary">Send Notification</x-primary-button>
        </div>
        <div class="bg-white p-5 mt-5">
            <div class="form-group m-1 grid grid-cols-2">
                <div class="grid">
                    <label for="schoolYears">Select School Year:</label>
                    <select name="schoolYears" id="schoolYears"
                        class="inline-flex items-center m-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full"
                        required>
                        @foreach ($schoolYears as $schoolYear)
                            @if ($schoolYear->is_archived == 0)
                                <option
                                    class="inline-flex items-center m-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500"
                                    value="{{ $schoolYear->id }}">{{ $schoolYear->year }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="grid ml-3">
                    <label for="programId">Select Program:</label>
                    <select name="programId" id="programId"
                        class="inline-flex items-center m-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full"
                        required>
                        @foreach ($programs as $program)
                                <option
                                    class="inline-flex items-center m-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500"
                                    value="{{ $program->id }}">{{ $program->program_name }}
                                </option>
                        @endforeach
                    </select>
                </div>
                <div class="grid">
                    <label for="batch_num">Select Batch:</label>
                    <select name="batch_num" id="batch_num"
                        class="inline-flex items-center m-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full"
                        required>
                        @foreach ($schoolYears as $schoolYear)
                            @foreach ($schoolYear->batches as $batch)
                                <option
                                    class="inline-flex items-center m-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500"
                                    value="{{ $batch->batch_num }}">{{ $batch->batch_num }}</option>
                            @endforeach
                        @endforeach
                    </select>
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
                <x-trix-field name="content" id="content"
                    class="form-control inline-flex m-1 p-3 leading-5 w-full text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500"
                    required :initial-value="''" />
            </div>
        </div>

    </form>
</x-app-layout>
