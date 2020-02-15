<?php

class ControllerAdministration extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function administrationAccueil()
    {
        $warnings = $this->_commentManager->getCommentWarning();
        $nbArticles = $this->_articleManager->countArticle();
        $nbComments = $this->_commentManager->countComment();
        $nbWarning = $this->_warningManager->countWarning();
        $info = ['articleNb' => $nbArticles,'commentNb' =>$nbComments,'warningNb' => $nbWarning,'commentWarning'=>$warnings];
        $title ='Administration';
        $_SESSION['lastPage'] = ROOT.'/Administration/administrationAccueil';
        $this->templateAdmin('views/viewAdministration.php',$info,$title);
    }
    public function articleManagement()
    {
        $_SESSION['lastPage'] = ROOT.'/Administration/articleManagement';
        $title = 'Gestion articles';
        $articles = $this->_articleManager->getAllArticles();
        $this->templateAdmin('views/viewArticleManagement.php',$articles,$title);
    }
    public function userManagement()
    {
        $_SESSION['lastPage'] = ROOT.'/Administration/userManagement';
        $title = 'Gestion utilisateurs';
        $users = $this->_userManager->getAllUsers();
        $this->templateAdmin('views/viewUserManagement.php',$users,$title);
    }

    public function commentManagement()
    {
        $_SESSION['lastPage'] = ROOT.'/Administration/commentManagement';
        $title = 'Gestion commentaires';
        $comment = $this->_commentManager->getAllComments();
        $this->templateAdmin('views/viewcommentManagement.php',$comment,$title);
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