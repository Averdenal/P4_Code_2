<?php

class BaseController
{
    public $httpRequest;
    public $param;

    public function __construct(HttpRequest $httpRequest)
    {
        $this->httpRequest = $httpRequest;
        $this->param = [];
    }

    public function addParam($key, $value)
    {
        $this->param[$key] = $value;
    }
    public function view($template)
    {
        # mise en mémoire temp (ob_start)
        # extract param
        # include de la vue
    }
}