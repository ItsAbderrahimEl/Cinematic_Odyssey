<x-layouts.main >
    <div class="container mx-auto px-4 py-16 space-y-24">

        {{-- Search Field --}}
        <livewire:search-movie />
        {{-- Section Now Playing --}}
        <x-movies_series.element-section title="Now Playing">
            @foreach($movies['nowPlaying'] as $movie)
                <x-movies_series.element
                    href="{{ route('movies.show', $movie['id']) }}"
                    :element="$movie"
                />
            @endforeach
        </x-movies_series.element-section >

        {{-- Section Popular Movies --}}
        <x-movies_series.element-section title="Popular Movies">
            @foreach($movies['popularMovies'] as $movie)
                <x-movies_series.element
                    href="{{ route('movies.show', $movie['id']) }}"
                    :element="$movie"
                />
            @endforeach
        </x-movies_series.element-section >

    </div >
</x-layouts.main >
