<?php

namespace App\Repos\Eloquent;

abstract class AbstractRepository 
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

    protected function resolveModel()
    {
        return app($this->model);
    }
}