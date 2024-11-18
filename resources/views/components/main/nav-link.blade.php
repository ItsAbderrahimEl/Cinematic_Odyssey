@props(['route' => 'main'])

<a
    href="{{ route($route) }}"
    class="{{ request()->routeIs($route) ? 'pb-1.5 border-b-2 border-gray-400 border-opacity-80' : '' }} hover:text-gray-300"
>
    {{ $slot }}
</a >
