<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Repositories\MovieRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MovieController extends Controller
{
    private $movieRepository;

    public function __construct(MovieRepositoryInterface $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    public function index()
    {
        try {
            return $this->movieRepository->all(10);
        } catch (\Exception $e) {
            return response()->json(['message' => trans('messages.fetch_movies_failed')], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function store(StoreMovieRequest $request)
    {
        try {
            return $this->movieRepository->create($request->all());
        } catch (\Exception $e) {
            dd($e);
            return response()->json(['message' => trans('messages.create_movie_failed')], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show($id)
    {
        try {
            return $this->movieRepository->find($id);
        } catch (\Exception $e) {
            return response()->json(['message' => trans('messages.movie_not_found')], Response::HTTP_NOT_FOUND);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            return $this->movieRepository->update($id, $request->all());
        } catch (\Exception $e) {
            return response()->json(['message' => trans('messages.update_movie_failed')], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy($id)
    {
        try {
            $this->movieRepository->delete($id);
            return response()->json(['message' => trans('messages.delete_movie_success')], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['message' => trans('messages.delete_movie_failed')], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
