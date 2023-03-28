<x-app-layout>
    {{-- Header or Page Title --}}
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 dark:text-gray-200 leading-tight pb-6">
            {{ __('Edit ManCom\'s Information') }}
        </h2>
    </x-slot>
<form method="POST" action="{{ route('staffs.update', $staff) }}" class="grid grid-flow-row gap-3">
    @csrf
    @method('PUT')
    <div class="grid grid-cols-2 bg-white border rounded-md p-5 gap-4">
        <div>
            <label for="name" class="text-sm text-slate-700">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $staff->name) }}" required class="inline-flex items-center m-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full">
        </div>

        <div class="form-group">
            <label for="email" class="text-sm text-slate-700">Email:</label>
            <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }} inline-flex items-center m-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full" id="email" name="email" value="{{ old('email', $staff->email) }}" required>
            @if ($errors->has('email'))
            <div class="invalid-feedback text-red-500">
                {{ $errors->first('email') }}
            </div>
            @endif
        </div>

        <div class="form-group">
            <label for="password" class="text-sm text-slate-700">New Password:</label>
            <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }} inline-flex items-center m-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full" id="password" name="password">
            @if ($errors->has('password'))
            <div class="invalid-feedback text-red-500">
                {{ $errors->first('password') }}
            </div>
            @endif
        </div>

        <div class="form-group">
            <label for="confirm_password" class="text-sm text-slate-700">Confirm Password:</label>
            <input type="password" class="form-control {{ $errors->has('confirm_password') ? 'is-invalid' : '' }} inline-flex items-center m-1 p-3 text-sm leading-5 text-black border-2 rounded-md border-slate-400 bg-white focus:ring-blue-500 focus:border-blue-500 w-full" id="confirm_password" name="confirm_password">
            @if ($errors->has('confirm_password'))
            <div class="invalid-feedback text-red-500">
                {{ $errors->first('confirm_password') }}
            </div>
            @endif
        </div>
    </div>

    <div class="text-right">
        <x-primary-button type="submit">Update Registrar Staff</x-primary-button>
    </div>
</form>
</x-app-layout>