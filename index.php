<?php
require 'vendor/autoload.php';
ini_set("display_errors", "1");
error_reporting(E_ALL);


use \libs\Database\Connection as Connection;

echo "hi test!";
/*use \libs\Migration\Migrate;
use \libs\Migration\Seed;

Connection::getInstance();

$migrater = new Migrate();
$migrater->createTables();

$seed = new Seed();
$seed->feedTables();*/
