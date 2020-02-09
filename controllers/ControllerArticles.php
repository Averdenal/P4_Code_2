<?php

class ControllerArticles extends BaseController
{
    function __construct()
    {
        $this->manager = new ArticleManager();
        $this->comments = new CommentManager();
        $this->userManager = new UserManager();
    }

    public function getArticleBySlug($slug)
    {
        $slug = $slug['slug'];
        $tab = [];

        $tab['article'] = $this->manager->getArticleBySlug($slug);
        $tab['comments'] = $this->comments->getCommentsByArticle($tab['article']->getId());
        $tab['isConnect'] = $this->userManager->isConnect();

        $titlePage = $tab['article']->getTitle();
        
        $this->template('views/viewArticle.php',$tab,$titlePage);
    }
}