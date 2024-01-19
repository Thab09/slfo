<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Create a new player
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('admin.players.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Player name -->
                        <div>
                            <x-input-label for="name">Name</x-input-label>
                            <x-text-input id="name" class="mt-1 block w-full" type="text" name="name"
                                :value="old('name')" autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Player in game name -->
                        <div class="mt-4">
                            <x-input-label for="ign">IGN (In Game Name)</x-input-label>
                            <x-text-input id="ign" class="mt-1 block w-full" type="text" name="ign"
                                :value="old('ign')" required autofocus />
                            <x-input-error :messages="$errors->get('ign')" class="mt-2" />
                        </div>

                        <!-- Player role -->
                        <div class="mt-4">
                            <x-input-label for="role">Status</x-input-label>
                            <x-select-input id="role" class="mt-1 block w-full" name="role" :selected="old('role')"
                                required>
                                <option value="Roam">Roam</option>
                                <option value="Jungler">Jungler</option>
                                <option value="Midlaner">Midlaner</option>
                                <option value="Gold Laner">Gold Laner</option>
                                <option value="Exp Laner">Exp Laner</option>
                            </x-select-input>

                            <x-input-error :messages="$errors->get('role')" class="mt-2" />
                        </div>

                        <!-- Player isLeader -->
                        <div class="mt-4">
                            <x-input-label for="is_leader">Leader</x-input-label>
                            <div class="flex gap-4">
                                <div class="flex items-center gap-2">
                                    <x-text-input id="yes" class="block" type="radio" name="is_leader"
                                        value="1" required autofocus />
                                    <x-input-label for="yes" class="">Yes</x-input-label>
                                </div>
                                <div class="flex items-center gap-2">
                                    <x-text-input id="no" class="block" type="radio" name="is_leader"
                                        value="0" required autofocus />
                                    <x-input-label for="no" class="">No</x-input-label>
                                </div>
                            </div>
                            <x-input-error :messages="$errors->get('is_leader')" class="mt-2" />
                        </div>

                        <!-- Player Team -->
                        <div class="mt-4">
                            <x-input-label for="team_id">Team</x-input-label>
                            <x-select-input id="team_id" class="mt-1 block w-full" name="team_id" :selected="old('team_id')">
                                <option value="" disabled selected>Select Team</option>
                                @foreach ($teams as $team)
                                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                                @endforeach
                            </x-select-input>

                            <x-input-error :messages="$errors->get('team_id')" class="mt-2" />
                        </div>

                        <!-- Player status -->
                        <div class="mt-4">
                            <x-input-label for="status">Status</x-input-label>
                            <x-select-input id="status" class="mt-1 block w-full" name="status" :selected="old('status')"
                                required>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                                <option value="Hidden">Hidden</option>
                                <option value="Left">Left</option>
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

                        <!-- Player profile picture preview -->
                        <div class="mt-4">
                            <div class="mt-4 flex h-36 w-36 items-center justify-center rounded-lg border">
                                <p id="placeholder" class="flex text-white">Preview</p>
                                <img src="#" alt="" id="preview" class="hidden object-cover">
                            </div>
                            <x-danger-button id="remove" class="mt-4 w-36 py-2">Remove Image</x-danger-button>
                        </div>

                        <div class="mt-4 flex items-center justify-end">
                            <x-primary-button class="ms-3">
                                Create Player
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script type="text/javascript">
    // Preview Image Input
    profile_picture.onchange = evt => {
        placeholder = document.getElementById('placeholder');
        const [file] = profile_picture.files
        if (file) {
            placeholder.style.display = 'none';
            preview.style.display = 'flex';
            preview.src = URL.createObjectURL(file)
        }
    }
    // Remove Preview Image Input
    remove.onclick = evt => {
        evt.preventDefault();
        profile_picture.value = null;
        preview.style.display = 'none';
        placeholder.style.display = 'flex';
    }
    remove.addEventListener('click', () => {});
</script>
