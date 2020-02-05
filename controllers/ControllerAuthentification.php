<?php
class ControllerAuthentification //extends BaseController
{
    private $_userManager;
    function __construct()
    {
        $this->_userManager = new UserManager();
    }
    public function login()
    {
        echo 'salut';
    }
    public function loginVerif($info)
    {
        $this->_userManager->checkLoginPassword($info['login'],$info['pwd']);
        var_dump($_SESSION['auth']);
        header("location:".ROOT);
    }
    public function logout()
    {
        session_destroy();
        header("location:".ROOT);
    }
}