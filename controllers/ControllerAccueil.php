<?php

class ControllerAccueil extends BaseController
{
    private $articleManager;
    function __construct()
    {
        $this->articleManager = new ArticleManager();
    }
    public function accueil()
    {
        $articles = $this->articleManager->getAllArticles();
        $titlePage = TITLESITE.' - Accueil';
        $this->template('views/viewAccueil.php',$articles);
    }
}