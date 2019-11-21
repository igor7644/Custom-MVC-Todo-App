<?php

namespace App\Controllers;

use App\Core\Container;
use App\Core\Database\QueryBuilder;

class PagesController{

    public function home()
    {
        $tasks = Container::get('database')->all('tasks');
        return view('index', compact('tasks'));
    }

}
