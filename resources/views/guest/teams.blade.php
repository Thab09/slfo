<x-guest-layout>
    <x-guest.container class="mb-12 mt-6">
        @if ($teams->count())
            <div class="my-8 grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($teams as $team)
                    <a class="flex flex-col justify-between gap-4 overflow-hidden rounded-md bg-zinc-900 p-4 shadow-sm transition hover:shadow-lg hover:ring-2 hover:ring-teal-400"
                        href="{{ route('team', $team) }}">
                        <img class="self-center rounded-md object-cover transition-transform duration-500 ease-in-out group-hover:scale-105"
                            src="{{ $team->getLogo() }}" alt="Image Description">
                        <div class="text-center">
                            <p class="text-sm font-semibold uppercase text-gray-800 dark:text-white">
                                {{ $team->name }}
                            </p>
                            <p class="mt-1 text-sm">{{ $team->players->count() . ' Players' }}</p>
                            @if ($team->achievements->count())
                                <p class="text-sm">{{ $team->achievements->count() . ' Achievements' }}</p>
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <div class="bg-zinc-900 p-4">
                <p>There are no teams.</p>
            </div>
        @endif
    </x-guest.container>
</x-guest-layout>
