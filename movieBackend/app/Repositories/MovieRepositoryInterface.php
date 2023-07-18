<?php

namespace App\Repositories;

/**
 * Interface MovieRepositoryInterface
 * This interface defines the contract for interacting with movie data.
 * It serves as an abstraction for the data access layer, allowing the application
 * to interact with movies without being tightly coupled to specific implementation details.
 */
interface MovieRepositoryInterface
{
    /**
     * Retrieve all movies.
     *
     * @return \Illuminate\Support\Collection A collection containing all movies.
     */
    public function all();

    /**
     * Create a new movie.
     *
     * @param array $data The data for creating the movie.
     * @return mixed The result of the movie creation operation.
     */
    public function create(array $data);

    /**
     * Find a movie by its ID.
     *
     * @param int $id The ID of the movie to find.
     * @return \Illuminate\Database\Eloquent\Model The found movie instance.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException if the movie is not found.
     */
    public function find(int $id);

    /**
     * Update a movie by its ID.
     *
     * @param int $id The ID of the movie to update.
     * @param array $data The data for updating the movie.
     * @return \Illuminate\Database\Eloquent\Model The updated movie instance.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException if the movie is not found.
     */
    public function update(int $id, array $data);

    /**
     * Delete a movie by its ID.
     *
     * @param int $id The ID of the movie to delete.
     * @return void
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException if the movie is not found.
     */
    public function delete(int $id);
}
