<?php

namespace App\Core;
use App\Core\Database\Connection;
use App\Core\Database\QueryBuilder;

$config = require 'config.php';
$database = new QueryBuilder(Connection::make($config['database']));


