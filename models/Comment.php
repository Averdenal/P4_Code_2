<?php
class Comment
{
    private $id;
    private $content;
    private $date;
    private $user;
    private $article;
    private $lastname;
    private $firstname;

    public function getId(){
        return $this->id;
    }
    public function getContent(){
        return $this->content;
    }

    public function getAutor(){
        return [(int)$this->user,(string)$this->lastname,(string)$this->firstname];
    }
    public function getArticle(){
        return $this->article;
    }
    public function getDate(){
        return $this->date;
    }
}