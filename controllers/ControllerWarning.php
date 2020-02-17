<?php 

class ControllerWarning extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function deleteWarning($info)
    {
        $this->_warningManager->deleteWarningByComment($info['id']);
    }
}