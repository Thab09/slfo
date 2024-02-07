@props(['active'])

@php
    $classes = $active ?? false ? 'inline-flex items-center uppercase px-4 py-2 text-sm font-bold leading-5 text-white dark:text-teal-400 hover:skew-x-[-6deg] transition duration-150 ease-in-out' : 'inline-flex items-center uppercase px-4 py-2 text-sm font-semibold leading-5 text-gray-900 dark:text-neutral-300 hover:skew-x-[-6deg] transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
