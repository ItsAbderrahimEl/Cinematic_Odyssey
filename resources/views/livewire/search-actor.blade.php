<div >
    <div x-data="searchActor" class=" w-2/3 relative m-auto flex flex-row justify-center items-center mt-5 p-5 gap-x-5">
        <input
            wire:model.live.debounce.150ms="actorSearchQuery"
            class="w-1/2 bg-gray-800 rounded-2xl px-5 py-3.5 focus:outline-none focus:ring-2 focus:ring-gray-600"
            id="searchActor"
            x-ref="searchActor"
            type="text"
            @focus="inFocus"
            @blur="inBlur"
            @keydown.window="keydown($event)"
            :placeholder="placeholder"
        >
        <div wire:loading class=" absolute top-11 right-64 animate-spin w-5 opacity-50 h-1 bg-gray-500"></div >
    </div >
    <x-movies_series.element-section class=" p-5 mt-10 mb-10" title="Trending Actors">
        @forelse($actors as $actor)
            <x-actors.single-actor :actor="$actor" />
        @empty
            <div class=" flex items-center justify-center text-xl text-gray-400">
                <span >No Actors Found</span >
            </div >
        @endforelse
    </x-movies_series.element-section >
</div >
