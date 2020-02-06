<?php

class UserManager extends Model{

    function searchUserByLogin($login)
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare("SELECT * FROM users WHERE login = :login");
        $req->bindParam(':login',$login,PDO::PARAM_STR);
        $req->execute();
        return $req->fetchObject('User');
    }

    function bddAddUser($firstname,$lastname,$login,$email,$pwd,$rang){
        $bdd = $this->getBdd();
        $req = $bdd->prepare("INSERT INTO `users` (`id`, `firstname`, `lastname`, `login`, `password`, `email`, `rang`) 
        VALUES (NULL, :firstname, :lastname, :login, :password, :email, :rang)");
        $req->bindParam(':firstname',$firstname,PDO::PARAM_STR);
        $req->bindParam(':lastname',$lastname,PDO::PARAM_STR);
        $req->bindParam(':login',$login,PDO::PARAM_STR);
        $req->bindParam(':password',$pwd,PDO::PARAM_STR);
        $req->bindParam(':email',$email,PDO::PARAM_STR);
        $req->bindParam(':rang',$rang,PDO::PARAM_INT);
        $req->execute();
    }
    
    function checkLoginPassword($login,$password)
    {
        $user = $this->searchUserByLogin($login);
        if(!$user){
            return [false];
        }else {
            if($user->getPwd() === md5($password)){
                $_SESSION['auth'] = $user->getId();
                $_SESSION['rang'] = $user->getRang();
                return [true,$user];
            }else{
                return [false];
            }
        }
    }

    function getUserConnecte(){
        return (int) $_SESSION['auth'];
    }

    function getRang(){
        $infoUser = $this->verifConnecte();
        if($infoUser[0]){
            $bdd = $this->getBdd();
            $req = $bdd->prepare('SELECT name FROM rangs WHERE id = :id');
            $req->bindParam(':id',$infoUser[2],PDO::PARAM_INT);
            $req->execute();
            return $req->fetch()['name'];
        }else{
            return 'noConnect';
        }
        
    }

    function verifConnecte(){
        if(isset($_SESSION['auth'])&&isset($_SESSION['rang'])){
            $auth = (int) $_SESSION['auth'];
            $rang = (int) $_SESSION['rang'];
            return [true,$auth,$rang];
        }else{
            return [false];
        }
    }

    function isConnect(){
        return (isset($_SESSION['auth'])) ? true : false ;
    }

    function gestionComment($userAutor){
        $user= $this->verifConnecte();
        if($user[0]){
            if($user[1] === $userAutor || $user[2] === 1){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    function isAutorArticle($autor, $article){
        
    }

    function isAutorComment($autor, $comment){

    }
    function pwdOK($pwd,$confirme){
        return ($pwd === $confirme) ? true : false;
    }

    function getAllUsers()
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('SELECT users.id, users.lastname, users.firstname, users.login, users.email, rangs.name
        FROM users
        JOIN rangs
        ON users.rang = rangs.id');
        $req->execute();
        return $req->fetchAll(PDO::FETCH_CLASS,'User');
    }
}