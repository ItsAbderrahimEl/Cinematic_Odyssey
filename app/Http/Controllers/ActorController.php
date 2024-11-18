<?php

namespace App\Http\Controllers;


use Illuminate\View\View;

class ActorController extends Controller
{
    protected array $actor = [];
    protected array $movies = [];
    protected array $elementsToUnset = [
        'original_language', 'original_title', 'popularity', 'video', 'vote_count', 'credit_id', 'order'
    ];


    public function index(): View
    {
        return view('actors.index');
    }

    public function show($id): View
    {
        $this->actor = get_data("https://api.themoviedb.org/3/person/{$id}", [
            'append_to_response' => 'credits',
        ]);

        $this->actor[ 'biography' ] = self::cutTextAtFourthPoint($this->actor[ 'biography' ]);

        FilterElements($this->movies, $this->actor[ 'credits' ][ 'cast' ], $this->elementsToUnset, [$this, 'filterConditions']);

        return view('actors.show', [
            'actor'  => $this->actor,
            'movies' => $this->movies,
            'genres' => genres()
        ]);
    }

    protected static function cutTextAtFourthPoint($text)
    {
        $parts = preg_split('/\./', $text);

        if(count($parts) > 4)
        {
            return implode('.', array_slice($parts, 0, 4)) . '.';
        }
        return $text;
    }

    public function filterConditions($movie): bool
    {
        if(($movie[ 'adult' ] === true) || ($movie[ 'vote_average' ] == 0) || ($movie[ 'poster_path' ] == NULL))
        {
            return true;
        }
        return false;
    }
}
