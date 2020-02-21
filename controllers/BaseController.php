<?php

class BaseController
{
    protected $_commentManager;
    protected $_articleManager;
    protected $_warningManager;
    protected $_userManager;
    private $_param;

    public function __construct()
    {
        $this->_commentManager = new CommentManager();
        $this->_articleManager = new ArticleManager();
        $this->_warningManager = new WarningManager();
        $this->_userManager = new UserManager();
        $this->_param = array();
    }
    public function addParam($key,$value)
    {
        $this->_param[$key] = $value;
    }

    public function viewConstruct($view,$tab = null,$titlePage = null)
    {
        $titlePage = TITLESITE.' - '.$titlePage;
        ob_start();
        extract($this->_param);
        include($view);
        return $content = ob_get_clean();
    }

    public function template($view,$tab = null,$titlePage = null)
    {
        $titlePage = TITLESITE.' - '.$titlePage;
        ob_start();
        extract($this->_param);
        include($view);
        $content = ob_get_clean();
        require_once('views/template.php');
        
    }
    
    public function templateAdmin($view,$tab = null,$titlePage = null)
    {
        $titlePage = TITLESITE.' - '.$titlePage;
        ob_start();
        include($view);
        $tab;
        $content = ob_get_clean();
        require_once('views/template-admin.php');
    }

}