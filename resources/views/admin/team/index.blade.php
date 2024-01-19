<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Teams
        </h2>
    </x-slot>
    <div class="py-4">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <a href="{{ route('admin.teams.create') }}">
                <x-primary-button class="ml-4 mt-2 py-2 sm:ml-0">Create a new team</x-primary-button>
            </a>

            <livewire:team-index-table />
        </div>
    </div>
</x-app-layout>
