<?php

namespace App\Core;
use App\Core\Database\Connection;
use App\Core\Database\QueryBuilder;


Container::bind('config', require 'config.php');

Container::bind('database', new QueryBuilder(
    Connection::make(Container::get('config')['database'])
));

