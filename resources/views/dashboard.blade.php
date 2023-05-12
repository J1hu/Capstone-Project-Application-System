<x-app-layout class="bg-blue-300 w-full h-screen">
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 dark:text-gray-200 leading-tight pb-6">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="text-right pb-5">
        <x-primary-button class="px-5" id="generate-csv">Generate CSV</x-primary-button>
    </div>

    <div class="grid grid-cols-3">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mx-10 my-2">
            <div class="text-xl px-6 py-5 text-gray-900 dark:text-gray-100">Total Applicants:</div>
            <div class="text-lime-600 text-5xl px-6 pb-3 dark:text-gray-100">{{ \App\Models\Applicant::getTotalApplicants() }}</div>
        </div>
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mx-10 my-2">
            <div class="text-xl px-6 py-5 text-gray-900 dark:text-gray-100">Total Pending Applicants:</div>
            <div class="text-lime-600 text-5xl px-6 pb-3 dark:text-gray-100">{{ \App\Models\Applicant::getPendingApplicants() }}</div>
        </div>
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mx-10 my-2">
            <div class="text-xl px-6 py-5 text-gray-900 dark:text-gray-100">Total Evaluated Applicants:</div>
            <div class="text-lime-600 text-5xl px-6 pb-3 dark:text-gray-100"> {{ \App\Models\Applicant::getEvaluatedApplicants() }}</div>
        </div>
    </div>

    <div class="m-10 grid grid-cols-6">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mx-3 my-2">
            <div class="text-xl px-6 py-5 text-gray-900 dark:text-gray-100">Total BSIS</div>
            <div class="text-lime-600 text-5xl px-6 pb-3 dark:text-gray-100">{{ \App\Models\Program::getBSISApplicants() }}</div>
        </div>
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mx-3 my-2">
            <div class="text-xl px-6 py-5 text-gray-900 dark:text-gray-100">Total ACT</div>
            <div class="text-lime-600 text-5xl px-6 pb-3 dark:text-gray-100">{{ \App\Models\Program::getACTApplicants() }}</div>
        </div>
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mx-3 my-2">
            <div class="text-xl px-6 py-5 text-gray-900 dark:text-gray-100">Total BAB</div>
            <div class="text-lime-600 text-5xl px-6 pb-3 dark:text-gray-100">{{ \App\Models\Program::getBABApplicants() }}</div>
        </div>
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mx-3 my-2">
            <div class="text-xl px-6 py-5 text-gray-900 dark:text-gray-100">Total BSA</div>
            <div class="text-lime-600 text-5xl px-6 pb-3 dark:text-gray-100">{{ \App\Models\Program::getBSAApplicants() }}</div>
        </div>
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mx-3 my-2">
            <div class="text-xl px-6 py-5 text-gray-900 dark:text-gray-100">Total BSAIS</div>
            <div class="text-lime-600 text-5xl px-6 pb-3 dark:text-gray-100">{{ \App\Models\Program::getBSAISApplicants() }}</div>
        </div>
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mx-3 my-2">
            <div class="text-xl px-6 py-5 text-gray-900 dark:text-gray-100">Total BSSW</div>
            <div class="text-lime-600 text-5xl px-6 pb-3 dark:text-gray-100">{{ \App\Models\Program::getBSSWApplicants() }}</div>
        </div>
    </div>

    <script>
        document.getElementById('generate-csv').addEventListener('click', function() {
            window.location.href = "{{ route('generate.three') }}";
        });
    </script>
</x-app-layout>