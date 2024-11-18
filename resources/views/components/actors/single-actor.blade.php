@props([ 'actor'])

<div class="mt-8">
    <x-actors.actor-modal class="rounded-lg" :image="$actor['profile_path']"></x-actors.actor-modal >
    <div class="mt-1">
        <a href="{{ route('actors.show', $actor['id']) }}">
            <span class="transition-colors hover:text-orange-300 ease-in-out duration-200 ">{{ $actor['name'] }}</span >
        </a >
    </div >
</div >

