<x-app-layout>
    {{-- Header or Page Title --}}
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('School Years List') }}
        </h2>
    </x-slot>
    {{-- Table & Spacings --}}
    <div class="text-right">
        <x-primary-button class="px-5" id="create-sy-btn">Create New School Year</x-primary-button>
    </div>
    <div class="my-5">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div>
                    <h1 class="font-bold p-6">List of School Years</h1>
                </div>
                @auth
                    <table class="w-full py-3 table-auto" id="myTable">
                        <thead class="bg-slate-100 text-left">
                            <tr>
                                <th class="py-2 px-6">School Year</th>
                                <th class="py-2 pl-3">Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schoolYears as $year)
                                <tr class="odd:bg-white even:bg-slate-50 hover:bg-blue-100">
                                    <td class="px-6">{{ $year->year }}</td>
                                    @if ($year->is_archived == true)
                                        <td class="p-2">
                                            <span class="bg-red-200 py-1 px-3 rounded-full text-red-900 font-semibold">Archived</span>
                                            </td>
                                    @else
                                        <td class="p-2">
                                            <span class="bg-green-200 py-1 px-3 rounded-full text-green-900 font-semibold">Active</span>
                                        </td>
                                    @endif
                                    <td class="py-2 mr-10 grid"><a href="{{ route('school-years.batches', $year->id) }}"
                                            class="bg-green-500 text-white px-2 py-1 rounded-md text-xs place-self-end">View Applicants</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endauth
            </div>
        </div>
    </div>

    <script>
        document.getElementById('create-sy-btn').addEventListener('click', function() {
            window.location.href = "{{ route('school-years.create') }}";
        });
    </script>
</x-app-layout>
