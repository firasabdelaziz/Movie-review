<?php

namespace App\Repositories;

interface MovieRepositoryInterface
{
    public function all();

    public function create(array $data);

    public function find(int $id);

    public function update(int $id, array $data);

    public function delete(int $id);
}
