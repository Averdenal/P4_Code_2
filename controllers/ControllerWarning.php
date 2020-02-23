<?php 

class ControllerWarning extends BaseController
{
    private $_warningManager;
    public function __construct()
    {
        $this->_warningManager = new WarningManager();
    }
    
    public function warningComment($id,$idArticle)
    {
        $this->_warningManager->addWarning($id);
    }

}