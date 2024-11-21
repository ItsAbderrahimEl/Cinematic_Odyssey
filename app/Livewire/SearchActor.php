<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use Livewire\Component;

class SearchActor extends Component
{
    public string $actorSearchQuery = "";
    public array $actors = []; // The final list of actors
    protected bool $isActorSearchFilled = false;
    protected array $elementsToUnset = ['known_for', 'original_name'];
    protected array $duplicatedActors = [];
    protected array $removedActors = [
        2187317, 1767076, 4012042, 70962, 4171741, 1333252, 3424435, 548128, 1260846, 3793267, 4676098, 3904236, 240615, 3674148,
        3961517, 2553497, 1035908, 4095689, 147590, 1907997, 3165040, 2112856, 2112856, 4845074, 81866, 2590519, 42802, 2049994,
        239507, 1124416, 3164807, 129700, 3371804, 2699056, 2374721, 4095744, 2710789, 1468490, 1974009, 2472212, 2948828, 1875826,
        3878062, 2244859, 3010184, 4103293, 3674045, 3653066, 1306631, 4450888, 1883366, 1814297, 2994385, 2510954, 1997928, 3653070,
        3775928,
    ];


    public function render(): View
    {
        if($this->isActorSearchFilled())
        {
            $this->getActorBySearch();
        } else
        {
            $this->actors();
        }

        // Filter the bad actors and unset the fields that are not needed
        FilterElements($this->actors, $this->actors, $this->elementsToUnset, [$this, 'filterConditions']);

        return view('livewire.search-actor');
    }

    public function getActorBySearch(): void
    {
        $this->actorSearchQuery = htmlspecialchars($this->actorSearchQuery, ENT_QUOTES, 'UTF-8');
        $this->actors = get_data('https://api.themoviedb.org/3/search/person', [
            'query' => $this->actorSearchQuery,
        ])[ 'results' ];
    }

    public function actors(): void
    {
        // Store a copy of all actors at the start for performance optimization
        if(Cache::has('it_has_been_called'))
        {
            $this->actors = Cache::get('duplicatedActors');
            return;
        }

        Cache::put("it_has_been_called", true);
        // Retrieve 10 pages of actors
        $this->getActorsData(5);

        Cache::put("duplicatedActors", $this->actors);
    }

    private function getActorsData($num_pages = 1): void
    {
        for ($i = 1; $i <= $num_pages; $i++)
        {
            $this->actors = array_merge($this->actors,
                get_data('https://api.themoviedb.org/3/person/popular', [
                    'page' => $i,
                ])[ 'results' ]);
        }
    }

    private function isActorSearchFilled(): bool
    {
        return strlen($this->actorSearchQuery) > 0;
    }

    public function filterConditions($actor): bool
    {
        if(
            ($actor[ 'adult' ] === true) ||
            ($actor[ 'profile_path' ] == NULL) ||
            (in_array($actor[ 'id' ], $this->removedActors))
        )
        {
            return true;
        }
        return false;
    }

}
