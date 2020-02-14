<?php

class BaseController
{
    protected $_commentManager;
    protected $_articleManager;
    protected $_warningManager;
    protected $_userManager;

    public function __construct()
    {
        $this->_commentManager = new CommentManager();
        $this->_articleManager = new ArticleManager();
        $this->_warningManager = new WarningManager();
        $this->_userManager = new UserManager();
    }
    public function template($view,$tab = null,$titlePage = null)
    {
        //$_SESSION['lastPage'] = $_SERVER['REDIRECT_URL'];
        $titlePage = TITLESITE.' - '.$titlePage;
        ob_start();
        include($view);
        extract($tab);
        $content = ob_get_clean();
        unset($_SESSION['msg_info']);
        require_once('views/template.php');
        
    }
    public function templateAdmin($view,$tab = null,$titlePage = null)
    {
        //$_SESSION['lastPage'] = $_SERVER['REDIRECT_URL'];
        $titlePage = TITLESITE.' - '.$titlePage;
        ob_start();
        include($view);
        extract($tab);
        $content = ob_get_clean();
        unset($_SESSION['msg_info']);
        require_once('views/template-admin.php');
    }
}