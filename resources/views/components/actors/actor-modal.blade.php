@props(['image'])

<div x-data="actorModal">
    {{-- The Activator --}}
    <img
        {{ $attributes->merge(['class' => ' w-64 md:w-96 hover:opacity-75 transition ease-in-out duration-150 rounded cursor-pointer ']) }}src="https://image.tmdb.org/t/p/w500{{ $image }}"
        alt="Actor Image"
        @click="open()"
        @click.outside="close()"
    >

    {{-- The Backdrop --}}
    <div
        x-show=" isModalOpen "
        class="fixed inset-0 backdrop-blur-sm z-40"
        style="display: none"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="close()"
    ></div>

    {{-- The Modal --}}
    <div
        x-show=" isModalOpen "
        style="display: none"
        class="w-1/4 h-auto fixed inset-0 m-auto flex items-center justify-center flex-col z-50 rounded-xl cursor-pointer"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
    >

        <div class="w-auto h-auto m-auto">
            <img class="w-auto rounded-2xl h-auto" src="https://image.tmdb.org/t/p/original{{ $image }}" alt="Image">
        </div >

    </div >

</div >

