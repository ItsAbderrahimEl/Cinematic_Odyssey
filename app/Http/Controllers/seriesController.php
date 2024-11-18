<?php

namespace App\Http\Controllers;

use Cache;

class seriesController extends Controller
{
    private array $fieldsToUnset = [
        'adult', 'backdrop_path', 'origin_country', 'original_language',
        'original_name', 'overview', 'popularity', 'vote_count'
    ];

    public function index()
    {
        $series = [];
        $endpoints = [
            'popularSeries'  => 'https://api.themoviedb.org/3/trending/tv/day',
            'topRatedSeries' => 'https://api.themoviedb.org/3/tv/top_rated'
        ];

        if(!Cache::has('series'))
        {
            foreach ($endpoints as $key => $url)
            {
                $series[ $key ] = get_data($url)[ 'results' ];

                FilterElements($series[ $key ], $series[ $key ], $this->fieldsToUnset, [$this, 'filterConditions']);
            }

            Cache::add('series', $series);
            Cache::add('genres', genres());
        }

        return view('series.index', [
            "series" => Cache::get('series'),
            "genres" => Cache::get('genres'),
        ]);
    }

    public function show(string $id)
    {
        $series = get_data("https://api.themoviedb.org/3/tv/{$id}", [
            'append_to_response' => 'credits,videos,images'
        ]);

        $series[ "last_air_date" ] = parse_date($series[ "last_air_date" ]);

        return view('series.show', [
            'series' => $series,
        ]);
    }

    public function filterConditions($series): bool
    {
        if($series[ 'poster_path' ] === "")
        {
            return true;
        }
        return false;
    }
}
