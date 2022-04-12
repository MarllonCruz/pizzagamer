<?php

namespace App\Repos\Contracts;

use Illuminate\Support\Arr;

interface AbstractRepositoryInterface
{
    public function all();

    public function find(int $id);

    public function create(array $attributes);

    public function update(int $id, array $attributes);

    public function delete(int $id);
}