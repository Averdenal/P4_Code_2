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
        $article = $this->_articleManager->getArticleBySlug($slug);
        $user = $this->_userManager->verifConnecte();
        $this->addParam('article', $article);
        $this->addParam('comments', $this->getCommentByArticle($article->getId()));
        $this->addParam('userIsConnect',$user['isConnect']);

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
            if($comments[$i]->getAutor()[0] == $user['id']){
                    
                $tabComment[$i]['autorIsConnect'] = 1;
            }else{
                $tabComment[$i]['autorIsConnect'] = 0;
            }

            if($comments[$i]->getNbWarning()>0 && $user['isConnect'] == true)
            {
                if($this->_warningManager->isWarningByUserConnect($comments[$i]->getId(),$user['id']))
                {
                    $tabComment[$i]['warningByConnect'] = 1;
                }else{
                    $tabComment[$i]['warningByConnect'] = 0;
                }
            }else{
                $tabComment[$i]['warningByConnect'] = 0;
            }
        }
        return $tabComment;
        
    }

    public function addComment($content,$idArticle)
    {
        $this->_commentManager->addComment($content,$idArticle);
        //var_dump($this->getCommentByArticle($idArticle));
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

    public function addWarning($id)
    {
        $this->_warningManager->addWarning($id);
        echo 'OK '.$id;
    }
}