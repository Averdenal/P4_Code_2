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
        header('location: '.ROOT.'/Article/'.$article->getSlug());
    }

    public function deleteComment($info)
    {
        $this->_commentManager->dellComment($info['idComment']);
        $article = $this->_articleManager->getArticleById($info['idArticle']);
        $message = 'succes';
        if(empty($_SESSION['lastPage'])){
            header("location:".$_SESSION['lastPage']);
        }else{
            header('Refresh:2;url='.ROOT.'/Article/'.$article->getSlug());
            echo '<h3>le commentaire est supprimé</h3>';
        }
    }
    
    public function warningComment($info)
    {
        $this->_warningManager->addWarning($info['idComment']);
        $article = $this->_articleManager->getArticleById($info['idArticle']);
        header('location:'.ROOT.'/Article/'.$article->getSlug());
    }

}