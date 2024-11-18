@props(['image'])

<div x-data="imageModal">
    {{-- Activator --}}
    <div
        @click="open()" @click.outside="close()" class="cursor-pointer"
    >
        <img data-aos="fade-zoom-in" class="" src="https://image.tmdb.org/t/p/w500{{ $image }}" alt="Image">
    </div >

    {{-- Modal --}}
    <div
        x-show=" isModalOpen "
        style="display: none"
        class="md:w-3/4 md:h-4/5 fixed inset-0 m-auto flex items-center justify-center flex-col z-50 rounded-xl
        w-96 h-4/3 cursor-pointer"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
    >

        <div class="relative w-full p-2 h-full m-auto">
            <img class="w-full rounded-xl h-full" src="https://image.tmdb.org/t/p/original{{ $image }}" alt="Image">
        </div >

    </div >

    {{-- backdrop --}}
    <div
        x-show="isModalOpen"
        style="display: none"
        class="fixed inset-0 backdrop-blur-sm z-40"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
    ></div >
</div >
