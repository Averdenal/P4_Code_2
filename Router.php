<?php

class Router
{
    public $listRoute =[];
    public $_matches;

    public function __construct()
    {   
        $jsons = json_decode(file_get_contents('routing.json'));
        foreach($jsons as $json){
            $this->listRoute[] = new Route($json); 
        }
    }

    public function findRoute($url)
    {
        $httpResquest = new HttpRequest($url,$this->listRoute);
        $controller = new $httpResquest->route->controller($httpResquest);
        if($httpResquest->param != null){
            $controller->{$httpResquest->route->action}(...$httpResquest->param);//tab key int//
        }else{
            $controller->{$httpResquest->route->action}();
        }
        

    }
}