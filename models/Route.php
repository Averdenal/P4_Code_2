<?php

class Route{
    public $method;
    public $name;
    public $route;
    public $controller;
    public $action;
    public $param;

    public function __construct($route)
    {
        $this->method = $route->method;
        $this->name = $route->name;
        $this->route = $route->route;
        $this->controller = $route->controller;
        $this->action = $route->action;
        $this->param= $route->param;
    }
}