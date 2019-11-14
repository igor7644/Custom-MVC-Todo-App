<?php

require 'core/bootstrap.php';

$router = new Router();
require 'routes.php';

$url = trim($_SERVER['REQUEST_URI'], '/');
//var_dump($url);
require $router->direct($url);

