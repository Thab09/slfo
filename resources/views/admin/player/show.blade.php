<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="flex gap-4 p-4 text-gray-900 dark:text-gray-100 sm:gap-8 sm:p-6">
                    <img src="{{ $player->getProfilePicture() }}" alt="team-logo"
                        class="{{ $player->is_leader ? 'border-yellow-500' : 'border-white' }} h-28 w-28 rounded-lg border object-cover sm:h-48 sm:w-48">
                    <div class="flex flex-col">
                        <div class="lg:pr-10">
                            <p class="text-lg font-black sm:text-3xl">{{ $player->ign }}</p>
                            <p class="text-xs font-light text-gray-500 sm:text-base">{{ $player->name }}</p>
                            <p class="mt-1 text-sm font-semibold text-gray-300 sm:mt-2 sm:text-lg">
                                {{ $player->team ? $player->team->name . ' - ' : '' }}
                                {{ ucwords($player->role) }}</p>
                            <p class="text-xs text-gray-400 sm:text-sm">{{ ucwords($player->status) }}</p>
                        </div>
                        <div class="mt-2 flex gap-2 sm:gap-4">
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
                    </div>
                </div>

                @if ($achievements->count())
                    <div class="mt-4 sm:mt-0 sm:p-6">
                        <p class="px-4 font-medium text-gray-100 sm:px-0 sm:text-lg sm:font-semibold">Player
                            Achievements
                        </p>
                        <table
                            class="mt-4 w-full border-collapse bg-white text-gray-500 dark:bg-gray-700 sm:rounded-lg">
                            <thead>
                                <tr>
                                    <x-table.header>Year</x-table.header>
                                    <x-table.header>Achievement</x-table.header>
                                    <x-table.header>Actions</x-table.header>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 border-t border-gray-100 bg-gray-900">
                                @foreach ($achievements as $achievement)
                                    <tr class="hover:bg-gray-50 hover:dark:bg-gray-700">
                                        <x-table.data>{{ $achievement->year }}</x-table.data>
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
                                                        action="{{ route('admin.playerachievements.destroy', ['playerachievement' => $achievement]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                        <div class="flex flex-col gap-6 text-lg font-medium">
                                                            Do you wish to delete player achievement?
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
                        <div class="my-4 px-2">
                            {{ $achievements->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
