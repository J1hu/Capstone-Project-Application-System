<x-app-layout>
    {{-- Header or Page Title --}}
    <x-slot name="header">
        <h1 class="font-bold text-3xl text-gray-800 dark:text-gray-200 leading-tight pb-6">
            {{ __('Create MANCOM') }}
        </h1>
    </x-slot>

    {{-- Content --}}
    @auth
    <form method="POST" action="{{ route('mancoms.store') }}" class="grid grid-flow-row gap-3">
        <div class="text-right">
            <button type="submit" class="inline-flex items-center justify-center text-center px-4 py-2 w-50 h-10 bg-blue-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">Create MANCOM</button>
        </div>
        @csrf
        <div class="grid grid-cols-2 gap-4">
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
        </div>
    </form>
    @endauth
</x-app-layout>