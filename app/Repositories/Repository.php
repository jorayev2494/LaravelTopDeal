<?php

namespace App\Repositories;

abstract class Repository
{

    private $model;
    protected $select = [];

    abstract protected function getModel() : string;

    private function __construct() {
        $this->model = app($this->getModel());
    }

    public function getModelClone()
    {
        return clone $this->model;
    }    

    public function getSelect() : array
    {
        if (!count($this->select)) $this->select = ["*"];
        return $this->select;
    }

    public function setSelect(array $params) : void
    {
        $this->select = $params;
    }
}
