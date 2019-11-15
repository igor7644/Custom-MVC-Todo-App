<?php

class Router{

    public $routes = [
        'GET' => [],
        'POST' => []
    ];

    public function get($url, $controller)
    {
        return $this->routes['GET'][$url] = $controller;
    }

    public function post($url, $controller)
    {
        return $this->routes['POST'][$url] = $controller;
    }

    public function direct($url, $requestMethod)
    {
        if(array_key_exists($url, $this->routes[$requestMethod]))
        {
            return $this->routes[$requestMethod][$url];
        }

        throw new Exception('No route defined for this URL.');
    }

    public static function load($file)
    {
        $router = new static;
        require $file;
        return $router;
    }

}