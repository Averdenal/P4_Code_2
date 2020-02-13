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
        $this->_commentManager->dellComment((int) $info['id']);
        $_SESSION['msg_info'] = "Commentaire est supprimé";
        header("location:".$_SESSION['lastPage']);
    }
    
    public function warningComment($info)
    {
        $this->_warningManager->addWarning($info['idComment']);
        $article = $this->_articleManager->getArticleById($info['idArticle']);
        $_SESSION['msg_info'] = "Commentaire signalé";
        header("location:".$_SESSION['lastPage']);
    }

}