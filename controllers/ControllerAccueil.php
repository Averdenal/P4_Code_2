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
        $titlePage = 'Book - Accueil';
        require_once('views/viewAccueil.php');
    }
}