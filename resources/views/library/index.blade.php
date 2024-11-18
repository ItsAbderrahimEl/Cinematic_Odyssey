<x-layouts.main >
    <div class="container mx-auto px-4 py-16 space-y-24">
        {{-- Favorites Movies --}}
        <x-movies_series.element-section title="Movies">
            @foreach($data['movies'] as $movie)
                <x-movies_series.element
                    href="{{ route('movies.show', $movie['id']) }}"
                    :element="$movie"
                />
            @endforeach
        </x-movies_series.element-section >

        {{-- Section Favorite Series --}}
        <x-movies_series.element-section title="Series">
            @foreach($data['series'] as $show)
                <x-movies_series.element
                    href="{{ route('series.show', $show['id']) }}"
                    :element="$show"
                />
            @endforeach
        </x-movies_series.element-section >

        {{-- Actors Section --}}
        <x-movies_series.element-section class=" p-5 mt-10 mb-10" title="Actors">
            @forelse($data['actors'] as $actor)
                <x-actors.single-actor :actor="$actor" />
            @empty
                <div class=" flex items-center justify-center text-xl text-gray-400">
                    <span >No Actors Found</span >
                </div >
            @endforelse
        </x-movies_series.element-section >
    </div >
</x-layouts.main >
