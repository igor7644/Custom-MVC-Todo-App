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
            return $this->routeWithoutParams($url, $requestMethod);
        }

        return $this->routeWithParams($url, $requestMethod);
    }

    public static function load($file)
    {
        $router = new static;
        require $file;
        return $router;
    }

    protected function callAction($controller, $action, $params=[])
    {
        $controller = "App\\Controllers\\{$controller}";
        $controller = new $controller;

        if(method_exists($controller, $action))
        {
            return $controller->$action($params);
        }

        throw new Exception("Method {$action} does not exist in {$controller}!");
    }

    private function routeWithoutParams($url, $requestMethod)
    {
        $controllerAction = explode('@', $this->routes[$requestMethod][$url]);
        $controller = $controllerAction[0];
        $action = $controllerAction[1];
        return $this->callAction($controller, $action);
    }

    private function routeWithParams($url, $requestMethod)
    {
        foreach($this->routes[$requestMethod] as $key => $controllerAction)
        {
            $pattern = "@^".preg_replace('/{([a-zA-Z0-9]+)}/', '(?<$1>[a-zA-Z0-9\_\-]+)', $key)."$@";
            preg_match($pattern, $url, $matches);
            array_shift($matches);
            if($matches)
            {
                $params = $matches;
                $getAction = explode('@', $controllerAction);
                $controller = $getAction[0];
                $action = $getAction[1];
                return $this->callAction($controller, $action, $params);
            }
        }
    }

}