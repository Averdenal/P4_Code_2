<?php

class ControllerArticles{
    function __construct()
    {
        $this->manager = new ArticleManager();
        $this->comments = new CommentManager();
        $this->userManager = new UserManager();
    }

    public function getArticleBySlug($slug)
    {
        $slug = $slug['slug'];
        $article = $this->manager->getArticleBySlug($slug);
        $comments = $this->comments->getCommentsByArticle($article->getId());
        $isconnect = $this->userManager->isConnect();
        $titlePage = 'Book - Edition - '.$article->getTitle();
        require_once("views/viewArticle.php");
    }
}