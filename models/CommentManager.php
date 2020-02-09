<?php


class CommentManager extends Model
{
    private $userManager;

    function __construct()
    {
        $this->userManager = new UserManager();
    }

    function getAllComments()
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('SELECT commentaires.id, commentaires.content, commentaires.date, commentaires.user, commentaires.article, users.lastname, users.firstname
        FROM commentaires
        JOIN users
        ON commentaires.user = users.id');
        $req->execute();
        return $req->fetchAll(PDO::FETCH_CLASS,'Comment');
    }

    function getCommentsByArticle($idArticle)
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('SELECT commentaires.id, commentaires.content, commentaires.date, commentaires.user, commentaires.article, users.lastname, users.firstname
        FROM commentaires
        JOIN users
        ON commentaires.user = users.id
        WHERE article = :article');
        $req->bindParam(':article',$idArticle,PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_CLASS,'Comment');
    }

    function dellComment(int $id)
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('DELETE FROM commentaires WHERE id = :id');
        $req->bindParam(':id',$id,PDO::PARAM_INT);
        $req->execute();
    }

    function addComment(string $content, int $idArticle){
        $date = date('Y-m-d H:i:s');
        $autor = $this->userManager->getUserConnecte();
        $bdd = $this->getBdd();
        $req = $bdd->prepare('INSERT INTO `commentaires` (`id`, `content`, `article`, `user`, `date`) 
        VALUES (NULL, :content, :idArticle, :idAutor, :newDate)');
        $req->bindParam(':content',$content,PDO::PARAM_STR);
        $req->bindParam(':idArticle',$idArticle,PDO::PARAM_INT);
        $req->bindParam(':idAutor',$autor,PDO::PARAM_INT);
        $req->bindParam(':newDate',$date);
        $req->execute();
    }

    function editComment(string $content, int $id){
        $bdd = $this->getBdd();
        $req = $bdd->prepare('UPDATE commentaires
        SET content = :content ,
        WHERE id = :id');
        $req->bindParam(':id',$id,PDO::PARAM_INT);
        $req->bindParam(':content',$content,PDO::PARAM_STR);
        $req->execute();
        //modifier le slug 
    }

    function getCommentById($id){
        $bdd = $this->getBdd();
        $req = $bdd->prepare('SELECT commentaires.id, commentaires.content, commentaires.date, commentaires.user, commentaires.article, users.lastname, users.firstname
        FROM commentaires
        JOIN users
        ON commentaires.user = users.id
        WHERE commentaires.id = :id');
        $req->bindParam(':id',$id,PDO::PARAM_INT);
        $req->execute();
        return $req->fetchObject('Comment');
    }   
}