<x-guest-layout>
    <x-guest.container class="mb-2 mt-2 md:mt-6">
        @if ($team->count())

            <x-guest.header>{{ $team->name }}</x-guest.header>

            @if ($team->players->count())
                <div class="my-6">
                    <p class="text-lg font-bold">Team Players</p>
                    <div class="grid grid-cols-1 gap-4 py-2 lg:grid-cols-2">
                        @foreach ($team->players as $player)
                            <x-guest.player-card :player="$player"></x-guest.player-card>
                        @endforeach
                    </div>
                </div>
            @endif
            @if ($team->achievements->count())
                <div class="my-6">
                    <p class="text-lg font-bold">Team Achievements</p>
                    <div class="flex w-full flex-col gap-4 py-2">
                        @foreach ($team->achievements as $achievement)
                            <x-guest.achievement-card :achievement="$achievement"></x-guest.achievement-card>
                        @endforeach
                    </div>
                </div>
            @endif
        @else
            <div class="w-full bg-zinc-900 p-4">
                <p>Team does not exist.</p>
            </div>
        @endif
    </x-guest.container>
</x-guest-layout>
