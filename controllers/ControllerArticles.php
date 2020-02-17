<?php

class ControllerArticles extends BaseController
{
    private $_controllerComments;
    function __construct()
    {
        parent::__construct();
        $this->_controllerComments = new ControllerComment();

    }

    public function getArticleBySlug($slug)
    {
        $tab = [];
        $tab['article'] = $this->_articleManager->getArticleBySlug($slug);
        $tab['comments'] = $this->_controllerComments->getCommentByArticle($tab['article']->getId()); //html
        $tab['isConnect'] = $this->_userManager->isConnect();

        $titlePage = $tab['article']->getTitle();
        
        $this->template('views/viewArticle.php',$tab,$titlePage);
    }
}