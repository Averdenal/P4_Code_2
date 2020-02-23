<?php

class ControllerAccueil extends BaseController
{
    private $_articleManager;
    function __construct()
    {
        $this->_articleManager = new ArticleManager;
    }
    public function accueil()
    {
        $this->addParam('listArticle',$this->_articleManager->getAllArticles());
        $titlePage = 'Accueil';
        $this->template('views/viewAccueil.php',$titlePage);
    }
}