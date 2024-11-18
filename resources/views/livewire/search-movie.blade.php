<div class="flex items-center">
    <div x-data="searchMovie" class="relative w-full flex flex-row items-center justify-center">
        <div class="relative w-2/3">
            <input
                type="text"
                id="searchForMovie"
                x-ref="searchForMovie"
                @blur="inBlur($event)"
                @focus="inFocus"
                @keydown.window="keydown($event)"
                @input="inInput"
                x-model.throttle.10ms="searchValue"
                wire:model.live.debounce.600ms="search"
                class="w-full text-center inline-block px-10 py-4 text-sm bg-gray-800 rounded-2xl focus:outline-none focus:ring-2 focus:ring-gray-600 "
                :placeholder="placeholder"
            >
            {{-- The loading div --}}
            <div wire:loading class=" absolute top-1/2 right-5 animate-spin w-5 opacity-50 h-1 bg-gray-500"></div >
        </div >
        <div
            id="movieSection"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90"
            @mousedown.prevent
            style="display: none"
            class="absolute  bg-gray-800 w-large_md z-10 text-sm rounded max-h-96 top-custom left-4/3 overflow-scroll "
            x-show="isOpen"
        >
            <ul >
                @forelse($movies as $movie)
                    <li class="rounded-md @if($loop->first) mt-5 @endif @if($loop->last) mb-10 @endif p-1.5 hover:text-gray-300 text-gray-200 border-opacity-50 ">
                        <div class="flex gap-x-3 items-center h-20">
                            <img
                                class="rounded w-20 h-24"
                                src="https://image.tmdb.org/t/p/original/{{ $movie['poster_path'] }}"
                                alt="movie"
                            >
                            <a href="{{ route('movies.show', $movie['id']) }}">{{ $movie['title'] }}</a >
                        </div >
                    </li >
                    @if(!$loop->last)
                        <div class="bg-gray-500 w-full rounded mx-auto h-0.5 my-5 opacity-50"></div >
                    @endif
                @empty
                    @if($searchFull)
                        <div class="p-3">No movies with that name, sorry</div >
                    @endif
                @endforelse
            </ul >
        </div >
    </div >
</div >

