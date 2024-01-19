<div>
    <div class="mx-4 sm:mx-0">
        <x-text-input wire:model.live="search" placeholder="Search Team" class="mt-4 w-full border-2" />
    </div>
    <table class="mt-6 w-full border-collapse bg-white text-gray-500 dark:bg-gray-800 sm:rounded-lg">
        <thead>
            <tr>
                <x-table.header>Team Name</x-table.header>
                <x-table.header class="hidden sm:flex">Status</x-table.header>
                <x-table.header>Actions</x-table.header>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 border-t border-gray-100 bg-gray-900">
            @foreach ($teams as $team)
                <tr class="hover:bg-gray-50 hover:dark:bg-gray-700">
                    <x-table.data>
                        <a href="{{ route('admin.teams.show', $team) }}">
                            <div class="flex items-center gap-6">
                                <img src="{{ $team->getLogo() }}" alt="team-logo" class="h-14 w-14 rounded-lg">
                                <p>{{ $team->name }}</p>
                            </div>
                        </a>
                    </x-table.data>
                    <x-table.data class="hidden sm:table-cell">{{ $team->status }}</x-table.data>
                    <x-table.data>
                        <div class="flex gap-4">
                            <a href="{{ route('admin.teams.edit', $team) }}">
                                <x-feathericon-edit class="h-5 w-5 text-gray-500 sm:hidden" />
                                <x-primary-button class="hidden sm:flex">Edit</x-primary-button>
                            </a>
                            <x-delete-modal>
                                <form action="{{ route('admin.teams.destroy', $team) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <div class="flex flex-col gap-6 text-lg font-medium">
                                        Do you wish to delete team - {{ $team->name }}?
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

    <div class="mt-4 px-2">
        {{ $teams->links() }}
    </div>
</div>
