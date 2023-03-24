<form method="POST" action="{{ route('users.update', $user) }}">
    <div class="m-5 text-right">
        <x-primary-button type="submit">Update User</x-primary-button>
    </div>

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
</form>