@auth
<form method="POST" action="{{ route('users.store') }}">
    @csrf

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="{{ old('name') }}" required>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" name="email" value="{{ old('email') }}" required>
        @if ($errors->has('email'))
        <div class="invalid-feedback">
            {{ $errors->first('email') }}
        </div>
        @endif
    </div>

    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password" name="password" value="{{ old('password') }}" required>
        @if ($errors->has('password'))
        <div class="invalid-feedback">
            {{ $errors->first('password') }}
        </div>
        @endif
    </div>

    <div class="form-group">
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" required>
        @if ($errors->has('password_confirmation'))
        <div class="invalid-feedback">
            {{ $errors->first('password_confirmation') }}
        </div>
        @endif
    </div>

    <button type="submit">Create User</button>
</form>
@endauth