<x-app-layout class="bg-blue-300 w-full h-screen">
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 dark:text-gray-200 leading-tight pb-6">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <x-primary-button class="px-5" id="generate-csv">Generate CSV</x-primary-button>
</x-app-layout>

<script>
    document.getElementById('generate-csv').addEventListener('click', function() {
        window.location.href = "{{ route('generate.three') }}";
    });
    
</script>