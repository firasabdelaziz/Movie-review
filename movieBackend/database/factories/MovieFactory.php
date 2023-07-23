<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    protected $model = Movie::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(2),
            'writer' => $this->faker->name(),
            'image' => $this->faker->imageUrl(),
            'date' => $this->faker->date(),
        ];
    }
}
