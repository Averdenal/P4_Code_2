<?php
class Warning
{
    private $id;
    private $content;
    private $date;
    private $user;
    private $commentaire;

    public function getId(){
        return $this->id;
    }
    public function getContent(){
        return $this->content;
    }
    public function getDate(){
        return $this->date;
    }
    public function getUser(){
        return $this->user;
    }
    public function getCommentaire(){
        return $this->commentaire;
    }
   
}