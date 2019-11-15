<?php

require 'core/bootstrap.php';

require Router::load('routes.php')->direct(Request::url(), Request::method());
