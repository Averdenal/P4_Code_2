<?php 

class NoParamFoundException extends Exception
{
    public $param;
    public function __construct($param,Exception $previous = null)
    {
        parent::__construct('Error de params','0011',$previous);
        $this->param = $param;
    }

}