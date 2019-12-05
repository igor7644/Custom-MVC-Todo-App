<?php

namespace App\Core;

class Response
{

    public static function view($name, $data = [])
    {
        extract($data);
        return require ("views/$name.view.php");
    }

    public static function json($data = [], $statusCode)
    {
        header('Content-Type: application/json');
        http_response_code($statusCode);
        echo json_encode([
            'data'      => $data,
            'status'    => $statusCode
        ]);
    }

}