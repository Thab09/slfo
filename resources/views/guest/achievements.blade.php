<x-guest-layout>
    <x-guest.container class="mb-2 mt-2 md:mt-6">
        @if ($achievements->count())
            <x-guest.header>Sleeping Forest Achievements</x-guest.header>
            <div class="my-6">
                @if ($achievements->count())
                    <div class="mb-2">
                        <div class="grid grid-cols-1 gap-4">
                            @foreach ($achievements as $achievement)
                                <x-guest.achievement-card :achievement="$achievement"></x-guest.achievement-card>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        @else
            <div class="w-full bg-zinc-900 p-4">
                <p>Achievements does not exist.</p>
            </div>
        @endif
    </x-guest.container>
</x-guest-layout>
