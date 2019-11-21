<?php

namespace App\Core;

class Response
{

    public static function view($name, $data = [])
    {
        extract($data);
        return require ("views/$name.view.php");
    }

}