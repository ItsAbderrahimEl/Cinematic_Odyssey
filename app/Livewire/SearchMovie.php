<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class SearchMovie extends Component
{
    public $search = "";
    public $movies;
    public $searchFull = false;
    private array $fieldsToUnset = [
        'backdrop_path', 'original_language', 'genre_ids',
        'original_title', 'overview', 'vote_count', 'video'
    ];


    public function render(): View
    {
        $this->searchFull = $this->searchFull();

        $this->movies = get_data('https://api.themoviedb.org/3/search/movie', [
            'query' => $this->search
        ])[ 'results' ];

        FilterElements($this->movies, $this->movies, $this->fieldsToUnset, [$this, 'filterConditions']);

        return view('livewire.search-movie');
    }

    public function searchFull(): bool
    {
        return strlen($this->search) > 0;
    }

    public function filterConditions($element): bool
    {
        if($element[ 'poster_path' ] === NULL)
        {
            return true;
        }
        return false;
    }
}
