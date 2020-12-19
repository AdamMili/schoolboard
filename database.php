<?php

use Illuminate\Database\Capsule\Manager as Capsule;

# Set database connection

$capsule = new Capsule();

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'schoolboard',
    'username'  => 'root',
    'password'  => 'rooT123!',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->bootEloquent();