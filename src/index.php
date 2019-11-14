<?php


use  WorldAnalysis\Mysql\oConexion;



require  './../vendor/autoload.php';
$config = parse_ini_file(__DIR__ . "/../.env");

//use WorldAnalysis\Mysql\Conexion;
var_dump("hola");

 $prueba = new oConexion($config["HOST"] ,$config["DB"], $config["USER"] , $config["PASS"] );

var_dump($prueba);







