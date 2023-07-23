<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\Movie;




class MovieControllerTest extends TestCase
{
    use DatabaseTransactions;


    const API_MOVIES_URL = '/api/movies/';
    const SAMPLE_MOVIE_DATA = [
        'title' => 'Sample Movie 4',
        'description' => 'This is the fourth sample movie description.',
        'writer' => 'Sample Writer 4',
        'image' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/1LRLLWGvs5sZdTzuMqLEahb88Pc.jpg',
        'date' => '2023-09-18',
    ];

    public function testIndex()
    {
        // Create 5 movies in the database
        $movies = Movie::factory(5)->create();

        // Create separate arrays for each link
        $prevLink = [
            "url" => null,
            "label" => "&laquo; Previous",
            "active" => false
        ];

        $currentLink = [
            "url" => "http://localhost/api/movies?page=1",
            "label" => "1",
            "active" => true
        ];

        $nextLink = [
            "url" => null,
            "label" => "Next &raquo;",
            "active" => false
        ];

        // Combine the separate arrays into a single array
        $links = [$prevLink, $currentLink, $nextLink];

        // Assuming $movies is the collection of movies you created for the test
        $response = $this->get(self::API_MOVIES_URL);

        // Assert that the response has a successful status code
        $response->assertStatus(200);

        // Assert that the response contains the expected data
        $response->assertJson([
            "current_page" => 1,
            "data" => $movies->toArray(),
            "first_page_url" => "http://localhost/api/movies?page=1",
            "from" => 1,
            "last_page" => 1,
            "last_page_url" => "http://localhost/api/movies?page=1",
            "links" =>$links,
            "next_page_url" => null,
            "path" => "http://localhost/api/movies",
            "per_page" => 10,
            "prev_page_url" => null,
            "to" => 5,
            "total" => 5
        ]);
    }

    public function testStore()
    {
        // Create a movie in the database
        $movie = Movie::factory()->create();

        // Simulate a PUT request to the update endpoint
        $response = $this->put(self::API_MOVIES_URL . $movie->id, self::SAMPLE_MOVIE_DATA);

        // Assert that the response has a successful status code
        $response->assertStatus(200);

        // Assert that the response contains the expected data
        $response->assertJson(self::SAMPLE_MOVIE_DATA);
    }

    public function testShow()
    {
        // Create a new movie in the database
        $movie = Movie::factory()->create();

        // Simulate a GET request to the show endpoint with the movie ID
        $response = $this->get(self::API_MOVIES_URL . $movie->id);

        // Assert that the response has a successful status code
        $response->assertStatus(200);

        // Assert that the response contains the expected data
        $response->assertJson($movie->toArray());
    }

    public function testUpdate()
    {
        // Create a new movie in the database
        $movie = Movie::factory()->create();
        // Simulate a PUT request to the update endpoint with the movie ID
        $response = $this->put(self::API_MOVIES_URL . $movie->id, self::SAMPLE_MOVIE_DATA);

        // Assert that the response has a successful status code
        $response->assertStatus(200);

        // Assert that the response contains the expected data
        $response->assertJson(self::SAMPLE_MOVIE_DATA);
    }

    public function testDestroy()
    {
        // Create a new movie in the database
        $movie = Movie::factory()->create();

        // Simulate a DELETE request to the destroy endpoint with the movie ID
        $response = $this->delete('/api/movies/' . $movie->id);

        // Assert that the response has a successful status code
        $response->assertStatus(200);

        // Assert that the movie was deleted from the database
        $this->assertDatabaseMissing('movies', ['id' => $movie->id]);
    }
}
