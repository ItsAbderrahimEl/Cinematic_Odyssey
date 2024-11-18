<?php

namespace App\Http\Controllers;

use Cache;
use Illuminate\Contracts\View\View;

class MoviesController extends Controller
{
    protected array $fieldsToUnset = [
        "vote_count", "video", "popularity", "overview",
        "original_title", "original_language", "backdrop_path", "adult"
    ];

    public function index(): View
    {
        $movies = [];
        $endpoints = [
            "popularMovies" => "https://api.themoviedb.org/3/movie/popular",
            "nowPlaying"    => "https://api.themoviedb.org/3/movie/now_playing"
        ];

        if(!Cache::has("movies"))
        {
            foreach ($endpoints as $key => $value)
            {
                $movies[ $key ] = get_data($value)[ "results" ];

                FilterElements($movies[ $key ], $movies[ $key ], $this->fieldsToUnset, [$this, "filterConditions"]);
            }

            Cache::add("movies", $movies);
            Cache::add("genres", genres());
        }

        return view("movies.index", [
            "movies" => Cache::get("movies"),
            "genres" => Cache::get("genres"),
        ]);
    }

    public function show(string $id): View
    {
        $movie = get_data("https://api.themoviedb.org/3/movie/{$id}", [
            "append_to_response" => "credits,videos,images"
        ]);

        $movie[ "release_date" ] = parse_date($movie[ "release_date" ]);

        return view("movies.show", [
            "movie" => $movie,
        ]);
    }

    public function filterConditions($element)
    {
        if($element[ "poster_path" ] === NULL)
        {
            return true;
        }
        return false;
    }
}
