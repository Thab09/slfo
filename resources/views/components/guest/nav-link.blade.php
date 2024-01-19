@props(['active'])

@php
    $classes = $active ?? false ? 'inline-flex items-center uppercase px-4 py-2 text-sm font-semibold leading-5 text-gray-900 dark:text-white hover:skew-x-[-15deg] transition duration-150 ease-in-out' : 'inline-flex items-center uppercase px-4 py-2 text-sm font-medium leading-5 text-gray-900 dark:text-neutral-300 dark:hover:text-white hover:skew-x-[-12deg] transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
