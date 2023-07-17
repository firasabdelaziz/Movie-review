<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Define sample data for movies
        $movies = [
            [
                'title' => 'Sample Movie 1',
                'description' => 'This is the first sample movie description.',
                'writer' => 'Sample Writer 1',
                'image' => 'https://example.com/sample1.jpg',
                'date' => '2023-07-17',
            ],
            [
                'title' => 'Sample Movie 2',
                'description' => 'This is the second sample movie description.',
                'writer' => 'Sample Writer 2',
                'image' => 'https://example.com/sample2.jpg',
                'date' => '2023-07-18',
            ],
            // Add more movies if needed
        ];

        // Loop through the movies and insert them into the database
        foreach ($movies as $movie) {
            Movie::create($movie);
        }
    }

}
