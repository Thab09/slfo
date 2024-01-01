<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            All Players
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <a href="{{ route('admin.players.create') }}" class="p-8">
                    <x-primary-button class="mt-6">Create a new player</x-primary-button>
                </a>

                <div class="grid grid-cols-1 gap-4 p-8 text-gray-900 dark:text-gray-100 md:grid-cols-2 xl:grid-cols-3">
                    @forelse ($players as $player)
                        <a href="{{ route('admin.players.show', $player) }}">
                            <div class="flex items-center gap-6 rounded-lg bg-white p-2 dark:bg-gray-700">
                                <img src="{{ url('storage/' . $player->profile_picture) }}" alt="team-logo"
                                    width="60" height="60" class="rounded-lg object-cover">
                                <p class="text-xl font-bold">{{ $player->name }}</p>
                            </div>
                        </a>
                    @empty
                        <div class="text-gray-900 dark:text-gray-100">
                            There are no teams yet.
                        </div>
                    @endforelse
                </div>
            </div>
            <div class="mt-4">
                {{ $players->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
