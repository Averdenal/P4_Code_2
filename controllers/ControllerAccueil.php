<?php

class ControllerAccueil
{
    function __construct()
    {
        
    }
    public function accueil()
    {
        $articleManager = new ArticleManager();
        $articles = $articleManager->getAllArticles();
        $titlePage = TITLESITE.' - Accueil';
        require_once('views/viewAccueil.php');
    }
}