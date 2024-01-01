<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="flex gap-8 p-6 text-gray-900 dark:text-gray-100">
                    <img src="{{ $team->getLogo() }}" alt="team-logo" class="h-48 w-48 rounded-lg border object-cover">
                    <div class="flex flex-col justify-between">
                        <div class="lg:pr-10">
                            <p class="text-3xl font-black">{{ $team->name }}</p>
                            <p class="text-sm text-gray-400">{{ ucwords($team->status) }}</p>
                            <p class="no-scrollbar mt-2 max-h-[70px] overflow-y-scroll text-base text-gray-300">
                                {{ $team->description }}</p>
                        </div>
                        <div class="mt-4 flex gap-4">
                            <a href="{{ route('admin.teams.edit', $team) }}">
                                <x-primary-button>Edit Team</x-primary-button>
                            </a>
                            <x-danger-button>Delete Team</x-danger-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
