<?php
class ControllerAuthentification extends BaseController
{
    public function login()
    {
        echo 'salut';
    }
    public function loginverif($login,$pwd)
    {
        echo 'login'.$login;
    }
}