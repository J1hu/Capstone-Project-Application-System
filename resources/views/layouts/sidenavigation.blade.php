<nav x-data="open" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 w-1/5 h-screen fixed top-20 overflow-y-auto pb-40">
    <div class="grid mx-7 py-10">

        @hasrole('applicant')
        <x-nav-link :href="route('applicants.dashboard')" :active="request()->routeIs('applicants.dashboard')">
            <span class="material-symbols-outlined mr-5">
                home
            </span>
            {{ __('Dashboard') }}
        </x-nav-link>
        <x-nav-head>USER</x-nav-head>
        <x-nav-link :href="route('applicants.profile')" :active="request()->routeIs('applicants.profile') ||
                strpos(url()->current(), 'applicants.profile') !== false">
            <span class="material-symbols-outlined mr-5">
                face
            </span>
            {{ __('My Profile') }}
        </x-nav-link>
        <x-nav-head>NOTIFICATIONS</x-nav-head>
        <x-nav-link :href="route('notifications')" :active="request()->routeIs('notifications') || strpos(url()->current(), 'notifications') !== false">
            <div class="hidden" id="ping">
                <span class="relative h-3 w-3 flex">
                    <span class="animate-ping absolute h-full w-full rounded-full bg-red-500 opacity-75"></span>
                    <span class="relative rounded-full h-3 w-3 bg-red-700"></span>
                </span>
            </div>
            <span class="material-symbols-outlined mr-5">
                notifications
            </span>
            {{ __('View Notifications') }}
        </x-nav-link>
        @endhasrole

        @hasanyrole('admin|program_head|mancom|registrar_staff')
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            <span class="material-symbols-outlined mr-5">
                home
            </span>
            {{ __('Dashboard') }}
        </x-nav-link>
        @hasanyrole('admin|registrar_staff|program_head|mancom')
        <x-nav-head>REPORTS</x-nav-head>
        <x-nav-link :href="route('visualiation.view')" :active="request()->routeIs('visualiation.view') ||
                strpos(url()->current(), 'visualiation.view') !== false">
            <span class="material-symbols-outlined mr-5">
                pending_actions
            </span>
            {{ __('Visualizations') }}
        </x-nav-link>
        @endhasrole
        <x-nav-head>APPLICANTS</x-nav-head>
        <x-nav-link :href="route('applicants.pending-list')" :active="request()->routeIs('applicants.pending-list') ||
                strpos(url()->current(), 'applicants.pending-list') !== false">
            <span class="material-symbols-outlined mr-5">
                pending_actions
            </span>
            {{ __('Pending Applicants') }}
        </x-nav-link>
        <x-nav-link :href="route('applicants.evaluated-list')" :active="request()->routeIs('applicants.evaluated-list') ||
                strpos(url()->current(), 'applicants.evaluated-list') !== false">
            <span class="material-symbols-outlined mr-5">
                task
            </span>
            {{ __('Newly Qualified Applicants') }}
        </x-nav-link>
        <x-nav-link :href="route('applicants.failed-list')" :active="request()->routeIs('applicants.failed-list') ||
                strpos(url()->current(), 'applicants.failed-list') !== false">
            <span class="material-symbols-outlined mr-5">
                assignment_late
            </span>
            {{ __('Failed Applicants') }}
        </x-nav-link>
        @endhasanyrole

        <x-nav-head>STATUSES</x-nav-head>
        @hasanyrole('admin|program_head')
        <x-nav-link :href="route('preassessment.list')" :active="request()->routeIs('preassessment.list') ||
                strpos(url()->current(), 'preassessment.list') !== false">
            <span class="material-symbols-outlined mr-5">
                person_search
            </span>
            {{ __('Ready For Preassessment') }}
        </x-nav-link>
        @endhasanyrole
        @hasanyrole('admin|registrar_staff')
        <x-nav-link :href="route('exam.list')" :active="request()->routeIs('exam.list') ||
                strpos(url()->current(), 'exam.list') !== false">
            <span class="material-symbols-outlined mr-5">
                text_snippet
            </span>
            {{ __('Ready For Exam Score Inputs') }}
        </x-nav-link>
        @endhasrole
        @hasanyrole('admin|program_head')
        <x-nav-link :href="route('interview.list')" :active="request()->routeIs('interview.list') ||
                strpos(url()->current(), 'interview.list') !== false">
            <span class="material-symbols-outlined mr-5">
                record_voice_over
            </span>
            {{ __('Ready For Interview Assessment') }}
        </x-nav-link>
        @endhasanyrole
        @hasanyrole('admin|mancom')
        <x-nav-link :href="route('final-assessment.list')" :active="request()->routeIs('final-assessment.list') ||
                strpos(url()->current(), 'final-assessment.list') !== false">
            <span class="material-symbols-outlined mr-5">
                note_alt
            </span>
            {{ __('Ready For Final Assessment') }}
        </x-nav-link>
        @endhasanyrole

        @role('admin')
        <x-nav-head>EVALUATORS</x-nav-head>
        <x-nav-link :href="route('evaluators.list')" :active="request()->routeIs('evaluators') || strpos(url()->current(), 'evaluators') !== false">
            <span class="material-symbols-outlined mr-5">
                groups
            </span>
            {{ __('List of Evaluators') }}
        </x-nav-link>

        <x-nav-head>MANCOM</x-nav-head>
        <x-nav-link :href="route('mancoms.list')" :active="request()->routeIs('mancoms') || strpos(url()->current(), 'mancoms') !== false">
            <span class="material-symbols-outlined mr-5">
                manage_accounts
            </span>
            {{ __('List of MANCOMs') }}
        </x-nav-link>

        <x-nav-head>REGISTRAR STAFF</x-nav-head>
        <x-nav-link :href="route('staffs.list')" :active="request()->routeIs('staffs') || strpos(url()->current(), 'staffs') !== false">
            <span class="material-symbols-outlined mr-5">
                supervisor_account
            </span>
            {{ __('List of Registrar Staff') }}
        </x-nav-link>
        @endrole
        @role('registrar_staff|admin')
        <x-nav-head>SCHOOL YEAR MANAGEMENT</x-nav-head>
        <x-nav-link :href="route('school-years.list')" :active="request()->routeIs('school-years') || strpos(url()->current(), 'school-years') !== false">
            <span class="material-symbols-outlined mr-5">
                view_agenda
            </span>
            {{ __('List of School Year') }}
        </x-nav-link>

        <x-nav-head>NOTIFICATION</x-nav-head>
        <x-nav-link :href="route('notifications.view')" :active="request()->routeIs('notifications') || strpos(url()->current(), 'notifications') !== false">
            <span class="material-symbols-outlined mr-5">
                notifications
            </span>
            {{ __('Send Notifications') }}
        </x-nav-link>
        @endrole
    </div>
</nav>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Perform an AJAX request to check if there are unread notifications
        $.ajax({
            url: '/notifications/check-unread',
            method: 'GET',
            success: function(response) {
                var hasUnreadNotifications = response.hasUnreadNotifications;

                if (hasUnreadNotifications) {
                    $('#ping').removeClass('hidden');
                } else {
                    $('#ping').addClass('hidden');
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                // Handle the error case, if any
            }
        });
    });
</script>