<?php

class ControllerAdministration extends BaseController
{
    private $articlesManager;
    public function __construct()
    {
        $this->articleManager = new ArticleManager();
    }

    public function administrationAccueil()
    {
        $this->template('views/viewAdministration.php');
    }
    public function articleManagement()
    {
        $title = 'Gestion article';
        $articles = $this->articleManager->getAllArticles();
        $this->template('views/viewArticleManagement.php',$articles,$title);
    }   
}