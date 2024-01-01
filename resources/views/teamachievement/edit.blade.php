<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Enter Achievement - Team
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('admin.teamachievements.update', $teamachievement) }}">
                        @csrf
                        @method('PUT')

                        <!-- Team Achievement -->
                        <div>
                            <x-input-label for="achievement">Achievement</x-input-label>
                            <x-text-input id="achievement" class="mt-1 block w-full" type="text" name="achievement"
                                value="{{ $teamachievement->achievement }}" required autofocus />
                            <x-input-error :messages="$errors->get('achievement')" class="mt-2" />
                        </div>

                        <!-- Team -->
                        <div class="mt-4">
                            <x-input-label for="team_id">Team</x-input-label>
                            <x-select-input id="team_id" class="mt-1 block w-full" name="team_id" required>
                                @foreach ($teams as $team)
                                    <option value="{{ $team->id }}"
                                        @if ($teamachievement->team_id == $team->id) selected @endif>
                                        {{ $team->name }}
                                    </option>
                                @endforeach
                            </x-select-input>

                            <x-input-error :messages="$errors->get('team_id')" class="mt-2" />
                        </div>

                        <!-- Team Achievement Year -->
                        <div class="mt-4">
                            <x-input-label for="year">Year</x-input-label>
                            <x-select-input id="year" class="mt-1 block w-full" name="year">
                                @for ($i = 2015; $i < 2050; $i++)
                                    <option @if ($teamachievement->year == $i) selected @endif>
                                        {{ $i }}
                                    </option>
                                @endfor
                            </x-select-input>
                            <x-input-error :messages="$errors->get('year')" class="mt-2" />

                        </div>

                        <div class="mt-4 flex items-center justify-end">
                            <x-primary-button class="ms-3">
                                Edit team achievement
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
