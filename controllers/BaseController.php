<?php

class BaseController
{

    private $_param;

    public function __construct()
    {
        $this->_param = array();
    }
    public function addParam($key,$value)
    {
        $this->_param[$key] = $value;
    }

    public function viewConstruct($view)
    {   
        ob_start();
        if($this->_param != null){
            extract($this->_param);
        }
        include($view);
        return ob_get_clean();
    }

    public function template($view,$titlePage)
    {
        $titlePage = TITLESITE.' - '.$titlePage;
        $content = $this->viewConstruct($view,$titlePage);
        require_once('views/template.php');
        
    }
    
    public function templateAdmin($view,$titlePage)
    {
        $titlePage = TITLESITE.' - '.$titlePage;
        $content = $this->viewConstruct($view,$titlePage);
        require_once('views/template-admin.php');
    }

}