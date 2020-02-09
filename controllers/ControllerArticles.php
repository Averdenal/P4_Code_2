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
}