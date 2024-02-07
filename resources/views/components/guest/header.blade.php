<div class="mx-auto w-full rounded-md bg-white px-4 py-2 shadow-xl dark:bg-zinc-900/60">
    <div class="mx-auto max-w-5xl">

        <!-- Component starts here -->
        <h2 class="my-8 flex flex-row flex-nowrap items-center">
            <span class="block flex-grow border-t-2 border-black dark:border-white" aria-hidden="true"
                role="presentation"></span>
            <span
                class="block flex-none px-4 py-2.5 font-versal text-lg font-semibold uppercase leading-none text-gray-800 dark:text-white sm:text-2xl md:text-4xl">
                {{ $slot }}
            </span>
            <span class="block flex-grow border-t-2 border-black dark:border-white" aria-hidden="true"
                role="presentation"></span>
        </h2>
        <!-- Component ends here -->

    </div>
</div>
