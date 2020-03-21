<?php

class ControllerArticles extends BaseController
{
    private $_articleManager;
    private $_userManager;
    private $_commentManager;
    private $_warningManager;
    function __construct()
    {
        $this->_articleManager = new ArticleManager();
        $this->_userManager = new UserManager();
        $this->_commentManager = new CommentManager();
        $this->_warningManager = new WarningManager();
    }

    public function getArticleBySlug($slug)
    {
        var_dump('demo');
        $article = $this->_articleManager->getArticleBySlug($slug);
        $user = $this->_userManager->verifConnecte();
        var_dump($article->getId());
        $this->addParam('article', $article);
        $this->addParam('comments', $this->getCommentByArticle($article->getId()));
        $this->addParam('userIsConnect',$user['isConnect']);
        var_dump($this->getCommentByArticle($article->getId()));

        $titlePage = $article->getTitle();
        
        $this->template('views/viewArticle.php',$titlePage);
    }

    public function getCommentByArticle($id)
    {
        $user = $this->_userManager->verifConnecte();
        $tabComment = [];
        $comments = $this->_commentManager->getCommentsByArticle($id);
        for($i=0;$i< sizeof($comments);$i++)
        {
            $tabComment[$i]['comment'] = $comments[$i];
            var_dump($user['isConnect']);
            if($user['isConnect'] == true){
                $tabComment[$i]['autorIsConnect'] = $user;
                if($comments[$i]->getNbWarning()>0)
                {
                    if($this->_warningManager->isWarningByUserConnect($comments[$i]->getId(),$user['id']))
                    {
                        $tabComment[$i]['warningByConnect'] = 1;
                    } else{
                        $tabComment[$i]['warningByConnect'] = 0;
                    }
                }else{
                    $tabComment[$i]['warningByConnect'] = 0;
                }
            }
        }
        var_dump($tabComment);
        return $tabComment;
        
    }

    public function addComment($content,$idArticle)
    {
        $this->_commentManager->addComment($content,$idArticle);
        echo json_encode($this->getCommentByArticle($idArticle));
    }

    public function deleteComment($id,$idArticle)
    {
        $comment = $this->_commentManager->getCommentById($id);
        if( $this->_userManager->verifConnecte()['rang'] == 'admin' 
        || $this->_userManager->verifConnecte()['id'] == $comment->getAutor()['id'])
        {
            $this->_commentManager->dellComment($id);
            echo json_encode($this->getCommentByArticle($idArticle));
        }
            
    }

    public function addWarning($id,$idarticle)
    {
        $this->_warningManager->addWarning($id);
        echo json_encode($this->getCommentByArticle($idarticle));
    }
}