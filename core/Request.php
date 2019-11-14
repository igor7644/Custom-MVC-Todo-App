<?php

class Request{

    public static function url()
    {
        return $url = trim($_SERVER['REQUEST_URI'], '/');
    }

}