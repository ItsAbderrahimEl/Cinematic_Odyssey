<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;


class SearchSeries extends Component
{
    public $search = "";
    public $series;
    public $searchFull = false;
    private array $fieldsToUnset = [
        'original_language', 'original_language', 'origin_country', 'original_name', 'overview', 'first_air_date', 'vote_count', 'vote_average', 'popularity', 'genre_ids', 'adult'
    ];

    public function render(): View
    {
        $this->searchFull = $this->searchFull();

        $this->series = get_data('https://api.themoviedb.org/3/search/tv', [
            'query' => $this->search
        ])[ 'results' ];

        FilterElements($this->series, $this->series, $this->fieldsToUnset, [$this, 'filterConditions']);

        return view('livewire.search-series');
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
