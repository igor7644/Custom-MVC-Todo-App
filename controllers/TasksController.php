<?php

namespace App\Controllers;

use App\Core\Container;
use App\Core\Database\QueryBuilder;
use App\Core\Response;

class TasksController{

    public function index()
    {
        $tasks = Container::get('database')->all('tasks');
        return Response::view('index', compact('tasks'));
    }

    public function store()
    {
        Container::get('database')->create('tasks', [
            'title' => $_POST['task'],
            'complited' => false
        ]);

        redirect('home');
    }

}
