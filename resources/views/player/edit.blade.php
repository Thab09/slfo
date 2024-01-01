<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Edit player - {{ $player->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('admin.players.update', $player) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Player name -->
                        <div>
                            <x-input-label for="name">Name</x-input-label>
                            <x-text-input id="name" class="mt-1 block w-full" type="text" name="name"
                                value="{{ $player->name }}" autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Player in game name -->
                        <div class="mt-4">
                            <x-input-label for="ign">IGN (In Game Name)</x-input-label>
                            <x-text-input id="ign" class="mt-1 block w-full" type="text" name="ign"
                                value="{{ $player->ign }}" required autofocus />
                            <x-input-error :messages="$errors->get('ign')" class="mt-2" />
                        </div>

                        <!-- Player role -->
                        <div class="mt-4">
                            <x-input-label for="role">Status</x-input-label>
                            <x-select-input id="role" class="mt-1 block w-full" name="role" :selected="old('role')"
                                required>
                                <option @if ($player->role == 'Roam') selected @endif value="Roam">Roam</option>
                                <option @if ($player->role == 'Jungler') selected @endif value="Jungler">Jungler
                                </option>
                                <option @if ($player->role == 'Midlaner') selected @endif value="Midlaner">Midlaner
                                </option>
                                <option @if ($player->role == 'Gold Laner') selected @endif value="Gold Laner">Gold Laner
                                </option>
                                <option @if ($player->role == 'Exp Laner') selected @endif value="Exp Laner">Exp Laner
                                </option>
                            </x-select-input>

                            <x-input-error :messages="$errors->get('role')" class="mt-2" />
                        </div>

                        <!-- Player isLeader -->
                        <div class="mt-4">
                            <x-input-label for="is_leader">Leader</x-input-label>
                            <div class="flex gap-4">
                                <div class="flex items-center gap-2">
                                    <x-text-input id="yes" class="block" type="radio" name="is_leader"
                                        value="1" checked="{{ $player->is_leader == 1 ? 'checked' : '' }}" required
                                        autofocus />
                                    <x-input-label for="yes" class="">Yes</x-input-label>
                                </div>
                                <div class="flex items-center gap-2">
                                    <x-text-input id="no" class="block" type="radio" name="is_leader"
                                        value="0" checked="{{ $player->is_leader == 0 ? 'checked' : '' }}" required
                                        autofocus />
                                    <x-input-label for="no" class="">No</x-input-label>
                                </div>
                            </div>
                            <x-input-error :messages="$errors->get('is_leader')" class="mt-2" />
                        </div>

                        <!-- Player Team -->
                        <div class="mt-4">
                            <x-input-label for="team_id">Team</x-input-label>
                            <x-select-input id="team_id" class="mt-1 block w-full" name="team_id" :selected="old('team')"
                                required>
                                @foreach ($teams as $team)
                                    <option value="{{ $team->id }}"
                                        @if ($player->team_id == $team->id) selected @endif>
                                        {{ $team->name }}
                                    </option>
                                @endforeach
                            </x-select-input>

                            <x-input-error :messages="$errors->get('team')" class="mt-2" />
                        </div>

                        <!-- Player description -->
                        <div class="mt-4">
                            <x-input-label for="description">Description</x-input-label>
                            <x-text-area id="description" class="mt-1 block w-full" name="description"
                                value="old('description')" autofocus>{{ $player->description }}</x-text-area>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- Player status -->
                        <div class="mt-4">
                            <x-input-label for="status">Status</x-input-label>
                            <x-select-input id="status" class="mt-1 block w-full" name="status" :selected="old('status')"
                                required>
                                <option @if ($player->status == 'Active') selected @endif value="Active">Active</option>
                                <option @if ($player->status == 'Inactive') selected @endif value="Inactive">Inactive
                                </option>
                                <option @if ($player->status == 'Hidden') selected @endif value="Hidden">Hidden</option>
                                <option @if ($player->status == 'Left') selected @endif value="Left">Left</option>
                            </x-select-input>

                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>

                        <!-- Player profile picture -->
                        <div class="mt-4">
                            <x-input-label for="profile_picture">Profile Picture</x-input-label>
                            <x-text-input id="profile_picture" class="mt-1 block w-full" type="file"
                                name="profile_picture" autofocus />
                            <x-input-error :messages="$errors->get('profile_picture')" class="mt-2" />
                        </div>

                        <div class="mt-4 flex items-center justify-end">
                            <x-primary-button class="ms-3">
                                Edit Player
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
