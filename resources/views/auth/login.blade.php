<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <x-form-title title="LOGIN PAGE" />
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <div class="flex items-center mt-1 w-full border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm">
                <input id="password" class="flex-1 w-full p-2 border-0 rounded-l-md focus:outline-none" type="password" name="password" required autocomplete="current-password">
                <span class="material-symbols-outlined p-2 bg-blue-500 rounded-r-md border-blue-500 text-white" id="togglePassword">
                  visibility
                </span>
              </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="grid grid-cols-2">
            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                        name="remember">
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>
            <div class="flex items-center justify-end mt-2">
                @if (Route::has('password.request'))
                    <a class="text-sm text-gray-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-gray-100 rounded-md"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>
        </div>
        <div class="flex flex-col-reverse items-center justify-end mt-5">
            <a class="text-sm text-gray-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-gray-100 rounded-md"
                href="{{ route('register') }}">
                Doesn't have an account yet? Register here.
            </a>

            <x-primary-button class="flex my-4 w-full justify-center bg-blue-500">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        window.addEventListener("DOMContentLoaded", function() {
            const togglePassword = document.querySelector("#togglePassword");
            const password = document.querySelector("#password");
    
            togglePassword.addEventListener("click", function() {
                // Toggle the password visibility
                const type = password.getAttribute("type") === "password" ? "text" : "password";
                password.setAttribute("type", type);
    
                if (togglePassword.innerHTML === "visibility") {
                    togglePassword.innerHTML = "visibility_off";
                } else {
                    togglePassword.innerHTML = "visibility";
                }
            });
        });
    </script>
</x-guest-layout>
