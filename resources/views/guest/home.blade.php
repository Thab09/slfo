<x-guest-layout>
    <x-guest.container class="mt-6 lg:my-12">
        @include('guest._hero-slider')
    </x-guest.container>

    <div class="bg-transparent lg:my-12">
        @include('guest._stats-section')
    </div>

    <div class="lg:my-12">
        @include('guest._team-section')
    </div>
</x-guest-layout>
