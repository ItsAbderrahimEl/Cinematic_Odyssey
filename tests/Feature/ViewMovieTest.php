<?php

namespace Tests\Feature;

use App\Http\Controllers\MoviesController;
use Tests\TestCase;

class ViewMovieTest extends TestCase
{

    public function test_that_the_api_return_arrays_for_the_queries(): void
    {
        foreach ($this->ApiUrl() as $url)
        {
            $this->assertIsArray($this->ApiUrlData($url));
        }
    }


    public function test_that_the_needed_fields_exist_for_the_index_page(): void
    {
        $fields = ['title', 'genre_ids', 'release_date', 'vote_average', 'poster_path'];
        foreach ($this->ApiUrl() as $url)
        {
            $data = $this->ApiUrlData($url)[ 0 ];

            foreach ($fields as $field)
            {
                $this->assertArrayHasKey($field, $data, "The field '{$field}' is missing in the data.");
            }
        }
    }

    private function ApiUrl(): array
    {
        return [
            'https://api.themoviedb.org/3/movie/popular',
            'https://api.themoviedb.org/3/movie/now_playing',
        ];
    }

    private function ApiUrlData($uri): array
    {
        return MoviesController::get_data($uri)[ 'results' ];
    }
}
