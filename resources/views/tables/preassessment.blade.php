<x-app-layout>
    {{-- Header or Page Title --}}
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Applicants') }}
        </h2>
    </x-slot>
    {{-- Table & Spacings --}}
    <div class=" my-5">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-2 p-6">
                    <div>
                        <h1 class="font-bold">List of Applicants ready for Preassessment</h1>
                    </div>
                </div>
                @auth
                <table class="w-full py-3 table-auto" id="myTable">
                    <thead class="bg-slate-100 text-left">
                        <tr>
                            <th class="py-2 px-6">Name</th>
                            <th class="py-2">Email</th>
                            <th class="py-2">Program Applied</th>
                            <th class="py-2">Contact Number</th>
                            <th class="py-2">Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($applicants as $applicant)
                        <tr class="odd:bg-white even:bg-slate-50 hover:bg-blue-100">
                            <td class="px-6">{{ $applicant->getFullNameAttribute() }}</td>
                            <td class="py-2">{{ $applicant->user->email}}</td>
                            <td class="py-2">{{ $applicant->program->program_name}}</td>
                            <td class="py-2">{{ $applicant->phone_num}}</td>
                            <td class="py-2 capitalize">{{ $applicant->application_status->application_status_name}}</td>
                            <td><a href="{{ route('applicants.admin-view', ['id' => $applicant->id]) }}" class="bg-blue-500 text-white px-2 py-1 rounded-md text-xs">View Profile</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endauth
            </div>
        </div>
    </div>
</x-app-layout>

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

    document.getElementById('generate-csv').addEventListener('click', function() {
        window.location.href = "{{ route('generate.two') }}";
    });
</script>