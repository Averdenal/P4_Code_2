<?php

class ControllerAdministration extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function administrationAccueil()
    {
        $this->template('views/viewAdministration.php');
    }
    public function articleManagement()
    {
        $title = 'Gestion article';
        $articles = $this->_articleManager->getAllArticles();
        $this->template('views/viewArticleManagement.php',$articles,$title);
    }
    public function userManagement()
    {
        $title = 'Gestion article';
        $users = $this->_userManager->getAllUsers();
        $this->template('views/viewUserManagement.php',$users,$title);
    }

    public function newArticle()
    {
        $title = 'Nouveau Article';
        $this->template('views/viewNewArticle.php',null,$title);
    }

    public function EditArticle($id)
    {
        $article = $this->_articleManager->getArticleById($id);
    }
    public function deleteArticle($info)
    {
        $this->_articleManager->dellArticle($info['id']);
        $this->articleManagement();
        
    }
}