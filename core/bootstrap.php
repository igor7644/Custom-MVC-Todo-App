<?php

$config = require 'config.php';
require 'database/Connection.php';
require 'database/QueryBuilder.php';
require 'functions.php';

$pdo = Connection::make($config['database']);