<?php

class Router{

    protected $routes = [];

    public function define($routes)
    {
        $this->routes = $routes;
    }

    public function direct($url)
    {
        if(array_key_exists($url, $this->routes))
        {
            return $this->routes[$url];
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