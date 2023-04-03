<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Evaluator') }}
        </h2>
    </x-slot>

    {{-- Content --}}
    @auth
    <form method="POST" action="{{ route('evaluators.store') }}" class="grid grid-flow-row gap-3">
        <div class="text-right">
            <button type="submit" class="inline-flex items-center justify-center text-center px-4 py-2 w-50 h-10 bg-blue-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">Save Evaluator</button>
        </div>
        @csrf
        <div class="grid grid-cols-2 gap-4 bg-white border rounded-md p-5">
            <div>
                <label for="name" class="text-sm text-slate-700">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required class="inline-flex items-center m-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
            </div>


            <div class="form-group">
                <label for="email" class="text-sm text-slate-700">Email:</label>
                <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }} inline-flex items-center m-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full" id="email" name="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                <div class="invalid-feedback text-red-500">
                    {{ $errors->first('email') }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label for="password" class="text-sm text-slate-700">Password:</label>
                <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}  inline-flex items-center m-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full" id="password" name="password" value="{{ old('password') }}" required>
                @if ($errors->has('password'))
                <div class="invalid-feedback text-red-500">
                    {{ $errors->first('password') }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label for="password_confirmation" class="text-sm text-slate-700">Confirm Password:</label>
                <input type="password" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }} inline-flex items-center m-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" required>
                @if ($errors->has('password_confirmation'))
                <div class="invalid-feedback text-red-500">
                    {{ $errors->first('password_confirmation') }}
                </div>
                @endif
            </div>
            <div class="grid grid-flow-col">
            <div id="programs-container">
                <label for="program" class="text-sm text-slate-700">Select program</label>
                <div class="program">
                    <select name="program_id[]" class="form-control inline-flex items-center m-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-40">
                        @foreach ($programs as $program)
                        <option value="{{ $program->id }}" {{ in_array($program->id, old('program_id', [])) ? 'selected' : '' }}>
                            {{ $program->program_name }}
                        </option>
                        @endforeach
                    </select>
                    <button type="button" class="remove-program p-3 w-40 h-10 bg-red-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">Remove</button>
                </div>
            </div>
            <div class="text-left content-end grid p-2">
                <button type="button" id="add-program" class="px-4 py-2 w-40 h-10 bg-blue-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">Add Program</button>
            </div>
            </div>
        </div>
    </form>
    @endauth

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
</x-app-layout>