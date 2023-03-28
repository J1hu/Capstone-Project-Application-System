<form method="POST" action="{{ route('users.update', $user) }}">
    @csrf
    @method('PUT')
    <div class="grid grid-cols-2">
        <div class="m-5">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="form-group m-5">
            <label for="email">Email:</label>
            <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" name="email" value="{{ old('email', $user->email) }}" container="w-80" required>
            @if ($errors->has('email'))
            <div class="invalid-feedback text-red-500">
                {{ $errors->first('email') }}
            </div>
            @endif
        </div>

        <div id="programs-container">
            @foreach ($user->programs as $program)
            <div class="program">
                <select name="program_id[]" class="form-control">
                    @foreach ($programs as $option)
                    <option value="{{ $option->id }}" {{ $option->id == $program->id ? 'selected' : '' }}>
                        {{ $option->program_name }}
                    </option>
                    @endforeach
                </select>
                <button type="button" class="remove-program px-4 py-2 w-30 h-10 bg-red-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">Remove</button>
            </div>
            @endforeach
        </div>

        <div class="text-left">
            <button type="button" id="add-program" class="px-4 py-2 w-40 h-10 bg-blue-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">Add Program</button>
        </div>

        <div class="form-group m-5">
            <label for="password">New Password:</label>
            <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password" name="password" container="w-80">
            @if ($errors->has('password'))
            <div class="invalid-feedback text-red-500">
                {{ $errors->first('password') }}
            </div>
            @endif
        </div>

        <div class="form-group m-5">
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" class="form-control {{ $errors->has('confirm_password') ? 'is-invalid' : '' }}" id="confirm_password" name="confirm_password" container="w-80">
            @if ($errors->has('confirm_password'))
            <div class="invalid-feedback text-red-500">
                {{ $errors->first('confirm_password') }}
            </div>
            @endif
        </div>
    </div>

    <div class="m-5 text-right">
        <x-primary-button type="submit">Update User</x-primary-button>
    </div>
</form>

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