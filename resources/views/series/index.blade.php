<x-layouts.main >
    <div class="container mx-auto px-4 py-16 space-y-24">

        <livewire:search-series />

        {{-- Section Popular Movies --}}
        <x-movies_series.element-section title="Popular Tv Shows">
            @foreach($series['popularSeries'] as $show)
                <x-movies_series.element
                    href="{{ route('series.show', $show['id']) }}"
                    :element="$show"
                />
            @endforeach
        </x-movies_series.element-section >

        {{-- Section Top Rated --}}
        <x-movies_series.element-section title="Top Rated">
            @foreach($series['topRatedSeries'] as $show)
                <x-movies_series.element
                    href="{{ route('series.show', $show['id']) }}"
                    :element="$show"
                />
            @endforeach
        </x-movies_series.element-section >
    </div >
</x-layouts.main >

