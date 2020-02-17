<?php

class ControllerComment extends BaseController
{

    function __construct()
    {
        parent::__construct();
    }
    public function getCommentByArticle($id)
    {
        ob_start();
        $comments = $this->_commentManager->getCommentsByArticle($id);
        include('views/viewListComs.php');
        $content = ob_get_clean();
        return $content;
    }
    public function addComment($content,$article)
    {
        $this->_commentManager->addComment($content,$article);
        echo $this->getCommentByArticle($article);
    }

    public function deleteComment($id,$idArticle)
    {
        $this->_commentManager->dellComment((int) $id);
        echo $this->getCommentByArticle($idArticle);
    }
    
    public function warningComment($id)
    {
        $this->_warningManager->addWarning($id);
        echo $this->getCommentByArticle($id);
    }

}