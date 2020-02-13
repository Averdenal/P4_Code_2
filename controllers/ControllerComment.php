<?php

class ControllerComment extends BaseController
{

    function __construct()
    {
        parent::__construct();
    }

    public function addComment($info)
    {
        $this->_commentManager->addComment($info['content'],$info['article']);
        $article = $this->_articleManager->getArticleById($info['article']);
        $_SESSION['msg_info'] = "Commentaire est bien ajouté";
        header("location:".$_SESSION['lastPage']);
    }

    public function deleteComment($info)
    {
        $this->_commentManager->dellComment($info['id']);
        header("location:".$_SESSION['lastPage']);
    }
    
    public function warningComment($info)
    {
        $this->_warningManager->addWarning($info['idComment']);
        $article = $this->_articleManager->getArticleById($info['idArticle']);
        header("location:".$_SESSION['lastPage']);
    }

}