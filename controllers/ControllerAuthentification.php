<?php
class ControllerAuthentification extends BaseController
{

    function __construct()
    {
        parent::__construct();
    }

    public function loginVerif($login,$pwd)
    {
        $this->_userManager->checkLoginPassword($login,$pwd);
        header("location:".ROOT);
    }
    public function logout()
    {
        session_destroy();
        header("location:".ROOT);
    }
}