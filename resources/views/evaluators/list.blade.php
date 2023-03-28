<x-app-layout>
    {{-- Header or Page Title --}}
    <x-slot name="header">
        <h1 class="font-bold text-3xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Evaluators') }}
        </h1>
    </x-slot>
    {{-- Table & Spacings --}}
    <div class="text-right">
        <x-primary-button class="mx-14" id="create-user-btn">Add Evaluator</x-primary-button>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div>
                    <h1 class="font-bold p-6">List of Evaluators</h1>
                </div>
                @auth
                <table class="w-full py-3 table-fixed">
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
                            <td class="p-2"><a href="{{ route('evaluators.edit', $evaluator->id) }}" class="btn btn-primary">Edit Evaluator</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endauth
                <div class="mx-6 my-3">
                    {{ $evaluators->links() }}
                </div>
            </div>
        </div>
    </div>


    <script>
        document.getElementById('create-user-btn').addEventListener('click', function() {
            window.location.href = "{{ route('evaluators.create') }}";
        });
    </script>
</x-app-layout>