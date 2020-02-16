<?php

class HttpRequest
{
    public $url;
    public $route;
    public $param;

    public function __construct($url,$listRoute){
       
        $this->url = $url;
        $this->getRoute($listRoute);
        if($this->route->param != null){
            $this->getParam();
        }
        
    }

    public function getRoute($listRoute)
    {
        global $env;
        $url = str_replace($env->basepath,'',$this->url);
        $matchRoute = array_filter($listRoute,function($cel) use($url){
            return preg_match("#^".$cel->route."$#s",$url) && $_SERVER['REQUEST_METHOD'] == $cel->method;
        });
        if(count($matchRoute) != 1){
            throw new NoRouteFoundException();
        }else{
            $this->route = array_shift($matchRoute);
        }
    }
    public function getParam()
    {
        global $env;
        switch($this->route->method){
            case 'GET':
            case 'DELETE':
                $url = str_replace($env->basepath,'',$this->url);
                preg_match_all("#^".$this->route->route."$#s",$url,$tab);
                if(!empty($tab)){
                    for($i = 0; $i<count($this->route->param);$i++){
                        $this->param[] = $tab[$i+1][0];
                    }
                }else{
                    throw new NoParamFoundException($this->route->param);
                }
               
            break;
            case 'POST':
            case 'PUT':
                foreach($this->route->param as $param){
                    if(!empty($_POST[$param])){
                        $this->param[] = $_POST[$param];
                    }else{
                        throw new NoParamFoundException($param);
                    }
                }
            break;
        }
    }
}