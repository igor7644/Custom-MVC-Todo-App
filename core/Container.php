<?php

namespace App\Core;


class Container
{
    protected static $items = [];

    public static function bind($key, $value)
    {
        static::$items[$key] = $value;
    }

    public static function get($key)
    {
        if(array_key_exists($key, static::$items))
        {
            return static::$items[$key];
        }

        throw new Exception("No {$key} is bound in the container!");
    }
}