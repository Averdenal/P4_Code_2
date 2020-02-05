<?php 
class NoRouteFoundException extends Exception
{
    public function __construct(Exception $previous = null)
    {
        parent::__construct('La route n\'existe pas','0010',$previous);
    }

}