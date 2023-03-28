<?php

class App
{
    protected $controller = "HomeController";
    protected $action = "index";

    protected $params = [];


    public function __construct()
    {
        $url = $_SERVER['QUERY_STRING'];
        if (!empty($url)) {
            $url = trim($url, "/");
            $url = explode("/", $url);

            //define the controller
            $this->controller = isset($url[0]) ? ucwords($url[0]) . "controller" : "HomeController";

            //define the action
            $this->action = isset($url[1]) ? $url[1] : "index";
            unset($url[0], $url[1]);

            $this->params = !empty($url) ? array_values($url) : [];

            var_dump($this->params);
        }
    }
}
