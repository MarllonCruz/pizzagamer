<?php

namespace App\Repos\Eloquent;

use App\Supports\Notify;

abstract class AbstractRepository 
{   
    /** @var object */
    protected $model;

    /** @var string */
    protected $message;

     /**
     * Constructor
     */
    public function __construct()
    {
        $this->model = $this->resolveModel();
    }

    /**
     * @return object
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     *  @return object
     */
    public function find(int $id)
    {
        return $this->model->find($id);
    }

    /**
     *  @return object
     */
    protected function resolveModel()
    {
        return app($this->model);
    }
    
    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

     /**
     * @return string
     */
    public function getMessage(): string
    {
       return $this->message;
    }
}