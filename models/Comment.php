<?php

class Comment
{
    public $id;
    public $content;
    public $date;
    public $user;
    public $article;
    public $lastname;
    public $firstname;
    private $nbWarning;

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
    public function getNbWarning(){
        return $this->nbWarning;
    }
}