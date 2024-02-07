<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="flex gap-4 p-4 text-gray-900 dark:text-gray-100 sm:gap-8 sm:p-6">
                    <div class="shrink-0">
                        <img src="{{ $team->getLogo() }}" alt="team-logo"
                            class="h-24 w-24 shrink-0 rounded-lg border object-cover sm:h-48 sm:w-48">
                    </div>

                    <div class="flex flex-col">
                        <div class="lg:pr-10">
                            <p class="text-xl font-bold sm:text-3xl sm:font-black">{{ $team->name }}</p>
                            <p class="text-sm text-gray-400">{{ ucwords($team->status) }}</p>
                        </div>
                        <div class="mt-2 flex gap-2 sm:gap-4">
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
                    </div>
                </div>
                <div class="sm:px-6">
                    <livewire:team-show-table :$team />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
