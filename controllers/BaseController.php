<?php

class BaseController
{

    public function template($view,$tab = null,$titlePage = null)
    {
        $titlePage = TITLESITE.' - '.$titlePage;
        ob_start();
        include($view);
        $content = ob_get_clean();
        require_once('views/template.php');
    }
}