<?php

class ControllerComment extends BaseController
{

    function __construct()
    {
        parent::__construct();
    }

    public function addComment($content,$article)
    {
        var_dump($content);
        $this->_commentManager->addComment($content,$article);
    }

    public function deleteComment($info)
    {
        $this->_commentManager->dellComment((int) $info['id']);
        $_SESSION['msg_info'] = "Commentaire est supprimé";
        header("location:".$_SESSION['lastPage']);
    }
    
    public function warningComment($info)
    {
        $this->_warningManager->addWarning($info['idComment']);
        $_SESSION['msg_info'] = "Commentaire signalé";
        header("location:".$_SESSION['lastPage']);
    }

}