<?php

class Router
{
    public $listRoute =[];
    public $_matches;
    private $_userManager;

    public function __construct()
    {   
        $this->_userManager = new UserManager();
        $jsons = $this->selectDataRoute();
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
    private function selectDataRoute(){
        if($this->_userManager->isConnect()){
            switch($this->_userManager->getRang((int) $_SESSION['auth'])){
                case 'admin':
                    $routeInfo = 'routingAdmin.json';
                break;
                case 'subscriber':
                    $routeInfo = 'routingSubscriber.json';
                break;
                default:
                    $routeInfo = 'routing.json';
                break;
            }
        }else{
            $routeInfo = 'routing.json';
        }
        return json_decode(file_get_contents($routeInfo));
    }
}