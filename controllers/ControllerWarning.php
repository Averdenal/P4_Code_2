<?php 

class ControllerWarning extends BaseController
{
    protected $_commentController;
    public function __construct()
    {
        parent::__construct();
        $this->_commentController = new ControllerComment();
        
    }
    public function warningComment($id,$idArticle)
    {
        $this->_warningManager->addWarning($id);
        echo $this->_commentController->getCommentByArticle($idArticle);
    }

    public function deleteWarning($id)
    {
        $this->_warningManager->deleteWarningByComment($id);
    }
}