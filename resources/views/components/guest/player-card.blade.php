@props(['player'])

<div class="flex items-center gap-4 rounded-md p-3 dark:bg-zinc-900/60 sm:p-4">
    <img src="{{ $player->getProfilePicture() }}" alt="" class="h-16 w-16 rounded-md border object-cover">
    <div>
        <p class="font-semibold">{{ $player->ign }}</p>
        <p class="text-xs text-gray-500">{{ $player->name }}</p>
        <p class="mt-1 text-sm text-gray-200">{{ $player->role }}</p>
    </div>
</div>
