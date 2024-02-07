@props(['achievement'])

<div
    class="flex items-center gap-4 rounded-md p-3 text-gray-800 dark:bg-zinc-900/60 dark:text-gray-200 dark:hover:bg-zinc-900 dark:hover:text-gray-50 sm:p-4">
    <p>{{ $achievement->year }}</p>
    <p>{{ $achievement->achievement }}</p>
</div>
