<x-app-layout>
    <h1 class="font-bold">
        Welcome, {{ $user->name }}!
    </h1>
    <div class="bg-white px-10 py-5 my-5 rounded-md border-l-blue-500 border-l-8 grid grid-col-1">
        {{-- @if (status->user->status) --}}
        <h2 class="font-bold">You have successfully finished verifying ypur account.</h2>
        <p class="text-sm">You may now proceed to the next step by answering the application form.</p>
        <div class="justify-self-end">
            <a href="" class="bg-blue-500 p-2 rounded-sm text-white text-sm justify-self-end hover:bg-blue-800">Answer the Form</a>
        </div>
        
        {{-- @endif --}}

    </div>
    <div class="bg-white px-10 py-5 my-5 rounded-md">
        <ol id="stepper"
            class="relative text-gray-500 border-l border-gray-200 dark:border-gray-700 dark:text-gray-400">
            <li class="mb-10 ml-8 current-step">
                <span
                    class="absolute flex items-center justify-center w-8 h-8 bg-blue-200 rounded-full -left-4 ring-4 ring-white">
                    <svg aria-hidden="true" class="w-5 h-5 text-blue-500" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </span>
                <h3 class="font-medium leading-tight text-blue-500">Account Verification</h3>
                <p class="text-sm">Step details here</p>
            </li>
            <li class="mb-10 ml-8">
                <span
                    class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                </span>
                <h3 class="font-medium leading-tight">Completion of Application Form</h3>
                <p class="text-sm">Step details here</p>
            </li>
            <li class="mb-10 ml-8">
                <span
                    class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                        <path fill-rule="evenodd"
                            d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                            clip-rule="evenodd"></path>
                    </svg>
                </span>
                <h3 class="font-medium leading-tight">Assessment of Applicant Form</h3>
                <p class="text-sm">Step details here</p>
            </li>
            <li class="ml-8 last-step">
                <span
                    class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                        <path fill-rule="evenodd"
                            d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"></path>
                    </svg>
                </span>
                <h3 class="font-medium leading-tight">Entrance Examination</h3>
                <p class="text-sm">Step details here</p>
                {{-- 
                    Account Creation
                    Verification
                    Submission of Application form
                    Assessment
                    Entrance Exam
                    Interview
                    Announcement of Scholarship Status
                    --}}
            </li>
        </ol>
    </div>
</x-app-layout>
