<?php

namespace App\Repositories;

abstract class Repository
{

    private $model;
    protected $select = [];

    abstract protected function getModel() : string;

    public function __construct() {
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

    /**
     * Handle dynamic method calls into the model.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call(string $method, $parameters)
    {
        if (is_string($method) && count($parameters)) {
            return $this->getModelClone()->$method($parameters[0]);
        } else if (is_string($method) && !is_array($parameters)) {
            return $this->getModelClone()->$method($parameters);
        } else {
            return $this->getModelClone()->$method();
        }

        return $this->getModelClone()->$method();
    }
}
