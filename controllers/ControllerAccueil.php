<?php

class ControllerAccueil extends BaseController
{
    function __construct()
    {
        parent::__construct();
    }
    public function accueil()
    {
        $articles = $this->_articleManager->getAllArticles();
        $titlePage = 'Accueil';
        $this->template('views/viewAccueil.php',$articles,$titlePage);
    }
}