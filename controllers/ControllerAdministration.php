<?php

class ControllerAdministration extends BaseController
{
    private $_commentManager;
    private $_articleManager;
    private $_warningManager;
    private $_userManager;
    public function __construct()
    {
        $this->_articleManager = new ArticleManager();
        $this->_commentManager = new CommentManager();
        $this->_warningManager = new WarningManager();
        $this->_userManager = new UserManager();
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
    public function deleteComment($id)
    {
        $this->_commentManager->dellComment((int) $id);
        echo json_encode($this->_commentManager->getAllComments());
    }

    public function newArticle()
    {
        $title = 'Nouveau Article';
        $this->templateAdmin('views/viewNewArticle.php',null,$title);        
    }
    public function createArticle($title, $content)
    {
        $article = $this->_articleManager->addArticle($title,$content);
        echo $article->getId();
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
        echo json_encode($article);

    }

    public function deleteArticle($id)
    {
        $this->_articleManager->dellArticle($id);
        $articles = $this->_articleManager->getAllArticles();
        echo json_encode($articles);
    }

    public function deleteWarning($id)
    {
        $this->_warningManager->deleteWarningByComment($id);
    }
}