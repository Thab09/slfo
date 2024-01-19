<div>
    <div class="mx-4 sm:mx-0">
        <x-text-input wire:model.live="search" placeholder="Search Team" class="mt-4 w-full border-2" />
    </div>
    <table class="mt-8 w-full border-collapse bg-white text-gray-500 dark:bg-gray-800 sm:rounded-lg">
        <thead>
            <tr>
                <x-table.header>Player Name</x-table.header>
                <x-table.header class="hidden md:flex">Role</x-table.header>
                <x-table.header>Team</x-table.header>
                <x-table.header>Actions</x-table.header>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 border-t border-gray-100 bg-gray-900">
            @foreach ($players as $player)
                <tr class="hover:bg-gray-50 hover:dark:bg-gray-700">
                    <x-table.data>
                        <a href="{{ route('admin.players.show', $player) }}">
                            <div class="flex items-center gap-6">
                                <img src="{{ url('storage/' . $player->profile_picture) }}" alt="team-logo"
                                    class="{{ $player->is_leader ? 'border border-yellow-500' : 'border-none' }} hidden h-14 w-14 rounded-lg sm:flex">
                                <div>
                                    <p class="text-lg font-semibold">{{ $player->ign }}</p>
                                    <p class="text-sm text-gray-500">{{ $player->name }}</p>
                                </div>
                            </div>
                        </a>
                    </x-table.data>
                    <x-table.data class="hidden md:table-cell">{{ $player->role }}</x-table.data>
                    <x-table.data>
                        @if ($player->team_id)
                            <a href="{{ route('admin.teams.show', $player->team) }}">
                                {{ $player->team->name }}
                            </a>
                        @else
                            <p>Unassigned</p>
                        @endif
                    </x-table.data>
                    <x-table.data>
                        <div class="flex gap-4">
                            <a href="{{ route('admin.players.edit', $player) }}">
                                <x-feathericon-edit class="h-5 w-5 text-gray-500 sm:hidden" />
                                <x-primary-button class="hidden sm:flex">Edit</x-primary-button>
                            </a>
                            <x-delete-modal>
                                <form action="{{ route('admin.players.destroy', $player) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <div class="flex flex-col gap-6 text-lg font-medium">
                                        Do you wish to delete player - {{ $player->ign }}?
                                        <x-danger-button class="flex justify-center gap-4 py-2">
                                            Delete
                                        </x-danger-button>
                                    </div>
                                </form>
                            </x-delete-modal>
                        </div>
                    </x-table.data>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="my-4">
        {{ $players->links() }}
    </div>
</div>
