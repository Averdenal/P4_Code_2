<?php

session_start();
global $env;
require_once('models/Environement.php');
$env = Environement::get();
spl_autoload_register(function($class) use($env){
    foreach($env->listAutoloadFolder as $folder){ 
        if(file_exists($folder.$class.'.php'))
        {
            require_once($folder.$class.'.php');
        break;
        }
    }
});

require_once('_config.php');

$router = new Router();
$router->findRoute($_SERVER['REQUEST_URI']);
