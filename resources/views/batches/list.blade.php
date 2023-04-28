<x-app-layout>
    {{-- Header or Page Title --}}
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Batch Management') }}
        </h2>
    </x-slot>
    {{-- Table & Spacings --}}
    <div class="text-right">
        <x-primary-button class="px-5" id="view-archive-btn">View Archived Batches</x-primary-button>
    </div>
    <div class="my-5">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div>
                    <h1 class="font-bold px-6 pt-6 pb-3">List of Batches</h1>
                </div>
                @auth
                @foreach ($batches->groupBy('batch_num') as $batchGroup)
                <div class="flex justify-between items-center px-6 py-3">
                    <h3 class="font-bold">Batch {{ $batchGroup->first()->batch_num }}</h3>
                    @foreach ($batchGroup as $batch)
                    <form method="POST" action="{{ route('batches.archive', $batch) }}" class="grid">
                        @csrf
                        <button type="submit" class="justify-self-end bg-red-700 px-7 py-2 border-2 w-fit rounded-md border-slate-300 text-white uppercase text-xs font-bold">Archive this batch</button>
                    </form>
                    @endforeach
                </div>
                <table class="w-full py-3 table-auto">
                    <thead class="bg-slate-100 text-left">
                        <tr>
                            <th class="py-2 px-6">Name</th>
                            <th class="py-2">Email</th>
                            <th class="py-2">Program</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($batchGroup as $batch)
                        @foreach ($batch->applicants as $applicant)
                        <tr class="odd:bg-white even:bg-slate-50 hover:bg-blue-100">
                            <td class="px-6">{{ $applicant->user->name }}</td>
                            <td class="p-2">{{ $applicant->user->email }}</td>
                            <td class="p-2">{{ $applicant->program->program_name }}</td>
                        </tr>
                        @endforeach
                        @endforeach
                    </tbody>
                </table>
                @endforeach
                @endauth
            </div>
        </div>
    </div>


    <script>
        document.getElementById('view-archive-btn').addEventListener('click', function() {
            window.location.href = "{{ route('batches.archived-list') }}";
        });
    </script>
</x-app-layout>