<?php

$config = require 'config.php';
require 'core/Router.php';
require 'core/database/Connection.php';
require 'core/database/QueryBuilder.php';
require 'functions.php';

$pdo = Connection::make($config['database']);