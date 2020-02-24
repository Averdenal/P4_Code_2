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
        $this->addParam('comments', $this->getCommentByArticle($article->getId(),$user));
        $this->addParam('userIsConnect',$user[0]);

        $titlePage = $article->getTitle();
        
        $this->template('views/viewArticle.php',$titlePage);
    }

    public function getCommentByArticle($id,$user)
    {
        $comments = $this->_commentManager->getCommentsByArticle($id);
        for($i=0;$i< sizeof($comments);$i++)
        {
            $tabComment[$i]['comment'] = $comments[$i];
            if($comments[$i]->getNbWarning()>0 && $user[0] === true)
            {
                if($this->_warningManager->isWarningByUserConnect($comments[$i]->getId(),$user[1]))
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

    public function addComment($content,$article)
    {
        $this->_commentManager->addComment($content,$article);
    }

    public function deleteComment($id)
    {
        $this->_commentManager->dellComment($id);
    }
}