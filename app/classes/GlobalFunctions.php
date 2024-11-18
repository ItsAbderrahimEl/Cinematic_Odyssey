<?php

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

function get_data($uri, $keys = [])
{
    $keys_pass = array_merge($keys, [
        'api_key' => config('services.tmdb.token'),
    ]);

    return Http::get($uri, $keys_pass)->json();
}

function genres(): Collection
{
    $genres = array_merge(
        get_data('https://api.themoviedb.org/3/genre/movie/list')[ 'genres' ],
        get_data('https://api.themoviedb.org/3/genre/tv/list')[ 'genres' ]
    );

    return collect($genres)->mapWithKeys(fn($item) => [$item[ 'id' ] => $item[ 'name' ]]);
}

function unsetFields(array &$data, array $fields): void
{
    foreach ($fields as $field)
    {
        unset($data[ $field ]);
    }
}

function FilterElements(array &$LArray, array &$FArray, array $elementsToUnset, $callable): void
{
    $LArray = array_filter(
        array_map(function ($element) use ($elementsToUnset, $callable, $FArray)
        {
            unsetFields($element, $elementsToUnset);

            return $callable($element) ? NULL : $element;
        }, $FArray)
    );
}

function parse_date($date): string
{
    return Carbon::parse($date)->format('M d, Y');
}

function swapArrayKeys(array &$array, string $oldKey, string $newKey): void
{
    $array[ $newKey ] = $array[ $oldKey ];
    unset($array[ $oldKey ]);
}

function renameArrayKey(array &$array, string $oldKey, string $newKey): void
{
    if(!array_key_exists($oldKey, $array))
    {
        return;
    }

    swapArrayKeys($array, $oldKey, $newKey);
}

