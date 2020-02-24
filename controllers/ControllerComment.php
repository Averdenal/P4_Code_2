<?php

class ControllerComment extends BaseController
{
    private $_commentManager;

    public function __construct()
    {
        $this->_commentManager = new CommentManager();
    }
    public function getCommentByArticle($id)
    {
        $comments = $this->_commentManager->getCommentsByArticle($id);
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