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
<<<<<<< HEAD
        header('location: '.ROOT.'/Article/'.$article->getSlug().'-'.$article->getId());
=======
        header("location:".ROOT."/Article/".$article->getSlug().'-'.$article->getId(),201);
    }
    public function delete($info)
    {
        $this->_commentManager->dellComment($info['id']);
        $article = $this->_articleManager->getArticleById($info['article']);
        header("location:".ROOT."/Article/".$article->getSlug().'-'.$article->getId(),201);
>>>>>>> 7fd046fdadea2b3d4f620e5906338e3e5359dffa
    }

    public function deleteComment($info)
    {
        $this->_commentManager->dellComment($info['idComment']);
        $article = $this->_articleManager->getArticleById($info['idArticle']);
        $message = 'succes';
        header('Refresh:2;url='.ROOT.'/Article/'.$article->getSlug().'-'.$article->getId());
        echo '<h3>le commentaire est supprimé</h3>';
    }

}