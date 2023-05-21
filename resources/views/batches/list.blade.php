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
                <div class="grid grid-cols-2">
                    <h1 class="font-bold px-6 pt-6 pb-3">List of Active Batches</h1>
                    <div class="space-y-3 p-5">
                        <div class="grid space-y-3">
                            <x-primary-button class="px-5 justify-self-end content-center hover:bg-red-500 bg-red-700 py-2 border-2 w-fit rounded-md border-slate-300 text-white uppercase text-xs font-bold focus:bg-red-900 focus:ring-red-500 active:bg-red-800" id="archive-btn">Archive all active batch</x-primary-button>

                        </div>
                    </div>

                </div>
                @auth
                @if ($batches->isEmpty())
                <div class="font-bold px-6 pt-6 pb-3">
                    <p>There are no Active Batches</p>
                </div>
                @elseif ($batches->isNotEmpty())
                {{-- Tabs --}}
                <div class="my-2 border-b bg-white border-gray-200 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                        @foreach ($batches as $batch)
                        <li class="mr-2" role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="batch-{{ $batch->batch_num }}-tab" data-tabs-target="#batch-{{ $batch->batch_num }}" type="button" role="tab" aria-controls="batch-{{ $batch->batch_num }}" aria-selected="false">Batch
                                {{ $batch->batch_num }}</button>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @foreach ($batches as $batch)
                @section('scripts')
                document.getElementById('generate-csv').addEventListener('click', function() {
                window.location.href = "{{ route('generate.four', $batch) }}";
                });
                @endsection
                <div id="myTabContent">
                    <div class="hidden p-4 rounded-lg bg-white dark:bg-gray-800" id="batch-{{ $batch->batch_num }}" role="tabpanel" aria-labelledby="batch-{{ $batch->batch_num }}-tab">
                        <table class="w-full py-3 table-auto" id="myTable">
                            <thead class="bg-slate-100 text-left">
                                <tr>
                                    <th class="py-2 px-6">Name</th>
                                    <th class="py-2">Email</th>
                                    <th class="py-2">Program</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($batch->applicants as $applicant)
                                <tr class="odd:bg-white even:bg-slate-50 hover:bg-blue-100">
                                    <td class="px-6">{{ $applicant->user->name }}</td>
                                    <td class="p-2">{{ $applicant->user->email }}</td>
                                    <td class="p-2">{{ $applicant->program->program_name }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endforeach
                @endif
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

        document.getElementById('view-archive-btn').addEventListener('click', function() {
            window.location.href = "{{ route('batches.archived-list') }}";
        });

        document.getElementById('archive-btn').addEventListener('click', function() {
            window.location.href = "{{ route('batches.archive') }}";
        });

        // Get all tab buttons and content divs
        const tabButtons = document.querySelectorAll('[data-tabs-target]');
        const tabContents = document.querySelectorAll('[role="tabpanel"]');

        // Add event listener to each tab button
        tabButtons.forEach((button, index) => {
            button.addEventListener('click', () => {
                // Toggle the active class on the clicked button
                tabButtons.forEach(button => {
                    button.classList.remove('border-blue-500', 'text-blue-500');
                    button.setAttribute('aria-selected', 'false');
                });
                button.classList.add('border-blue-500', 'text-blue-500');
                button.setAttribute('aria-selected', 'true');

                // Hide all tab content
                tabContents.forEach(content => {
                    content.classList.add('hidden');
                });

                // Show the content associated with the clicked button
                const target = button.getAttribute('data-tabs-target');
                const content = document.querySelector(target);
                content.classList.remove('hidden');
            });

            // Trigger click event on the first tab button after the page has loaded
            if (index === 0) {
                button.click();
            }
        });
    </script>
</x-app-layout>