<x-app-layout>
    {{-- Header or Page Title --}}
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Batch Management') }}
        </h2>
    </x-slot>
    {{-- Table & Spacings --}}
    <div class="my-5">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div>
                    <h1 class="font-bold p-6">List of Batches</h1>
                </div>
                <div>
                    <a href="{{ route('batches.archived-list') }}" class="btn btn-primary">View Archived Batches</a>
                </div>
                @auth
                @foreach ($batches->groupBy('batch_num') as $batchGroup)
                <h3>Batch {{ $batchGroup->first()->batch_num }}</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Program</th>
                            <th>
                                @foreach ($batchGroup as $batch)
                                <form method="POST" action="{{ route('batches.archive', $batch) }}">
                                    @csrf
                                    <button type="submit">Archive this batch</button>
                                </form>
                                @endforeach
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($batchGroup as $batch)
                        @foreach ($batch->applicants as $applicant)
                        <tr>
                            <td>{{ $applicant->user->name }}</td>
                            <td>{{ $applicant->user->email }}</td>
                            <td>{{ $applicant->program->program_name }}</td>
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
        document.getElementById('create-mancom-btn').addEventListener('click', function() {
            window.location.href = "{{ route('mancoms.create') }}";
        });
    </script>
</x-app-layout>