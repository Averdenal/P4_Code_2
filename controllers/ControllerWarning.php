<?php 

class ControllerWarning extends BaseController
{
    private $_warningManager;
    public function __construct()
    {
        $this->_warningManager = new WarningManager();
    }
    
    public function warningComment($id)
    {
        $this->_warningManager->addWarning($id);
    }

}