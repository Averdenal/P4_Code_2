<?php
class ControllerAuthentification extends BaseController
{
    private $_userManager;

    function __construct()
    {
        $this->_userManager = new UserManager();
    }

    public function loginVerif($login,$pwd)
    {
        $this->_userManager->checkLoginPassword($login,$pwd);
        header("location:". ROOT);
    }
    public function logout()
    {
        session_destroy();
        header("location:".ROOT);
    }
    public function register($firstname,$lastname,$login,$email,$pwd)
    {
        if(!$this->_userManager->searchUserByLogin($login)){
            if(!$this->_userManager->searchUserByEMail($email)){
                $rang = 2;
                $this->_userManager->bddAddUser($firstname,$lastname,$login,$email,$pwd,$rang);
                echo "Compte créé";
            }else {
                echo "Email existe déjà";
            }
        } else {
            echo "login existe déjà";
        }
        
    }
}