<?php

class User{
    public $id;
    public $firstname;
    public $lastname;
    public $login;
    public $rang;
    private $password;
    public $email;
    
    public function getPwd()
    {
        return $this->password;
    }
    public function getLogin()
    {
        return $this->login;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getRang()
    {
        return $this->rang;
    }
    public function getLastname()
    {
        return $this->lastname;
    }
    public function getFirstname()
    {
        return $this->firstname;
    }
    public function getEmail()
    {
        return $this->email;
    }
}