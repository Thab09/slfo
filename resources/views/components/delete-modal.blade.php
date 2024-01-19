<div x-data="{ 'showModal': false }" @keydown.escape="showModal = false">
    <!-- Trigger for Modal -->
    <div @click="showModal = true">

        <x-danger-button type="button" class="hidden py-2 sm:flex"> Delete</x-danger-button>

        <x-feathericon-trash-2 type="button" class="h-5 w-5 cursor-pointer text-gray-500 sm:hidden" />

    </div>

    <!-- Modal -->
    <div class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-80" x-cloak
        x-show="showModal">
        <!-- Modal inner -->
        <div class="mx-auto max-w-xl rounded-lg bg-white px-8 py-6 text-left shadow-lg dark:bg-gray-800"
            @click.away="showModal = false" x-transition:enter="motion-safe:ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
            {{ $slot }}
        </div>
    </div>
</div>
