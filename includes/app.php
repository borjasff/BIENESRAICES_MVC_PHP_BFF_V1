<?php

use Model\ActiveRecord;

//archivo princial que hace llamar funciones, bases de datos y clases

require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

require 'funciones.php';
require 'config/database.php';


//conectar a bd
$db = conectarDB();

ActiveRecord::setDB($db);
