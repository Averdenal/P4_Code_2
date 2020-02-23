<?php

class User{
    private $id;
    private $firstname;
    private $lastname;
    private $login;
    private $rang;
    private $password;
    private $email;
    
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