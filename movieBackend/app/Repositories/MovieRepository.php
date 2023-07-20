<?php

namespace App\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Models\Movie;

class MovieRepository implements MovieRepositoryInterface
{
    /**
     * Retrieve all movies paginated.
     *
     * @param int $perPage The number of movies to display per page.
     * @return LengthAwarePaginator Paginated collection of movies.
     */
    public function all($perPage = 10): LengthAwarePaginator
    {
        // Use the Movie model to paginate all movies.
        return Movie::query()->fastPaginate($perPage);
    }

    /**
     * Create a new movie.
     *
     * @param array $data The data for creating the movie.
     * @return Movie The newly created movie instance.
     */
    public function create(array $data)
    {
        // Use the Movie model to create a new movie with the provided data.
        return Movie::create($data);
    }

    /**
     * Find a movie by its ID.
     *
     * @param int $id The ID of the movie to find.
     * @return Movie The found movie instance.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException if the movie is not found.
     */
    public function find(int $id)
    {
        // Use the Movie model to find a movie by its ID.
        // If the movie is not found, a ModelNotFoundException will be thrown.
        return Movie::findOrFail($id);
    }

    /**
     * Update a movie by its ID.
     *
     * @param int $id The ID of the movie to update.
     * @param array $data The data for updating the movie.
     * @return Movie The updated movie instance.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException if the movie is not found.
     */
    public function update(int $id, array $data)
    {
        // Find the movie by its ID.
        $movie = Movie::findOrFail($id);
        // Update the movie with the provided data.
        $movie->update($data);
        // Return the updated movie instance.
        return $movie;
    }

    /**
     * Delete a movie by its ID.
     *
     * @param int $id The ID of the movie to delete.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException if the movie is not found.
     */
    public function delete(int $id)
    {
        // Find the movie by its ID.
        $movie = Movie::findOrFail($id);
        // Delete the movie from the database.
        $movie->delete();
    }
}
