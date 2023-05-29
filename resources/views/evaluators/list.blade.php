<x-app-layout>
    {{-- Header or Page Title --}}
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Evaluators') }}
        </h2>
    </x-slot>
    {{-- Table & Spacings --}}
    <div class="text-right">
        <x-primary-button class="px-5" id="create-user-btn">Add Evaluator</x-primary-button>
    </div>
    <div class=" my-5">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div>
                    <h1 class="font-bold p-6">List of Evaluators</h1>
                </div>
                @auth
                <table class="w-full py-3 table-auto" id="myTable">
                    <thead class="bg-slate-100 text-left">
                        <tr>
                            <th class="py-2 px-6">Name</th>
                            <th class="py-2">Email</th>
                            <th class="py-2">Program Assigned</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($evaluators as $evaluator)
                        <tr class="odd:bg-white even:bg-slate-50 hover:bg-blue-100">
                            <td class="px-6">{{ $evaluator->name }}</td>
                            <td class="p-2">{{ $evaluator->email }}</td>
                            <td class="p-2">@foreach ($evaluator->programs as $program)
                                {{ $program->program_name }}@if(!$loop->last), @endif
                                @endforeach
                            </td>
                            <td class="p-2"><a href="{{ route('evaluators.edit', $evaluator->id) }}" class="bg-green-500 text-white px-2 py-1 rounded-md text-xs">Edit Evaluator</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endauth
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            let table = $('#myTable').DataTable({
                "lengthMenu": [10, 25, 50, 75, 100],
                "pageLength": 25,
                "columnDefs": [{
                    "orderable": false,
                    "targets": -1
                }]
            });
        });

        document.getElementById('create-user-btn').addEventListener('click', function() {
            window.location.href = "{{ route('evaluators.create') }}";
        });
    </script>
</x-app-layout>