<nav x-data="open" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 w-1/4 h-screen fixed top-20">
    <div class="grid mx-7 py-10">
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            {{ __('Dashboard') }}
        </x-nav-link>

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