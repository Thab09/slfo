<nav x-data="{ open: false }" class="bg-transparent pt-2">
    <!-- Primary Navigation Menu -->
    <x-guest.container>
        <div class="flex h-16 justify-between">
            <div class="flex">
                <!-- Logo -->
                <div class="flex shrink-0 items-center">
                    <a href="/">
                        <p class="font-versal text-xl text-white md:text-3xl">SleepingForest</p>
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:ms-6 sm:items-center md:flex">
                <!-- Navigation Links -->
                <div class="hidden space-x-4 md:-my-px md:ms-2 md:flex lg:ms-4">
                    <x-guest.nav-link :href="route('teams')" :active="request()->routeIs('teams')">
                        Teams
                    </x-guest.nav-link>
                </div>
                <div class="hidden space-x-4 md:-my-px md:ms-2 md:flex lg:ms-4">
                    <x-guest.nav-link :href="route('players')" :active="request()->routeIs('players')">
                        Players
                    </x-guest.nav-link>
                </div>
                <div class="hidden space-x-4 md:-my-px md:ms-2 md:flex lg:ms-4">
                    <x-guest.nav-link :href="route('achievements')" :active="request()->routeIs('achievements')">
                        Achievements
                    </x-guest.nav-link>
                </div>
                <div class="hidden space-x-4 md:-my-px md:ms-2 md:flex lg:ms-4">
                    <x-guest.nav-link href="#" :active="false">
                        Gallery
                    </x-guest.nav-link>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center md:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none dark:text-gray-500 dark:hover:bg-gray-900 dark:hover:text-gray-400 dark:focus:bg-gray-900 dark:focus:text-gray-400">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{ 'block': open, 'hidden': !open }" class="hidden md:hidden">
            <div class="space-y-1 pb-3 pt-2">
                <x-responsive-nav-link :href="route('teams')" :active="request()->routeIs('teams')">
                    Teams
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('players')" :active="request()->routeIs('players')">
                    Players
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('achievements')" :active="request()->routeIs('achievements')">
                    Achievements
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.teamachievements.index')" :active="request()->routeIs('admin.achievements.index')">
                    Gallery
                </x-responsive-nav-link>
            </div>
        </div>
    </x-guest.container>
</nav>
