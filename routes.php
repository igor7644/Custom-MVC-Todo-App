<?php

$router->get('home', 'TasksController@index');
$router->post('tasks', 'TasksController@store');
$router->post('task/{task}/delete', 'TasksController@delete');

