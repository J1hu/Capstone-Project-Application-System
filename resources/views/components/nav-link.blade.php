@props(['active'])

@php
$classes = $active ?? false ? 'inline-flex items-center py-2 px-3 rounded-md text-white bg-blue-400 dark:border-blue-600 text-sm font-semibold leading-5 text-gray-900 dark:text-gray-100 focus:outline-none focus:border-blue-700 transition duration-150 ease-in-out' : 'inline-flex items-center py-2 px-3 text-sm leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>