<div>
    <div class="flex gap-4">
        <x-primary-button wire:click="switchViewType('team')">Team Achievements</x-primary-button>
        <x-primary-button wire:click="switchViewType('player')">Player Achievements</x-primary-button>
    </div>

    <table>
        <thead>
            <tr>
                @if ($viewType == 'team')
                    <th class="text-white">Team Name</th>
                @elseif ($viewType == 'player')
                    <th class="text-white">Player Name</th>
                @endif
                <th class="text-white">Achievement</th>
                <th class="text-white">Year</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($achievements as $achievement)
                <tr>
                    @if ($viewType == 'team')
                        <td class="text-white">{{ $achievement->team->name }}</td>
                    @elseif ($viewType == 'player')
                        <td class="text-white">{{ $achievement->team->name }}</td>
                    @endif
                    <td class="text-white">{{ $achievement->achievement }}</td>
                    <td class="text-white">{{ $achievement->year }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
