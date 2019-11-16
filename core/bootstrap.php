<?php

namespace App\Core;
use App\Core\Database\Connection;

$config = require 'config.php';
$pdo = Connection::make($config['database']);