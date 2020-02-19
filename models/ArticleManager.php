<?php

class ArticleManager extends Model
{
    private $userManager;
    private $_commentManager;

    function __construct()
    {
        $this->userManager = new UserManager();
        $this->_commentManager = new CommentManager();
    }
    public function countArticle()
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('SELECT COUNT(*)  FROM articles' );
        $req->execute();
        return (int) $req->fetch()[0];
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
        if($this->_commentManager->countCommentByArticle($id) > 0){
            $this->_commentManager->deleteAllCommentsByArticle($id);
        }
        $bdd = $this->getBdd();
        $req = $bdd->prepare('DELETE FROM articles WHERE id = :id');
        $req->bindParam(':id',$id,PDO::PARAM_INT);
        $req->execute();
        
    }

    function editArticle($id,$title,$content){
        $slug = $this->createSlug($title);
        $bdd = $this->getBdd();
        $id = (int) $id;
        $req = $bdd->prepare('UPDATE articles
        set title = :title ,
        content = :content ,
        slug = :slug
        WHERE id = :id');
        $req->bindParam(':id',$id,PDO::PARAM_INT);
        $req->bindParam(':title',$title,PDO::PARAM_STR);
        $req->bindParam(':content',$content,PDO::PARAM_STR);
        $req->bindParam(':slug',$slug,PDO::PARAM_STR);
        $req->execute();
        
    }

    function addArticle(string $title, string $content){
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
        return $this->getArticleBySlug($slug);
        
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

    function shortText($content,$maxChar = 450){
        if(strlen($content) > $maxChar){
            return $newContent = substr($content,0,$maxChar).' ...';
        }else{
            return $content;
        }
    }
}