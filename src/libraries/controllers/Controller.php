<?php

namespace Controllers;

abstract class Controller
{
    protected mixed $model;
    protected string $modelName;

    public function __construct()
    {
        $this->model = new $this->modelName();
    }
}