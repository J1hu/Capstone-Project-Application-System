<x-app-layout>
    {{-- Header or Page Title --}}
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>
    {{-- Table & Spacings --}}
    <div class="text-right">
        <x-primary-button id="create-user-btn">Create User</x-primary-button>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div>
                    <h1 class="font-bold p-6">List of Users</h1>
                </div>
                @auth
                <table class="w-full py-3 table-fixed">
                    <thead class="bg-slate-100">
                        <tr>
                            <th class="py-2 px-6 text-left">Name</th>
                            <th class="py-2 text-left">Email</th>
                            <th class="py-2 text-left">Created At</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        {{-- <div class="group group-hover:bg-emerald-50"> --}}
                        <tr class="odd:bg-white even:bg-slate-50 hover:bg-emerald-100">
                            <td class="px-6">{{ $user->name }}</td>
                            <td class="p-2">{{ $user->email }}</td>
                            <td class="p-2">{{ $user->created_at }}</td>
                            <td class="p-2"><a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit User</a></td>
                        </tr>
                        {{-- </div> --}}
                        @endforeach
                    </tbody>
                </table>
                @endauth
                <div class="mx-6 my-3">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>


    <script>
        document.getElementById('create-user-btn').addEventListener('click', function() {
            window.location.href = "{{ route('users.create') }}";
        });
    </script>
</x-app-layout>