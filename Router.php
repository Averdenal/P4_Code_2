<?php

class Router
{
    public $listRoute = [];
    public $_matches = [];

    public function __construct()
    {   
        $jsons = json_decode(file_get_contents('routing.json'));
        foreach($jsons as $json){
            $this->listRoute[] = new Route($json); 
        }
    }

    public function findRoute($url)
    {
        global $env;
        $url = str_replace($env->basepath,'',$url);
        $matchRoute = array_filter($this->listRoute,function($cel) use($url){
            if($cel->param != ''){
                switch($_SERVER['REQUEST_METHOD']){
                    case 'GET':
                    $path = preg_replace('#{[a-z]+}#','([a-zA-Z0-9\-]+)',$cel->route);
                    if(preg_match("#^$path$#",$url,$matches)){
                        $cel->route = $matches[0];
                        unset($matches[0]);
                        $paramRoute = explode(',',$cel->param);

                        foreach ($matches as $match){
                            $tabMatches[] = $match;
                        }
                        //creation tab param key => value
                        for($i=0; $i<sizeof($paramRoute);$i++){
                            $this->_matches[$paramRoute[$i]] = $tabMatches[$i];
                        }
                        
                    };
                break;
                case 'POST':
                    $this->_matches = $_POST;
                break;
                }
            }
            return $cel->route == $url && $_SERVER['REQUEST_METHOD'] == $cel->method;
        });
        var_dump($matchRoute);
        foreach ($matchRoute as $match){
            $route = new Route($match);
        }
        if(count($matchRoute) != 1){
            throw new NoRouteFoundException();
        }else{
            
            $controller = new $route->controller();
            if(empty($this->_matches)){
                $controller->{$route->action}();
            }else{
                $controller->{$route->action}($this->_matches);
            }
            
        }
    }
}