<nav x-data="open" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 w-1/4 h-screen fixed top-20">
    <div class="grid mx-7 py-10">

        @hasrole('applicant')
        <x-nav-link :href="route('applicants.dashboard')" :active="request()->routeIs('applicants.dashboard')">
            {{ __('Dashboard') }}
        </x-nav-link>
        <x-nav-head>USER</x-nav-head>
        <x-nav-link :href="route('applicants.profile')" :active="request()->routeIs('applicants.profile') || strpos(url()->current(), 'applicants.profile') !== false">
            {{ __('Application Profile') }}
        </x-nav-link>
        @endhasrole

        @hasanyrole('admin|program_head|mancom|registrar_staff')
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            {{ __('Dashboard') }}
        </x-nav-link>
        <x-nav-head>APPLICANTS</x-nav-head>
        <x-nav-link :href="route('applicants.pending-list')" :active="request()->routeIs('applicants.pending-list') ||
                strpos(url()->current(), 'applicants.pending-list') !== false">
            {{ __('Pending Applicants') }}
        </x-nav-link>
        <x-nav-link :href="route('applicants.evaluated-list')" :active="request()->routeIs('applicants.evaluated-list') ||
                strpos(url()->current(), 'applicants.evaluated-list') !== false">
            {{ __('Evaluated Applicants') }}
        </x-nav-link>
        @endhasanyrole

        @role('admin')
        <x-nav-head>EVALUATORS</x-nav-head>
        <x-nav-link :href="route('evaluators.list')" :active="request()->routeIs('evaluators') || strpos(url()->current(), 'evaluators') !== false">
            {{ __('List of Evaluators') }}
        </x-nav-link>

        <x-nav-head>MANCOM</x-nav-head>
        <x-nav-link :href="route('mancoms.list')" :active="request()->routeIs('mancoms') || strpos(url()->current(), 'mancoms') !== false">
            {{ __('List of MANCOMs') }}
        </x-nav-link>

        <x-nav-head>REGISTRAR STAFF</x-nav-head>
        <x-nav-link :href="route('staffs.list')" :active="request()->routeIs('staffs') || strpos(url()->current(), 'staffs') !== false">
            {{ __('List of Registrar Staff') }}
        </x-nav-link>
        @endrole
    </div>

</nav>