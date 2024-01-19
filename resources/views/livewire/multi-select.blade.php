<div x-data="{ open: false }" @click.away="open = false" class="w-full">
    <!-- Selected Options -->
    <div>
        <p>
            {{ $selectedOptions ? 'Selected Player(s)' : '' }}
        </p>
        <div class="grid grid-cols-2 gap-2 py-2 text-gray-900 dark:text-gray-100 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($selectedOptions as $selectedOption)
                <div>
                    <p class="rounded-md bg-gray-500 p-2 sm:px-4">{{ $selectedOption }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <x-text-input @click="open = !open" wire:model.live="search" type="text"
        class="w-full rounded border px-4 py-2 text-left focus:outline-none" placeholder="Search Players" />
    <div x-show="open" class="mt-2">
        <div class="grid grid-cols-1 gap-4 p-4 text-gray-900 dark:text-gray-100 md:grid-cols-3">
            @foreach ($players as $player)
                <label for="{{ $player->id }}" class="block">
                    <input type="checkbox" value="{{ $player->id }}" id="{{ $player->id }}" name="player_id[]"
                        wire:model.live="selectedOptions.{{ $player->id }}"
                        wire:click.live="toggleCheckbox('{{ addslashes($player->name) }}', {{ $player->id }})">
                    <span>{{ $player->name }}</span>
                </label>
            @endforeach
        </div>
    </div>

</div>
