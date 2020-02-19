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
    public function viewArticleManager()
    {
        $title = 'Gestion articles';
        $articles = $this->_articleManager->getAllArticles();
        echo $this->viewConstruct('views/viewArticleManagement.php',$articles,$title);
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
        $title = 'edition';
        $article = $this->_articleManager->addArticle($title,$content);
        echo $this->viewConstruct('views/viewEditArticle.php',$article,$title);
    }
    public function editArticle($id)
    {
        $article = $this->_articleManager->getArticleById($id);
        $title = 'edition';
        $this->templateAdmin('views/viewEditArticle.php',$article,$title);
    }

    public function majArticle($id, $title,$content)
    {
        $this->_articleManager->editArticle($id,$title,$content);
        $article = $this->_articleManager->getArticleById($id);
        $title = 'edition';
        echo $this->viewConstruct('views/viewEditArticle.php',$article,$title);
    }

    public function deleteArticle($id)
    {
        $this->_articleManager->dellArticle($id);
        echo $this->viewArticleManager();
    }
}