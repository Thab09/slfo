<x-guest.container class="py-12">
    <div class="flex flex-col justify-between md:flex-row md:gap-8">
        <p class="mb-4 text-4xl font-bold text-teal-400 md:mb-0">BEYOND LIMITS</p>
        <div class="md:w-2/4 md:pl-4">
            <p>
                SleepingForest excels in Mobile Legends Bang Bang, featuring a powerhouse of over 60 active players
                spread across six adept teams, contributing to our success in the esports landscape.
            </p>
            <a href="route('admin.teams.index')"
                class="flex items-center justify-start gap-2 py-4 text-sm font-semibold text-teal-400 md:py-2">
                All Teams
                <x-feathericon-arrow-right class="h-4 w-4" />
            </a>
        </div>
    </div>
    <div class="mt-8 grid grid-cols-1 gap-8 sm:grid-cols-2">
        @foreach ($teams as $team)
            <a class="group flex h-40 w-full flex-col items-center justify-center overflow-hidden rounded-md bg-transparent shadow-sm grayscale transition hover:shadow-lg hover:grayscale-0"
                href="#">
                <img class="h-40 w-full object-cover opacity-60 transition-transform duration-500 ease-in-out hover:opacity-100 group-hover:scale-105"
                    src="/images/splashart/{{ $team->id }}.webp" alt="Image Description">
                <h3
                    class="absolute bottom-0 px-2 py-6 text-center font-versal text-xl font-bold uppercase text-gray-800 dark:text-white md:py-8">
                    {{ $team->name }}
                </h3>
            </a>
        @endforeach
    </div>
</x-guest.container>
