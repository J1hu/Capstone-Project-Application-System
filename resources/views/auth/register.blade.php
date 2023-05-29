<x-guest-layout>
    <x-form-title title="REGISTRATION PAGE"/>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <div class="flex items-center mt-1 w-full border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm">
                <input id="password" class="flex-1 w-full p-2 border-0 rounded-l-md focus:outline-none" type="password" name="password" required autocomplete="new-password">
                <span class="material-symbols-outlined p-2 bg-blue-500 rounded-r-md border-blue-500 text-white" id="togglePassword">
                  visibility
                </span>
              </div>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
<div class="mt-4">
    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

    <div class="flex items-center mt-1 w-full border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm">
        <input id="password_confirmation" class="flex-1 w-full p-2 border-0 rounded-l-md focus:outline-none" type="password" name="password_confirmation" required autocomplete="new-password">
        <span class="material-symbols-outlined p-2 bg-blue-500 rounded-r-md border-blue-500 text-white" id="toggleConfirmPassword">
          visibility
        </span>
    </div>

    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
</div>


        <div class="flex flex-col-reverse items-center justify-end mt-5">
            <a class="text-sm text-gray-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-gray-100 rounded-md" href="{{ route('login') }}">
                {{ __('Already registered? Login here.') }}
            </a>

            <x-primary-button class="flex my-4 w-full justify-center bg-blue-500">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
    <script>
        window.addEventListener("DOMContentLoaded", function() {
            const togglePassword = document.querySelector("#togglePassword");
            const toggleConfirmPassword = document.querySelector("#toggleConfirmPassword");
            const password = document.querySelector("#password");
            const confirmPassword = document.querySelector("#password_confirmation");
    
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
    
            toggleConfirmPassword.addEventListener("click", function() {
                // Toggle the confirm password visibility
                const type = confirmPassword.getAttribute("type") === "password" ? "text" : "password";
                confirmPassword.setAttribute("type", type);
    
                if (toggleConfirmPassword.innerHTML === "visibility") {
                    toggleConfirmPassword.innerHTML = "visibility_off";
                } else {
                    toggleConfirmPassword.innerHTML = "visibility";
                }
            });
        });
    </script>
    
</x-guest-layout>
