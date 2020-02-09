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







    public function Edit($id)
    {
        $article = $this->_articleManager->getArticleById($id);
    }
    public function delete($id)
    {
        $this->_articlesManager->dellArticle($id);
    }
}