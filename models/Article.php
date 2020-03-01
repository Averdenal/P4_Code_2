<?php 

class Article{
    public $id;
    public $title;
    public $content;
    public $date;
    private $onligne;
    public $slug;
    private $autor;
    public $lastname;
    public $firstname;

    public function getTitle(){
        return $this->title;
    }
    public function getContent(){
        return $this->content;
    }
    public function getDate(){
        return $this->date;
    }
    public function getAutor(){
        return (int) $this->autor;
    }
    public function getOnLigne(){
        if($this->onligne === 0){
            return false;
        }else{
            return true;
        }
    }
    public function getId(){
        return $this->id;
    }
    public function getSlug(){
        return $this->slug;
    }
    public function getFirstName(){
        return $this->firstname;
    }
    public function getLastName(){
        return $this->lastname;
    }
    public function getLitleContent()
    {
        $articleManager = new ArticleManager();
        return $articleManager->shortText($this->content,150);
    }
}