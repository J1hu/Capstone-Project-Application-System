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
                        <h1 class="font-bold">List of Evaluated Applicants</h1>
                    </div>
                    <div class="grid justify-self-end content-center">
                        <x-primary-button class="px-5" id="generate-csv">Generate CSV</x-primary-button>
                    </div>
                </div>
                @auth
                <table class="w-full py-3 table-auto">
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
                            <td class="py-2">{{ $applicant->applicant_status->applicant_status_name}}</td>
                            <td class="py-2">Open</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endauth
                <div class="mx-6 my-3">
                    {{ $applicants->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    document.getElementById('generate-csv').addEventListener('click', function() {
        window.location.href = "{{ route('generate.one') }}";
    });
</script>