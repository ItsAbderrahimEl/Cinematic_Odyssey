<x-layouts.main >
    {{-- The actors details and pictues --}}
    <div class="p-10 w-full flex flex-row gap-x-5 justify-between">
        <x-main.return-button />
        <img
            class="w-1/4 mt-5 h-auto rounded-md"
            src="https://image.tmdb.org/t/p/original{{ $actor['profile_path'] }}"
            alt="Actor Image"
        >
        <div class="w-2/3 mt-8 flex flex-col gap-y-10">
            <h1 class="font-bold text-4xl ">{{ $actor['name'] }}</h1 >
            <div class="flex flex-col gap-y-3">
                <p class="text-md text-gray-300">{{ $actor['biography'] }}</p >
                <div class="space-x-5">
                    <span class="text-gray-300"><span class="text-md text-orange-400">Birthday: </span >{{ $actor['birthday'] }}</span >
                    <span class="text-gray-300 "><span class="text-md text-orange-400">Place of birth: </span >{{ $actor['place_of_birth'] }}</span >
                </div >
                @auth
                    <span class="w-fit">
                        <livewire:love-button :element_id="$actor['id']" type="actor" />
                    </span>
                @endauth
            </div >
        </div >
    </div >

    {{-- The actors movies --}}
    <x-movies_series.element-section class="mt-10 border-none" title="Actor Movies">
        @foreach($movies as $movie)
            <x-movies_series.element
                href="{{ route('movies.show', $movie['id']) }}"
                :element="$movie"
            />
        @endforeach
    </x-movies_series.element-section >

</x-layouts.main >
