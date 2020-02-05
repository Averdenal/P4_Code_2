<?php 

spl_autoload_register(function($class){
    if(file_exists('controllers/'.$class.'.php'))
    {
        require_once('controllers/'.$class.'.php');
    }
    elseif(file_exists('models/'.$class.'.php'))
    {
        require_once('models/'.$class.'.php');
    }
    elseif(file_exists('models/exceptions/'.$class.'.php'))
    {
        require_once('models/exceptions/'.$class.'.php');
    };
});
global $env;
$env = Environement::get();
require_once('_config.php');
require_once('Router.php');
$router = new Router();
$router->findRoute($_SERVER['REQUEST_URI']);
