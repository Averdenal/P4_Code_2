<?php

class ControllerComment extends BaseController
{

    function __construct()
    {
        parent::__construct();
    }
    public function getCommentByArticle($id)
    {
        $comments = $this->_commentManager->getCommentsByArticle($id);
        return $this->viewConstruct('views/viewListComs.php',$comments,null);
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
}