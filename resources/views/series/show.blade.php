<x-layouts.main >

    {{-- Start of the Tv Show info section --}}
    <div class="series-info">
        <div class="mx-auto pb-8 md:px-4 md:py-16 flex flex-col md:flex-row items-center justify-center">
            <x-movies_series.element_poster :element="$series['poster_path']" />
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold md:font-bold mt-5 md:mt-0">{{ $series['name'] }}</h2 >
                <div class="mt-1">

                    <div class="flex items-center flex-wrap text-gray-400 gap-x-2 text-sm mt-0.5">
                        <img class="w-4" src="{{ asset('images/half-star.png') }}" alt="Star">
                        <span >{{ round($series['vote_average']) * 10 . "%" }}</span >
                        <span >|</span >
                        <span >{{ $series['last_air_date'] }}</span >
                        <span >|</span >
                        <span >
                                {{ implode(', ', array_column($series['genres'], 'name')) }}
                        </span >
                    </div >

                    <p class="text-grey-300 mt-14">
                        {{ $series['overview'] }}
                    </p >

                    <div class="mt-16">
                        <h2 class="text-white font-semibold">Featured Cast</h2 >
                        <div class="flex flex-col md:flex-row mt-4 gap-x-5">
                            @foreach(array_slice($series['credits']['crew'], 0, 2) as $crew)
                                <div >
                                    <div >{{ $crew['name'] }}</div >
                                    <div class="text-sm text-gray-400">{{ $crew['job'] }}</div >
                                </div >
                            @endforeach
                        </div >
                    </div >
                    <div class="flex gap-x-5">
                        <x-movies_series.element-video-modal :video="end($series['videos']['results'])['key'] ?? ''" />
                        {{-- Add to favorites --}}
                        @auth
                            <livewire:love-button :element_id="$series['id']" type="series" />
                        @endauth
                    </div >
                </div >
            </div >
        </div > {{-- Ends of the Tv Show info section --}}

        {{-- Tv Show Casting --}}
        <div class="series-cast">
            <div class=" mx-auto px-4 py-16">
                <h2 class="text-4xl font-semibold">Cast</h2 >
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-10">
                    @foreach(array_slice($series['credits']['cast'], 0, 5) as $actor)
                        <x-movies_series.element-actor :actor="$actor" />
                    @endforeach
                </div >
            </div >
        </div >{{-- End of the Tv Show Casting Section --}}

        {{-- The Tv Show images Section --}}
        <div class="movie-images border-none">
            <div class=" mx-auto px-8 py-16">
                <h2 class="text-4xl font-semibold mb-10">Series Images</h2 >
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">
                    @foreach(array_slice($series['images']['backdrops'] , 0, 9) as $poster)
                        <x-movies_series.element-image-modal :image="$poster['file_path']" />
                    @endforeach
                </div >
            </div >
        </div >
    </div >{{-- End of the Tv Show images Section --}}
</x-layouts.main >
