@props(['title' => 'A Movie Section'])


<div {{ $attributes->merge(['class' => " "]) }}>
    <h2 class="uppercase tracking-wider text-orange-400 text-lg font-semibold">{{ $title }}</h2 >
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
        {{ $slot }}
    </div >
</div >

