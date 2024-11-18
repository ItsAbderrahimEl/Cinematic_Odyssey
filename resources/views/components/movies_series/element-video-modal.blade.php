@props(['video'])

<div x-data="videoModal">
    {{-- Activator --}}
    <div
        class="cursor-pointer inline-flex items-center gap-x-2 text-lg font-semibold text-gray-900 bg-orange-500 py-2 px-5 rounded hover:bg-orange-400 transition ease-in-out duration-150 mt-12"
        @click="open()"
        @click.outside="close()"
    >
        <img class="w-6 h-6" src="{{ asset('images/play_icon.png') }}" alt="Play Trailer Icon">
        <span >Play Trailer</span >
    </div >

    {{-- Modal --}}
    <div
        x-show="isModalOpen"
        style="display: none"
        class="w-3/4 h-4/5 shadow-md fixed inset-0 m-auto flex items-center justify-center flex-col bg-gray-700 z-50 rounded-xl"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
    >
        {{-- Modal Header --}}
        <div class="w-full flex justify-between items-center p-4 bg-transparent">
            <h2 class="text-xl font-semibold">Watch Trailer</h2 >
            <button @click="close()" class="text-gray-100 hover:text-gray-300">
                &#10005;
            </button >
        </div >

        <div class="w-full p-5 h-full rounded-lg m-auto">
            <iframe
                id="videoIframe"
                class="w-full h-full rounded-md"
                src="https://youtube.com/embed/{{ $video }}"
                title="Video"
                allowfullscreen
                sandbox="allow-scripts allow-same-origin allow-presentation"
                referrerpolicy="no-referrer"
            ></iframe >
        </div >

    </div >

    {{-- Backdrop --}}
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
