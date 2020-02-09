<?php

class ControllerComment
{
    private $_commentManager;
    private $_articleManager;
    function __construct()
    {
        $this->_commentManager = new CommentManager();
        $this->_articleManager = new ArticleManager();
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
        header('Refresh:2;url='.ROOT.'/Article/'.$article->getSlug());
        echo '<h3>le commentaire est supprimé</h3>';
    }
    public function warningComment($info)
    {
        $this->_commentManager->addWarning($info['idComment']);
        $article = $this->_articleManager->getArticleById($info['idArticle']);
        header('location:'.ROOT.'/Article/'.$article->getSlug());
    }

}