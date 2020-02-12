<?php

class ControllerArticles extends BaseController
{
    function __construct()
    {
        parent::__construct();
    }

    public function getArticleBySlug($slug)
    {
        $slug = $slug['slug'];
        $tab = [];

        $tab['article'] = $this->_articleManager->getArticleBySlug($slug);
        $tab['comments'] = $this->_commentManager->getCommentsByArticle($tab['article']->getId());
        $tab['isConnect'] = $this->_userManager->isConnect();

        $titlePage = $tab['article']->getTitle();
        
        $this->template('views/viewArticle.php',$tab,$titlePage);
    }

    public function newArticle()
    {
        $info = $_POST;
        $this->_articleManager->addArticle($info['title'],$info['content']);
        header('location: '.$_SESSION['lastPage']);
    }
    public function editArticle()
    {
        $info = $_POST;
        $this->_articleManager->addArticle($info['title'],$info['content']);
        header('location: '.$_SESSION['lastPage']);
    }
    public function deleteArticle($info)
    {
        $this->_articleManager->dellArticle($info['id']);
        header('location: '.$_SESSION['lastPage']);
        
    }
}