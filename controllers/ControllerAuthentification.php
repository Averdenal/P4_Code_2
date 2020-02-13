<?php
class ControllerAuthentification extends BaseController
{

    function __construct()
    {
        parent::__construct();
    }

    public function loginVerif($info)
    {
        $this->_userManager->checkLoginPassword($info['login'],$info['pwd']);
        header("location:".$_SESSION['lastPage']);
    }
    public function logout()
    {
        session_destroy();
        header("location:".ROOT);
    }
}