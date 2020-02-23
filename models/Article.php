<?php 

class Article{
    private $id;
    private $title;
    private $content;
    private $date;
    private $onligne;
    private $slug;
    private $autor;
    private $lastname;
    private $firstname;

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