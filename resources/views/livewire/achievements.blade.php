<div>
    @if ($viewType == 'team')
        <a href="{{ route('admin.teamachievements.create') }}">
            <x-primary-button class="ml-2 mt-4 py-2 sm:ml-0">Create a team achievement</x-primary-button>
        </a>
    @elseif ($viewType == 'player')
        <a href="{{ route('admin.playerachievements.create') }}">
            <x-primary-button class="ml-2 mt-4 py-2 sm:ml-0">Create a player achievement</x-primary-button>
        </a>
    @endif

    <div class="ml-2 mt-8 flex gap-4 sm:ml-0">
        <x-secondary-button class="border-2 py-2" wire:click="switchViewType('team')">Team
            Achieve.</x-secondary-button>
        <x-secondary-button class="border-2 py-2" wire:click="switchViewType('player')">Player
            Achieve.</x-secondary-button>
    </div>

    <table class="mt-4 w-full border-collapse bg-white text-gray-500 dark:bg-gray-800 sm:rounded-lg">
        <thead>
            <tr>
                <x-table.header>Year</x-table.header>
                @if ($viewType == 'team')
                    <x-table.header>Team Name</x-table.header>
                @elseif ($viewType == 'player')
                    <x-table.header>Player Name</x-table.header>
                @endif
                <x-table.header>Achievement</x-table.header>
                <x-table.header>Actions</x-table.header>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 border-t border-gray-100 bg-gray-900">
            @foreach ($achievements as $achievement)
                <tr class="hover:bg-gray-50 hover:dark:bg-gray-700">
                    <x-table.data>{{ $achievement->year }}</x-table.data>
                    @if ($viewType == 'team')
                        @if ($achievement->team_id)
                            <x-table.data>{{ $achievement->team->name }}</x-table.data>
                        @else
                            <x-table.data>Unassigned</x-table.data>
                        @endif
                        <x-table.data>{{ $achievement->achievement }}</x-table.data>
                        <x-table.data>
                            <div class="flex gap-4">
                                <a
                                    href="{{ route('admin.teamachievements.edit', ['teamachievement' => $achievement]) }}">
                                    <x-feathericon-edit class="h-5 w-5 text-gray-500 sm:hidden" />
                                    <x-primary-button class="hidden sm:flex">Edit</x-primary-button>
                                </a>
                                <x-delete-modal>
                                    <form
                                        action="{{ route('admin.teamachievements.destroy', ['teamachievement' => $achievement]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <div class="flex flex-col gap-6 text-lg font-medium">
                                            Do you wish to delete this team achievement?
                                            <x-danger-button class="flex justify-center gap-4 py-2">
                                                Delete
                                            </x-danger-button>
                                        </div>
                                    </form>
                                </x-delete-modal>
                            </div>
                        </x-table.data>
                    @elseif ($viewType == 'player')
                        @if ($achievement->player_id)
                            <x-table.data>{{ $achievement->player->name }}</x-table.data>
                        @else
                            <x-table.data>Unassigned</x-table.data>
                        @endif
                        <x-table.data>{{ $achievement->achievement }}</x-table.data>
                        <x-table.data>
                            <div class="flex gap-4">
                                <a
                                    href="{{ route('admin.playerachievements.edit', ['playerachievement' => $achievement]) }}">
                                    <x-feathericon-edit class="h-5 w-5 text-gray-500 sm:hidden" />
                                    <x-primary-button class="hidden sm:flex">Edit</x-primary-button>
                                </a>
                                <x-delete-modal>
                                    <form
                                        aaction="{{ route('admin.playerachievements.destroy', ['playerachievement' => $achievement]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <div class="flex flex-col gap-6 text-lg font-medium">
                                            Do you wish to delete this player achievement?
                                            <x-danger-button class="flex justify-center gap-4 py-2">
                                                Delete
                                            </x-danger-button>
                                        </div>
                                    </form>
                                </x-delete-modal>
                            </div>
                        </x-table.data>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="my-4">
        {{ $achievements->links() }}
    </div>
</div>
