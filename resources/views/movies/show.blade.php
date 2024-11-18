<x-layouts.main >

    {{-- Start of the movie info section --}}
    <div class="movie-info ">

        <div class=" container mx-auto pb-8 md:px-4 md:py-16 flex flex-col md:flex-row items-center justify-center">

            <x-movies_series.element_poster :element="$movie['poster_path']" />
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold md:font-bold mt-5 md:mt-0">{{ $movie['title'] }}</h2 >
                <div class="mt-1">
                    <div class="flex items-center flex-wrap text-gray-400 gap-x-2 text-sm mt-0.5">
                        <img class="w-4" src="{{ asset('images/half-star.png') }}" alt="Movie Star">
                        <span >{{ round($movie['vote_average']) * 10 . "%" }}</span >
                        <span >|</span >
                        <span >{{ $movie['release_date'] }}</span >
                        <span >|</span >
                        <span >
                                {{ implode(', ', array_column($movie['genres'], 'name')) }}
                        </span >
                    </div >
                    <p class="text-grey-300 mt-14"> {{ $movie['overview'] }} </p >
                    <div class="mt-16">
                        <h2 class="text-white font-semibold">Featured Cast</h2 >
                        <div class="flex flex-col md:flex-row mt-4 gap-x-5">
                            @foreach(array_slice($movie['credits']['crew'], 0, 2) as $crew)
                                <div >
                                    <div >{{ $crew['name'] }}</div >
                                    <div class="text-sm text-gray-400">{{ $crew['job'] }}</div >
                                </div >
                            @endforeach
                        </div >
                    </div >
                    <div class="flex  items-center gap-x-5">
                        <x-movies_series.element-video-modal :video="end($movie['videos']['results'])['key'] ?? ''" />

                        {{-- Add to favorites --}}
                        @auth
                            <livewire:love-button :element_id="$movie['id']" type="movies" />
                        @endauth
                    </div >
                </div >
            </div >
        </div > {{-- Ends of the movie info section --}}

        {{-- Movie Casting --}}
        <div class="movie-cast  border-b border-opacity-75 border-gray-800">
            <div class="container mx-auto px-4 py-16">
                <h2 class="text-4xl font-semibold">Cast</h2 >
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-10">
                    @foreach(array_slice($movie['credits']['cast'], 0, 5) as $actor)
                        <x-movies_series.element-actor :actor="$actor" />
                    @endforeach
                </div >
            </div >
        </div >{{-- End of the Movie Casting Section --}}

        {{-- The movie images Section --}}
        <div class="movie-images border-none">
            <div class="container mx-auto px-8 py-16">
                <h2 class="text-4xl font-semibold mb-10">Movie Images</h2 >
                <div  class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">
                    @foreach(array_slice($movie['images']['backdrops'] , 0, 9) as $poster)
                        <x-movies_series.element-image-modal :image="$poster['file_path']" />
                    @endforeach
                </div >
            </div >
        </div > {{-- End of the movie image section --}}

    </div >{{-- End of the movie info Section --}}
</x-layouts.main >
