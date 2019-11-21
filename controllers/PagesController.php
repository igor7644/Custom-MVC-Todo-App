<?php

namespace App\Controllers;

use App\Core\Container;
use App\Core\Database\QueryBuilder;
use App\Core\Response;

class PagesController{

    public function home()
    {
        $tasks = Container::get('database')->all('tasks');
      //  $response = new Response();
        return Response::view('index', compact('tasks'));
    }

}
