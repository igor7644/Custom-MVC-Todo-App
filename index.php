<?php

require 'core/bootstrap.php';

$url = trim($_SERVER['REQUEST_URI'], '/');
require Router::load('routes.php')->direct($url);
