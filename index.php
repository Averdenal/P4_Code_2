<?php 
global $env;
require_once('models/Environement.php');
$env = Environement::get();

spl_autoload_register(function($class) use($env){
    foreach($env->folder as $folder){
        if(file_exists($folder.$class.'.php'))
        {
            require_once($folder.$class.'.php');
        }
    }
});

require_once('_config.php');
require_once('Router.php');
$router = new Router();
$router->findRoute($_SERVER['REQUEST_URI']);
