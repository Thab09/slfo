<x-guest-layout>
    <x-guest.container class="mb-2 mt-2 md:mt-6">
        @if ($players->count())
            <x-guest.header>Sleeping Forest Players</x-guest.header>
            <div class="my-6">
                @if ($players->count())
                    <div class="mb-2">
                        <div class="grid grid-cols-1 gap-4 py-2 lg:grid-cols-2">
                            @foreach ($players as $player)
                                <x-guest.player-card :player="$player"></x-guest.player-card>
                            @endforeach
                        </div>
                    </div>
                @endif

                {{ $players->links() }}
            </div>
        @else
            <div class="w-full bg-zinc-900 p-4">
                <p>Team does not exist.</p>
            </div>
        @endif
    </x-guest.container>
</x-guest-layout>
