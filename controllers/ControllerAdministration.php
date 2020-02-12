<?php

class ControllerAdministration extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function administrationAccueil()
    {
        $tabCommentWarning = [];
        $warnings = $this->_warningManager->getAllWarning();
        foreach($warnings as $warning){
            $tabCommentWarning[] = $this->_commentManager->getCommentById($warning->getCommentaire());
        }
        $nbArticles = $this->_articleManager->countArticle();
        $nbComments = $this->_commentManager->countComment();
        $nbWarning = $this->_warningManager->countWarning();
        $info = ['articleNb' => $nbArticles,'commentNb' =>$nbComments,'warningNb' => $nbWarning,'commentWarning'=>$tabCommentWarning];
        $title ='Administration';
        $_SESSION['lastPage'] = ROOT.'/Administration/administrationAccueil';
        $this->templateAdmin('views/viewAdministration.php',$info,$title);
    }
    public function articleManagement()
    {
        $_SESSION['lastPage'] = ROOT.'/Administration/articleManagement';
        $title = 'Gestion article';
        $articles = $this->_articleManager->getAllArticles();
        $this->templateAdmin('views/viewArticleManagement.php',$articles,$title);
    }
    public function userManagement()
    {
        $_SESSION['lastPage'] = ROOT.'/Administration/userManagement';
        $title = 'Gestion article';
        $users = $this->_userManager->getAllUsers();
        $this->templateAdmin('views/viewUserManagement.php',$users,$title);
    }

    public function newArticle()
    {
        $title = 'Nouveau Article';
        $this->templateAdmin('views/viewNewArticle.php',null,$title);
    }

    public function editArticle($info)
    {
        $article = $this->_articleManager->getArticleById($info['id']);
        $title = 'edition';
        $this->templateAdmin('views/viewEditArticle.php',$article,$title);
    }
}