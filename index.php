<?php

use App\Core\{Router,Request};

require 'vendor/autoload.php';
require 'core/bootstrap.php';

Router::load('routes.php')->direct(Request::url(), Request::method());
