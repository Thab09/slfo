<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="flex gap-8 p-6 text-gray-900 dark:text-gray-100">
                    <img src="{{ $player->getProfilePicture() }}" alt="team-logo"
                        class="h-48 w-48 rounded-lg border object-cover">
                    <div class="flex flex-col justify-between">
                        <div class="lg:pr-10">
                            <p class="text-3xl font-black">{{ $player->name }} ({{ $player->ign }})</p>
                            <p class="text-lg font-semibold text-gray-300">
                                {{ $player->team->name }} - {{ $player->is_leader ? 'Leader &' : '' }}
                                {{ ucwords($player->role) }}</p>
                            <p class="text-sm text-gray-400">{{ ucwords($player->status) }}</p>
                            <p class="no-scrollbar mt-1 max-h-[60px] overflow-y-scroll text-base text-gray-300">
                                {{ $player->description }}</p>
                        </div>
                        <div class="mt-4 flex gap-4">
                            <a href="{{ route('admin.players.edit', $player) }}">
                                <x-primary-button>Edit Player</x-primary-button>
                            </a>
                            <x-danger-button>Delete Player</x-danger-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
