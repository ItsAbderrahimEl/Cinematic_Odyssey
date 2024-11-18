<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class PersonalLibraryController extends Controller
{
    private static array $moviesAttributes = [
        'title',
        'id',
        'poster_path',
        'genres',
        'release_date',
        'vote_average'
    ];
    private static array $seriesAttributes = [
        'name',
        'id',
        'poster_path',
        'genres',
        'first_air_date',
        'vote_average'
    ];
    private static array $actorAttributes = [
        'name',
        'profile_path',
        'id'
    ];


    public function index()
    {
        $data = [
            "movies" => $this->getMovies(),
            "series" => $this->getSeries(),
            "actors" => $this->getActors()
        ];

        return view('library.index', compact('data'));
    }

    private function getMovies()
    {
        return $this->getLibrary('movies', 'https://api.themoviedb.org/3/movie/');
    }

    private function getSeries()
    {
        return $this->getLibrary('series', 'https://api.themoviedb.org/3/tv/');
    }
    private function getActors()
    {
        return $this->getLibrary('actor', 'https://api.themoviedb.org/3/person/');
    }

    protected function getLibrary(string $type, string $url)
    {
        $elements_id = self::getElementsId($type);
        $elements = [];
        $attributes = self::${$type . 'Attributes'};

        foreach ($elements_id as $id) {
            $elementData = $this->getKey($url, $id, $attributes);
            $processedElement = $this->processElement($elementData, $type);
            $elements[] = $processedElement;
        }

        return $elements;
    }

    private function processElement(array $elementData, string $type): array
    {
        if($type === 'actor')
        {
            return $elementData;
        }
        swapArrayKeys($elementData, 'genres', 'genre_ids');
        $elementData['genre_ids'] = array_combine(
            array_column($elementData['genre_ids'], 'id'),
            array_column($elementData['genre_ids'], 'name')
        );
        return $elementData;
    }

    private function getElementsId(string $type)
    {
        return Auth::user()->personalLibrary()->where('type', $type)->pluck('element_id')->toArray();
    }

    public function getKey(string $url, int $id, $attributes): mixed
    {
        return array_intersect_key(get_data($url . $id),
            array_flip($attributes));
    }
}
