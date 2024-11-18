@props([ 'actor' => [
    'name' => 'Jon Doe',
    'character' => 'Jon Lie',
    'profile_path' => '/dzJtsLspH5Bf8Tvw7OQC47ETNfJ.jpg'
]])
<div class="mt-8">
    <x-actors.actor-modal :image="$actor['profile_path']" />
    <div class="mt-1">
        <span > {{ $actor['character'] }}</span >

        <a href="{{ route("actors.show", $actor['id']) }}">
            <p class="transition-colors ease-in-out duration-150 hover:text-orange-400">{{ $actor['name'] }}</p >
        </a >
    </div >
</div >

