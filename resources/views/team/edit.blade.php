<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Edit team - {{ $team->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('admin.teams.update', $team) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <!-- Team name -->
                        <div>
                            <x-input-label for="name">Name</x-input-label>
                            <x-text-input id="name" class="mt-1 block w-full" type="text" name="name"
                                value="{{ $team->name }}" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Team description -->
                        <div class="mt-4">
                            <x-input-label for="description">Description</x-input-label>
                            <x-text-area id="description" class="mt-1 block w-full" name="description"
                                autofocus>{{ $team->description }}</x-text-area>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>
                        <!-- Team status -->
                        <div class="mt-4">
                            <x-input-label for="status">Status</x-input-label>
                            <x-select-input id="status" class="mt-1 block w-full" name="status"
                                selected="{{ $team->status }}" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                                <option value="hidden">Hidden</option>
                                <option value="disbanded">Disbanded</option>
                            </x-select-input>
                        </div>

                        <!-- Team logo -->
                        <div class="mt-4">
                            <x-input-label for="logo">Logo</x-input-label>
                            <x-text-input id="logo" class="mt-1 block w-full" type="file" name="logo"
                                autofocus />
                            <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                        </div>

                        <div class="mt-4 flex items-center justify-end">
                            <x-modal data-toggle="modal" data-target="#delete-modal" class="ms-3" name="danger">
                                Delete Team
                            </x-modal>
                            <x-primary-button class="ms-3">
                                Update
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
