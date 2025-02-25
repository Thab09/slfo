<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Enter Achievement - Player
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('admin.playerachievements.store') }}"
                        enctype="multipart/form-data">
                        @csrf

                        <!-- Player Achievement Placement -->
                        <div>
                            <x-input-label for="placement">Placement</x-input-label>
                            <x-select-input id="placement" class="mt-1 block w-full" name="placement" :selected="old('placement')">
                                <option value="" disabled selected>Select Placement</option>
                                <option value="First">Champions</option>
                                <option value="Second">Runner-ups</option>
                                <option value="Third">Third Place</option>
                                <option value="MVP">MVP</option>
                            </x-select-input>
                            <x-input-error :messages="$errors->get('placement')" class="mt-2" />
                        </div>

                        <!-- Player Achievement -->
                        <div class="mt-4">
                            <x-input-label for="achievement">Achievement</x-input-label>
                            <x-text-input id="achievement" class="mt-1 block w-full" type="text" name="achievement"
                                :value="old('achievement')" required autofocus />
                            <x-input-error :messages="$errors->get('achievement')" class="mt-2" />
                        </div>

                        <!-- Player -->
                        <div class="mt-4">
                            <livewire:multi-select />
                        </div>

                        <!-- Player Achievement Year -->
                        <div class="mt-4">
                            <x-input-label for="year">Year</x-input-label>
                            <x-select-input id="year" class="mt-1 block w-full" name="year" :selected="old('year')">
                                <option value="" disabled selected>Select Year</option>
                                @for ($i = 2015; $i < 2035; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </x-select-input>
                            <x-input-error :messages="$errors->get('year')" class="mt-2" />

                        </div>

                        <div class="mt-4 flex items-center justify-end">
                            <x-primary-button class="ms-3">
                                Enter player achievement
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
