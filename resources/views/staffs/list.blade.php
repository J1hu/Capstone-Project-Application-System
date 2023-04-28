<x-app-layout>
    {{-- Header or Page Title --}}
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Registrar Staffs') }}
        </h1>
    </x-slot>
    {{-- Table & Spacings --}}
    <div class="text-right">
        <x-primary-button class="px-5" id="create-staff-btn">Add Registrar Staff</x-primary-button>
    </div>
    <div class="my-5">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div>
                    <h1 class="font-bold p-6">List of Registrar Staffs</h1>
                </div>
                @auth
                <table class="w-full py-3 table-auto">
                    <thead class="bg-slate-100 text-left">
                        <tr>
                            <th class="py-2 px-6">Name</th>
                            <th class="py-2">Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($staffs as $staff)
                        <tr class="odd:bg-white even:bg-slate-50 hover:bg-blue-100">
                            <td class="px-6">{{ $staff->name }}</td>
                            <td class="p-2">{{ $staff->email }}</td>
                            <td class="p-2"><a href="{{ route('staffs.edit', $staff->id) }}" class="bg-green-500 text-white px-2 py-1 rounded-md text-xs">Edit Staff</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endauth
                <div class="mx-6 my-3">
                    {{ $staffs->links() }}
                </div>
            </div>
        </div>
    </div>


    <script>
        document.getElementById('create-staff-btn').addEventListener('click', function() {
            window.location.href = "{{ route('staffs.create') }}";
        });
    </script>
</x-app-layout>