<?php

namespace App\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Models\Movie;

class MovieRepository implements MovieRepositoryInterface
{
    public function all($perPage = 10): LengthAwarePaginator
    {
        return Movie::paginate($perPage);
    }


    public function create(array $data)
    {
        return Movie::create($data);
    }

    public function find(int $id)
    {
        return Movie::findOrFail($id);
    }

    public function update(int $id, array $data)
    {
        $movie = Movie::findOrFail($id);
        $movie->update($data);
        return $movie;
    }

    public function delete(int $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();
    }
}
