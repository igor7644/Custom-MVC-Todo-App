<?php

$router->get('home', 'TasksController@index');
$router->post('tasks', 'TasksController@store');
