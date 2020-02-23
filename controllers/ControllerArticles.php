<?php

class ControllerArticles extends BaseController
{
    private $_articleManager;
    private $_userManager;
    private $_commentManager;
    private $_warningManager;
    function __construct()
    {
        $this->_articleManager = new ArticleManager();
        $this->_userManager = new UserManager();
        $this->_commentManager = new CommentManager();
        $this->_commentManager = new WarningManager();
    }

    public function getArticleBySlug($slug)
    {
        $article = $this->_articleManager->getArticleBySlug($slug);
        $this->addParam('article', $article);
        $this->addParam('comments', $this->getCommentByArticle($article->getId(),$this->_userManager->isConnect()));


        $titlePage = $article->getTitle();
        
        $this->template('views/viewArticle.php',$titlePage);
    }

    public function getCommentByArticle($id,$idUserConnect = null)
    {
        //créer un tableau de commentaire.
    }
}