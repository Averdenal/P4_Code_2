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

    public function newArticle()
    {
        $info = $_POST;
        $this->_articleManager->addArticle($info['title'],$info['content']);
    }
    
    public function editArticle()
    {
        $info = $_POST;
        $this->_articleManager->editArticle($info['title'],$info['content'],$info['id']);
        $_SESSION['msg_info'] = "l'article '".$info['title']."' est bien modifier";
        header('location: '.$_SESSION['lastPage']);
    }
    public function deleteArticle($info)
    {
        $this->_articleManager->dellArticle($info['id']);
        $_SESSION['msg_info'] = "l'article est bien supprimé";
        header('location: '.$_SESSION['lastPage']);
        
    }
}