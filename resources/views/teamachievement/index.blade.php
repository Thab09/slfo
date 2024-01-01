<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Team Achievements
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            {{-- <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <a href="{{ route('admin.teamachievements.create') }}" class="p-4 md:p-8">
                    <x-primary-button class="mt-6">Enter team achievement</x-primary-button>
                </a>
                <div class="grid grid-cols-1 gap-4 p-4 text-gray-900 dark:text-gray-100 md:p-8">
                    @forelse ($achievements as $teamachievement)
                        <div
                            class="flex flex-col gap-4 rounded-lg bg-white p-4 dark:bg-gray-700 md:flex-row md:items-center md:justify-between">
                            <p class="text-base font-medium">{{ $teamachievement->year }}
                                {{ $teamachievement->team->name }}
                                {{ $teamachievement->achievement }}
                            </p>
                            <div class="flex gap-2">
                                <a href="{{ route('admin.teamachievements.edit', $teamachievement) }}">
                                    <x-primary-button>Edit</x-primary-button>
                                </a>
                                <form action="{{ route('admin.teamachievements.destroy', $teamachievement) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-danger-button>Delete</x-danger-button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="text-gray-900 dark:text-gray-100">
                            There are no team achievements yet.
                        </div>
                    @endforelse
                </div>
            </div>
            <div class="mt-4">
                {{ $achievements->links() }}
            </div> --}}
            <livewire:achievements />
        </div>
    </div>
</x-app-layout>
