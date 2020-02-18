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
        $this->templateAdmin('views/viewAdministration.php',$info,$title);
    }
    public function articleManagement()
    {
        $title = 'Gestion articles';
        $articles = $this->_articleManager->getAllArticles();
        $this->templateAdmin('views/viewArticleManagement.php',$articles,$title);
    }
    public function userManagement()
    {
        $title = 'Gestion utilisateurs';
        $users = $this->_userManager->getAllUsers();
        $this->templateAdmin('views/viewUserManagement.php',$users,$title);
    }

    public function commentManagement()
    {
        $title = 'Gestion commentaires';
        $comment = $this->_commentManager->getAllComments();
        $this->templateAdmin('views/viewcommentManagement.php',$comment,$title);
    }

    public function newArticle($title = null, $content = null)
    {
        $title = 'Nouveau Article';
        $this->templateAdmin('views/viewNewArticle.php',null,$title);        
    }
    public function createArticle($title, $content)
    {
        $this->_articleManager->addArticle($title,$content);
        echo 'l\'article est bien créé';
    }
    public function editArticle($id)
    {
        $article = $this->_articleManager->getArticleById($id);
        $title = 'edition';
        $this->templateAdmin('views/viewEditArticle.php',$article,$title);
    }

    public function majArticle($title,$content,$id)
    {
        $this->_articleManager->editArticle($title,$content,$id);
    }

    public function deleteArticle($id)
    {
        $this->_articleManager->dellArticle($id);
        // echo liste article
    }
}