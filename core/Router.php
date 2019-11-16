<?php

namespace App\Core;

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
            $arr = explode('@', $this->routes[$requestMethod][$url]);
            $controller = $arr[0];
            $action = $arr[1];
            return $this->callAction($controller, $action);
        }

        throw new Exception("No route defined for {$url} URL!");
    }

    public static function load($file)
    {
        $router = new static;
        require $file;
        return $router;
    }

    protected function callAction($controller, $action)
    {
        $controller = new $controller;

        if(method_exists($controller, $action))
        {
            return $controller->$action();
        }

        throw new Exception("Method {$action} does not exist in {$controller}!");
    }

}