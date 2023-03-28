<x-app-layout>
    {{-- Header or Page Title --}}
    <x-slot name="header">
        <h1 class="font-bold text-3xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('MANCOMs') }}
        </h1>
    </x-slot>
    {{-- Table & Spacings --}}
    <div class="text-right">
        <x-primary-button class="mx-14" id="create-mancom-btn">Add MANCOM</x-primary-button>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div>
                    <h1 class="font-bold p-6">List of Mancoms</h1>
                </div>
                @auth
                <table class="w-full py-3 table-fixed">
                    <thead class="bg-slate-100 text-left">
                        <tr>
                            <th class="py-2 px-6">Name</th>
                            <th class="py-2">Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mancoms as $mancom)
                        <tr class="odd:bg-white even:bg-slate-50 hover:bg-blue-100">
                            <td class="px-6">{{ $mancom->name }}</td>
                            <td class="p-2">{{ $mancom->email }}</td>
                            <td class="p-2"><a href="{{ route('mancoms.edit', $mancom->id) }}" class="btn btn-primary">Edit MANCOM</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endauth
                <div class="mx-6 my-3">
                    {{ $mancoms->total() }}
                </div>
            </div>
        </div>
    </div>


    <script>
        document.getElementById('create-mancom-btn').addEventListener('click', function() {
            window.location.href = "{{ route('mancoms.create') }}";
        });
    </script>
</x-app-layout>