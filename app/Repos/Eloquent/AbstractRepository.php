<?php

namespace App\Repos\Eloquent;

use App\Repos\Contracts\AbstractRepositoryInterface;
use stdClass;

abstract class AbstractRepository implements AbstractRepositoryInterface
{   
    protected $model;

    public function __construct()
    {
        $this->model = $this->resolveModel();
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find(int $id)
    {
        return $this->model->find($id);
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function update(int $id, array $attributes)
    {   
        $model = $this->model->find($id);
        $model->update($attributes);

        return $model;
    }

    public function delete(int $id)
    {
        $model = $this->model->find($id);
        $model->delete();

        return $model;
    }

    protected function resolveModel()
    {
        return app($this->model);
    }
}