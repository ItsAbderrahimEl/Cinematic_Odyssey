@props(['hide' => false])

    <!doctype html>
<html lang="en">
<head >
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title >Cinematic Odyssey</title >
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head >
<body class="font-sans bg-gray-900 text-white {{ !$hide ? 'w-5/6 mx-auto ' : '' }} ">
    {{-- The Header --}}
    <header class="border-b {{ $hide ? 'hidden' : '' }} border-gray-800">
        <nav >
            <div class="container mx-auto flex  items-center justify-between px-4 py-6">
                <ul class="flex items-center flex-row">
                    <li >
                        <a class="flex flex-row items-center" href="{{ route('movies.index') }}">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo">
                            <span class="inline-block ml-3 font-extrabold">Cinematic Odyssey</span >
                        </a >
                    </li >
                    <li class="ml-16">
                        <x-main.nav-link route="movies.index">Movies</x-main.nav-link >
                    </li >
                    <li class="ml-6">
                        <x-main.nav-link route="series.index">Series</x-main.nav-link >
                    </li >
                    <li class="ml-6">
                        <x-main.nav-link route="actors.index">Actors</x-main.nav-link >
                    </li >
                    @auth
                        <li class="ml-6">
                            <x-main.nav-link route="library.favorites">Favorites</x-main.nav-link >
                        </li >
                    @endauth
                </ul >
                <div class="ml-4">
                    @auth
                        <div
                            class="relative" x-data="profile" @click.outside="open = false"
                        >
                            <img
                                class="w-10 h-10 rounded-full cursor-pointer"
                                src="{{ asset('images/avatar.png') }}"
                                alt="Avatar"
                                @click="click()"
                            >
                            <div
                                class="absolute top-14 left-0 w-32 bg-gray-100 text-black rounded shadow-md"
                                x-show="open"
                                x-transition
                                style="display: none"
                            >
                                <ul >

                                    <livewire:profile-form></livewire:profile-form>
                                    <li class="px-4 py-2 rounded hover:bg-gray-200 cursor-pointer">
                                        <a href="{{ route('logout') }}">Logout</a >
                                    </li >
                                </ul >
                            </div >
                        </div >
                    @endauth
                    @guest
                        <a
                            href="{{ route('login') }}"
                            class="bg-gray-800 hover:bg-gray-700 transition-colors ease-in-out duration-200  px-7 py-3 rounded-lg"
                        >
                            Login
                        </a >
                    @endguest
                </div >
            </div >
        </nav >
    </header > {{-- End of the header --}}

    {{ $slot }}

    {{-- The Footer--}}
    <footer class=" {{ $hide ? 'hidden' : '' }} border-t mt-10 border-gray-800 h-28 w-full flex items-center justify-center">
        <div >
            <a
                class=" text-gray-300 font-bold transition duration-200 ease-in-out hover:text-cyan-400 "
                href="mailto:abderahimouriachi@gmail.com"
            > Message The Author</a >
        </div >
    </footer > {{-- End of the Footer--}}
    @livewireScripts
</body >
</html >
