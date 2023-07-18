<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Repositories\MovieRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class MovieController extends Controller
{
    private $movieRepository;

    public function __construct(MovieRepositoryInterface $movieRepository)
    {
        // Constructor injection to set the MovieRepositoryInterface instance.
        $this->movieRepository = $movieRepository;
    }

    public function index()
    {
        try {
            // Retrieve a list of movies using the injected movie repository.
            // Limiting the results to 10 movies.
            return $this->movieRepository->all(10);
        } catch (\Exception $e) {
            // If an exception occurs during the process, return an error response.
            // HTTP 500 Internal Server Error with a custom error message.
            return response()->json(['message' => trans('messages.fetch_movies_failed')], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function store(StoreMovieRequest $request)
    {
        try {
            return $this->movieRepository->create($request->all());
        } catch (\Exception $e) {
            // Log the error to a log file.
            Log::error('Error creating movie: ' . $e->getMessage());

            // Return an error response to the client.
            return response()->json(['message' => trans('messages.create_movie_failed')], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function show($id)
    {
        try {
            // Retrieve the details of a specific movie by its ID.
            return $this->movieRepository->find($id);
        } catch (\Exception $e) {
            // If the movie with the given ID is not found, return an error response.
            // HTTP 404 Not Found with a custom error message.
            return response()->json(['message' => trans('messages.movie_not_found')], Response::HTTP_NOT_FOUND);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            return $this->movieRepository->update($id, $request->all());
        } catch (\Exception $e) {
            // Log the error to a log file.
            Log::error('Error updating movie: ' . $e->getMessage());

            // Return an error response to the client.
            return response()->json(['message' => trans('messages.update_movie_failed')], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function destroy($id)
    {
        try {
            $this->movieRepository->delete($id);
            // Log a success message.
            Log::info('Movie deleted successfully.');

            // Return a success response.
            return response()->json(['message' => trans('messages.delete_movie_success')], Response::HTTP_OK);
        } catch (\Exception $e) {
            // Log the error to a log file.
            Log::error('Error deleting movie: ' . $e->getMessage());

            // Return an error response to the client.
            return response()->json(['message' => trans('messages.delete_movie_failed')], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
