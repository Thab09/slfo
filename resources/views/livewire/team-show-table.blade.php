<div>
    <div class="ml-4 mt-2 flex gap-4 sm:ml-0">
        <x-secondary-button class="border-2 py-2" wire:click="switchViewType('players')">Players</x-secondary-button>
        <x-secondary-button class="border-2 py-2" wire:click="switchViewType('achievements')">
            Achievements
        </x-secondary-button>
    </div>

    @if ($data->count())
        <p class="mt-4 px-4 font-medium text-gray-100 sm:px-0 sm:text-lg sm:font-semibold">
            {{ $viewType == 'players' ? 'Team Players' : 'Team Achievements' }}
        </p>
        <table class="mb-8 mt-4 w-full border-collapse bg-white text-gray-500 dark:bg-gray-700 sm:rounded-lg">
            <thead>
                @if ($viewType == 'players')
                    <tr>
                        <x-table.header>Name</x-table.header>
                        <x-table.header>Role</x-table.header>
                        <x-table.header>Actions</x-table.header>
                    </tr>
                @elseif ($viewType == 'achievements')
                    <tr>
                        <x-table.header>Year</x-table.header>
                        <x-table.header>Achievement</x-table.header>
                        <x-table.header>Actions</x-table.header>
                    </tr>
                @endif
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100 bg-gray-900">
                @if ($viewType == 'players')
                    @foreach ($data as $player)
                        <tr class="hover:bg-gray-50 hover:dark:bg-gray-700">
                            <x-table.data>
                                <a href="{{ route('admin.players.show', $player) }}">
                                    <div class="flex items-center gap-6">
                                        <img src="{{ $player->getProfilePicture() }}" alt="team-logo"
                                            class="{{ $player->is_leader ? 'border border-yellow-500' : 'border-none' }} hidden h-14 w-14 rounded-lg sm:flex">
                                        <div>
                                            <p class="text-lg font-semibold">{{ $player->ign }}</p>
                                            <p class="text-sm text-gray-500">{{ $player->name }}</p>
                                        </div>
                                    </div>
                                </a>
                            </x-table.data>
                            <x-table.data>{{ $player->role }}</x-table.data>
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
                                                <x-danger-button class="flex gap-4 py-2">
                                                    <x-feathericon-trash-2 class="h-5 w-5 text-white" />
                                                    Delete
                                                </x-danger-button>
                                            </div>
                                        </form>
                                    </x-delete-modal>
                                </div>
                            </x-table.data>
                        </tr>
                    @endforeach
                @elseif ($viewType == 'achievements')
                    @foreach ($data as $achievement)
                        <tr class="hover:bg-gray-50 hover:dark:bg-gray-700">
                            <x-table.data>{{ $achievement->year }}</x-table.data>
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
                                                <x-danger-button class="flex gap-4 py-2">
                                                    <x-feathericon-trash-2 class="h-5 w-5 text-white" />
                                                    Delete
                                                </x-danger-button>
                                            </div>
                                        </form>
                                    </x-delete-modal>
                                </div>
                            </x-table.data>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div class="my-4 px-2">
            {{ $data->links() }}
        </div>
    @else
        <p class="mb-8 mt-4 px-4 font-medium text-gray-100 sm:px-0 sm:text-lg sm:font-semibold">
            No Data Found
        </p>
    @endif
</div>
