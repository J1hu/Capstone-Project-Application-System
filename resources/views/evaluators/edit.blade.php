<x-app-layout>
    {{-- Header or Page Title --}}
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 dark:text-gray-200 leading-tight pb-6">
            {{ __('Edit Evaluators\'s Information') }}
        </h2>
    </x-slot>
    {{-- Table & Spacings --}}
    <form method="POST" action="{{ route('evaluators.update', $evaluator) }}" class="grid grid-flow-row gap-3">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-2 bg-white border rounded-md p-5 gap-4">
            <div>
                <label for="name" class="text-sm text-slate-700">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name', $evaluator->name) }}" required
                    class="inline-flex items-center m-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
            </div>

            <div class="form-group">
                <label for="email" class="text-sm text-slate-700">Email:</label>
                <input type="email"
                    class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }} inline-flex items-center m-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full"
                    id="email" name="email" value="{{ old('email', $evaluator->email) }}" required>
                @if ($errors->has('email'))
                    <div class="invalid-feedback text-red-500">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="password" class="text-sm text-slate-700">New Password:</label>
                <input type="password"
                    class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }} inline-flex items-center m-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full"
                    id="password" name="password">
                @if ($errors->has('password'))
                    <div class="invalid-feedback text-red-500">
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="confirm_password" class="text-sm text-slate-700">Confirm Password:</label>
                <input type="password"
                    class="form-control {{ $errors->has('confirm_password') ? 'is-invalid' : '' }} inline-flex items-center m-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full"
                    id="confirm_password" name="confirm_password">
                @if ($errors->has('confirm_password'))
                    <div class="invalid-feedback text-red-500">
                        {{ $errors->first('confirm_password') }}
                    </div>
                @endif
            </div>
            <div class="grid grid-flow-col">
                <div id="programs-container">
                    <label for="program" class="text-sm text-slate-700">Select program</label>
                    @foreach ($evaluator->programs as $program)
                        <div class="program">
                            <select name="program_id[]"
                                class="form-control inline-flex items-center m-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-40">
                                @foreach ($programs as $option)
                                    <option value="{{ $option->id }}"
                                        {{ $option->id == $program->id ? 'selected' : '' }}>
                                        {{ $option->program_name }}
                                    </option>
                                @endforeach
                            </select>
                            <button type="button"
                                class="remove-program p-3 w-40 h-10 bg-red-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">Remove</button>
                        </div>
                    @endforeach
                </div>
                <div class="text-left content-end grid p-2">
                    <button type="button" id="add-program"
                        class="px-4 py-2 w-40 h-10 bg-blue-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">Add
                        Program</button>
                </div>
            </div>
        </div>



        <div class="mt-2 text-right">
            <x-primary-button type="submit">Update Evaluator</x-primary-button>
        </div>
    </form>
</x-app-layout>

<script>
    const programsContainer = document.getElementById('programs-container');
    const addProgramButton = document.getElementById('add-program');

    addProgramButton.addEventListener('click', () => {
        const program = programsContainer.querySelector('.program:last-child').cloneNode(true);
        programsContainer.appendChild(program);
    });

    programsContainer.addEventListener('click', (event) => {
        if (event.target.classList.contains('remove-program')) {
            const program = event.target.closest('.program');
            program.parentNode.removeChild(program);

            const selects = programsContainer.querySelectorAll('select');
            if (selects.length == 2) {
                program.querySelector('.remove-program').disabled = true;
            }
        }
    });
</script>
