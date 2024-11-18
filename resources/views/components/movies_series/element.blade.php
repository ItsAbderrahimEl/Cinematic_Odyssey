@props([
    'element',
    'href' => '#'
])
@php
    $genres = Cache::rememberForever('genres', fn() => genres());
@endphp
<div class="mt-8">
    <a href="{{ $href }}">
        <img
            class="w-64 md:w-96 hover:opacity-75 transition ease-in-out duration-150 rounded-xl"
            src="https://image.tmdb.org/t/p/w500/{{ $element['poster_path'] }}"
            alt="Image"
        >

        <div class="mt-1">
            <span class="text-lg hover:text-gray-300 font-semibold inline-block mb-0.5"> {{ $element["title"] ?? $element['name'] }} </span >
            <x-movies_series.element-details :element="$element" />
        </div >
    </a >
</div >
