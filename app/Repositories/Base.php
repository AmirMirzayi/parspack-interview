<?php

namespace App\Repositories;

abstract class Base
{
    abstract public function model();

    protected $model;
    public function __construct()
    {
        $this->model = app($this->model());
    }

    public function all(){
        return $this->model->get();
    }

    public function withRelation($rel){
        return $this->model->with($rel);
    }

    public function whereHas($rel){
        return $this->model->whereHas($rel);
    }
}
