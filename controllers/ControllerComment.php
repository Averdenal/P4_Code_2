<?php

class ControllerComment
{
    private $_commentManager;
    function __construct()
    {
        $this->_commentManager = new CommentManager();
    }

    public function addComment($info)
    {
        $this->_commentManager->addComment($info['content'],$info['article']);
    }
}