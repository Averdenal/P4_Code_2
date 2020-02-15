<?php 

class NoParamFoundException extends Exception
{
    public $param;
    public function __construct($param,Exception $previous = null)
    {
        parent::__construct('La route n\'existe pas','0010',$previous);
        $this->param = $param;
    }

}