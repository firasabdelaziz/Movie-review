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
        // Static image for use in seeder
        static $image = "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/1LRLLWGvs5sZdTzuMqLEahb88Pc.jpg";

        $movies = [
            [
                'title' => 'Sample Movie 1',
                'description' => 'This is the first sample movie description.',
                'writer' => 'Sample Writer 1',
                'image' => $image,
                'date' => '2023-08-17',
            ],
            [
                'title' => 'Sample Movie 2',
                'description' => 'This is the second sample movie description.',
                'writer' => 'Sample Writer 2',
                'image' => $image,
                'date' => '2023-07-18',
            ],
            [
                'title' => 'Sample Movie 3',
                'description' => 'This is the third sample movie description.',
                'writer' => 'Sample Writer 3',
                'image' => $image,
                'date' => '2023-09-18',
            ],
            [
                'title' => 'Sample Movie 4',
                'description' => 'This is the four sample movie description.',
                'writer' => 'Sample Writer 4',
                'image' => $image,
                'date' => '2023-09-18',
            ],
        ];

        // Loop through the movies and insert them into the database
        foreach ($movies as $movie) {
            Movie::create($movie);
        }
    }

}
