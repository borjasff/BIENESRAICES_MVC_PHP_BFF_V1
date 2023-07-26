<?php

//conectarnos a nuestra bd

function conectarDB() : mysqli {
  //estilo orientado a objetos
    $db = new mysqli(
      $_ENV['DB_HOST'],
      $_ENV['DB_USER'],
      $_ENV['DB_PASS'],
      $_ENV['DB_NAME'],
);

$db->set_charset('utf8');

    if(!$db){
        echo "No se conectó";
        exit;
  }
  return $db;
}