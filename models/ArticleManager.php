<?php

class ArticleManager extends Model
{
    private $userManager;

    function __construct()
    {
        $this->userManager = new UserManager();
    }

    function getAllArticles()
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('SELECT articles.id, articles.title, articles.content, articles.date, articles.onligne, articles.slug, articles.autor, users.lastname, users.firstname
        FROM articles
        JOIN users
        ON articles.autor = users.id');
        $req->execute();
        return $req->fetchAll(PDO::FETCH_CLASS,'Article');
    }

    function getArticleBySlug(string $slug)
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('SELECT articles.id, articles.title, articles.content, articles.date, articles.onligne, articles.slug, articles.autor, users.lastname, users.firstname
        FROM articles
        JOIN users
        ON articles.autor = users.id
        WHERE slug = :slug');
        $req->bindParam(':slug',$slug,PDO::PARAM_STR);
        $req->execute();
        return $req->fetchObject('Article');
    }

    function getArticleById(int $id)
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('SELECT articles.id, articles.title, articles.content, articles.date, articles.onligne, articles.slug, articles.autor, users.lastname, users.firstname
        FROM articles
        JOIN users
        ON articles.autor = users.id
        WHERE articles.id = :id');
        $req->bindParam(':id',$id,PDO::PARAM_INT);
        $req->execute();
        return $req->fetchObject('Article');
    }

    function dellArticle(int $id)
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('DELETE FROM articles WHERE id = :id');
        $req->bindParam(':id',$id,PDO::PARAM_INT);
        $req->execute();
    }

    function editArticle(string $title, string $content, int $id, int $idAutor){
        $slug = $this->createSlug($title);
        $bdd = $this->getBdd();
        $req = $bdd->prepare('UPDATE articles
        set title = :title ,
        content = :content ,
        autor = :autor,
        slug = :slug
        WHERE id = :id');
        $req->bindParam(':id',$id,PDO::PARAM_INT);
        $req->bindParam(':title',$title,PDO::PARAM_STR);
        $req->bindParam(':content',$content,PDO::PARAM_STR);
        $req->bindParam(':autor',$idAutor,PDO::PARAM_INT);
        $req->bindParam(':slug',$slug,PDO::PARAM_STR);
        $req->execute();
    }

    function createArticle(string $title, string $content){
        $date = date('Y-m-d H:i:s');
        $autor = $this->userManager->getUserConnecte();
        $onligne = 1;
        $slug = $this->createSlug($title);

        $bdd = $this->getBdd();
        $req = $bdd->prepare("INSERT INTO `articles` (`id`, `title`, `content`, `date`, `slug`, `onligne`, `autor`) 
        VALUES (NULL, :title, :content, :dateNow, :slug, :onligne, :autor)");
        $req->bindParam(':title',$title,PDO::PARAM_STR);
        $req->bindParam(':content',$content,PDO::PARAM_STR);
        $req->bindParam(':dateNow',$date);
        $req->bindParam(':slug',$slug,PDO::PARAM_STR);
        $req->bindParam(':onligne',$onligne,PDO::PARAM_INT);
        $req->bindParam(':autor',$autor,PDO::PARAM_INT);
        $req->execute();
    }
    
    function createSlug($title){
        $i = 0;
        $slug = $title;
        $slug = str_replace(' ', '-',trim($slug));
        while($this->getArticleBySlug($slug)){
            $slug = $slug.'-'.strval($i);
            $i++;
        }
            return $slug;      
    }

    function shortText($content){
        $maxChar = 150;
        if(strlen($content) > $maxChar){
            return $newContent = substr($content,0,$maxChar).' ...';
        }else{
            return $content;
        }
    }
}