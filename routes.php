<?php

$router->get('home', 'TasksController@index');
$router->post('task', 'TasksController@store');
$router->post('task/{task}/delete', 'TasksController@delete');
$router->post('task/{task}/update', 'TasksController@complete');

