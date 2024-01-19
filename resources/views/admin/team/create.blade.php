<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Create a new team
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('admin.teams.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Team name -->
                        <div>
                            <x-input-label for="name">Name</x-input-label>
                            <x-text-input id="name" class="mt-1 block w-full" type="text" name="name"
                                :value="old('name')" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Team description -->
                        <div class="mt-4">
                            <x-input-label for="description">Description</x-input-label>
                            <x-text-area id="description" class="mt-1 block w-full" name="description" :value="old('description')"
                                autofocus />
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>
                        <!-- Team status -->
                        <div class="mt-4">
                            <x-input-label for="status">Status</x-input-label>
                            <x-select-input id="status" class="mt-1 block w-full" name="status" :selected="old('status')"
                                required>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                                <option value="Hidden">Hidden</option>
                                <option value="Disbanded">Disbanded</option>
                            </x-select-input>
                        </div>

                        <!-- Team logo -->
                        <div class="mt-4">
                            <div>
                                <x-input-label for="logo">Logo</x-input-label>
                                <x-text-input id="logo" class="mt-1 block w-full" type="file" name="logo"
                                    autofocus />
                                <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Team logo preview -->
                        <div class="mt-4">
                            <div class="mt-4 flex h-36 w-36 items-center justify-center rounded-lg border">
                                <p id="placeholder" class="flex text-white">Logo Preview</p>
                                <img src="#" alt="" id="preview" class="hidden object-cover">
                            </div>
                            <x-danger-button id="remove" class="mt-4 w-36 py-2">Remove Image</x-danger-button>
                        </div>

                        <div class="mt-4 flex items-center justify-end">
                            <x-primary-button class="py-2 sm:ms-3">
                                Create new team
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
    logo.onchange = evt => {
        placeholder = document.getElementById('placeholder');
        const [file] = logo.files
        if (file) {
            placeholder.style.display = 'none';
            preview.style.display = 'flex';
            preview.src = URL.createObjectURL(file)
        }
    }
    // Remove Preview Image Input
    remove.onclick = evt => {
        evt.preventDefault();
        logo.value = null;
        preview.style.display = 'none';
        placeholder.style.display = 'flex';
    }
    remove.addEventListener('click', () => {});
</script>
