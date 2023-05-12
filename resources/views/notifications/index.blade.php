@use Tonysm\RichTextLaravel\Attachment;
@use Tonysm\RichTextLaravel\Attachables\Images;

<x-app-layout>

    <head>
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
        <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    </head>
    <!-- Add this form to your view file -->
    <form action="{{ route('notifications.notification') }}" method="POST">
        @csrf
        <div class="form-group m-1">
            <label for="programId">Select Program:</label>
            <select name="programId" id="programId" class="inline-flex items-center m-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500" required>
                <!-- Display a list of programs for selection -->
                @foreach ($programs as $program)
                <option class="inline-flex items-center m-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500" value="{{ $program->id }}">{{ $program->program_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group m-1">
            <label for="title">Title:</label>
            <input class="inline-flex items-center m-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500" type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group bg-white m-5 p-5 shadow-sm sm:rounded-lg">
            <label for="content">Content:</label>
            <x-rich-text-trix-styles />
            <x-trix-field name="content" id="content" class="form-control" required :initial-value="''" />
        </div>

        <div class="text-right px-5">
            <x-primary-button type="submit" class="btn btn-primary">Send Notification</x-primary-button>
        </div>
    </form>
</x-app-layout>