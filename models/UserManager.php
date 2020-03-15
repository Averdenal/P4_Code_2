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
    function searchUserByEMail($email)
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare("SELECT * FROM users WHERE email = :email");
        $req->bindParam(':email',$email,PDO::PARAM_STR);
        $req->execute();
        return $req->fetchObject('User');
    }

    function bddAddUser($firstname,$lastname,$login,$email,$pwd,$rang){
        
        $pwd = $this->convPwd($pwd);
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
            if(password_verify($password,$user->getPwd())){
                $_SESSION['auth'] = $user->getId();
                $rang = $this->getRang($user->getRang());
                $_SESSION['rang'] = $rang->getName();
                return [true,$user];
            }else{
                return [false];
            }
        }
    }

    function getUserConnecte(){
        return (int) $_SESSION['auth'];
    }

    function getRang($id){
            $bdd = $this->getBdd();
            $req = $bdd->prepare('SELECT id, name FROM rangs WHERE id = :id');
            $req->bindParam(':id',$id,PDO::PARAM_INT);
            $req->execute();
            return $req->fetchObject('rang');
        
    }

    function verifConnecte(){
        if(isset($_SESSION['auth'])&&isset($_SESSION['rang'])){
            $auth = $_SESSION['auth'];
            $rang = $_SESSION['rang'];
            return ['isConnect' => true, 'id' => $auth, 'rang' => $rang];
        }else{
            return ['isConnect' => false];
        }
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
    function getUsersById($id)
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('SELECT users.id, users.lastname, users.firstname, users.login, users.email,users.rang
        FROM users
        WHERE users.id = :id');
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetchObject('User');
    }

    public function deleteUser($id)
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('DELETE FROM users WHERE id = :id');
        $req->bindParam(':id',$id,PDO::PARAM_INT);
        $req->execute();
    }
    public function convPwd($pwd){
        return password_hash($pwd,PASSWORD_BCRYPT);
    }
}