<?php

class ControllerAdministration extends BaseController
{
    private $_commentManager;
    private $_articleManager;
    private $_warningManager;
    private $_userManager;
    private $_rangManager;
    public function __construct()
    {
        $this->_articleManager = new ArticleManager();
        $this->_commentManager = new CommentManager();
        $this->_warningManager = new WarningManager();
        $this->_userManager = new UserManager();
        $this->_rangManager = new RangManager();
    }

    public function administrationAccueil()
    {
        $this->addParam('warnings',$this->_commentManager->getCommentWarning());
        $this->addParam('nbArticles',$this->_articleManager->countArticle());
        $this->addParam('nbComments',$this->_commentManager->countComment());
        $this->addParam('nbWarnings',$this->_warningManager->countWarning());
        $title ='Administration';
        $this->templateAdmin('views/viewAdministration.php',$title);
    }
    public function articleManagement()
    {
        $title = 'Gestion articles';
        $this->addParam('articles',$this->_articleManager->getAllArticles());
        $this->templateAdmin('views/viewArticleManagement.php',$title);
    }

    public function userManagement()
    {
        $title = 'Gestion utilisateurs';
        $this->addParam('users',$this->_userManager->getAllUsers());
        $this->templateAdmin('views/viewUserManagement.php',$title);
    }

    public function commentManagement()
    {
        $title = 'Gestion commentaires';
        $this->addParam('comments',$this->_commentManager->getAllComments());
        $this->templateAdmin('views/viewcommentManagement.php',$title);
    }
    public function deleteComment($id)
    {
        $this->_commentManager->dellComment((int) $id);
        echo json_encode($this->_commentManager->getAllComments());
    }

    public function newArticle()
    {
        $title = 'Nouveau Article';
        $this->templateAdmin('views/viewNewArticle.php',$title);        
    }
    public function createArticle($title, $content)
    {
        $article = $this->_articleManager->addArticle($title,$content);
        echo $article->getId();
    }
    public function editArticle($id)
    {
        $this->addParam('article', $this->_articleManager->getArticleById($id));
        $title = 'edition';
        $this->templateAdmin('views/viewEditArticle.php',$title);
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

    public function deleteUser($id)
    {
        if($id != $_SESSION['auth']){
            $this->_userManager->deleteUser($id);
            echo json_encode($this->_userManager->getAllUsers());
        }else{
            echo "impossible";
        }
        
    }
    public function editUser($id)
    {
        $user = $this->_userManager->getUsersById($id);
        $this->addParam('user', $user);
        $this->addParam('rang',$this->_rangManager->getRangById($user->getRang()));
        var_dump($this->_userManager->getUsersById($id));
        $this->addParam('rangs',$this->_rangManager->getAllRang());
        $title = 'edition';
        $this->templateAdmin('views/viewEditUser.php',$title);
    }
}