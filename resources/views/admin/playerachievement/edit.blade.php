<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Edit Achievement - Player
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST"
                        action="{{ route('admin.playerachievements.update', ['playerachievement' => $achievement]) }}">
                        @csrf
                        @method('PUT')

                        <!-- Player Achievement -->
                        <div>
                            <x-input-label for="achievement">Achievement</x-input-label>
                            <x-text-input id="achievement" class="mt-1 block w-full" type="text" name="achievement"
                                value="{{ $achievement->achievement }}" required autofocus />
                            <x-input-error :messages="$errors->get('achievement')" class="mt-2" />
                        </div>

                        <!-- Player -->
                        <div class="mt-4">
                            <x-input-label for="player_id">Team</x-input-label>
                            <x-select-input id="player_id" class="mt-1 block w-full" name="player_id">
                                <option value="" disabled selected>Select Player</option>
                                @foreach ($players as $player)
                                    <option value="{{ $player->id }}"
                                        @if ($achievement->player_id == $player->id) selected @endif>
                                        {{ $player->name }}
                                    </option>
                                @endforeach
                            </x-select-input>

                            <x-input-error :messages="$errors->get('team_id')" class="mt-2" />
                        </div>

                        <!-- Player Achievement Year -->
                        <div class="mt-4">
                            <x-input-label for="year">Year</x-input-label>
                            <x-select-input id="year" class="mt-1 block w-full" name="year">
                                @for ($i = 2015; $i < 2050; $i++)
                                    <option @if ($achievement->year == $i) selected @endif>
                                        {{ $i }}
                                    </option>
                                @endfor
                            </x-select-input>
                            <x-input-error :messages="$errors->get('year')" class="mt-2" />

                        </div>

                        <div class="mt-4 flex items-center justify-end">
                            <x-primary-button class="ms-3">
                                Edit Player Achievement
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
