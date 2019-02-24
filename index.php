<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
//echo __DIR__.'/class/Filter.php';
//include __DIR__.'/class/Filter.php';
include __DIR__.'/autoload.php';
//var_dump($argc);
//var_dump($argv);
use filters\Filter;
$filter = new Filter;
$text  = "Esto es un texto molón que sirve como juego de pruebas para la kata de contar palabrejas. No me hagas un diseño de gañán ni de hiper-arquitecto. Que te veo, eh.";
//$text  = $argv[1];
//$accion = $argv[2];
$count  = $filter->processWord($text);
echo "\n";
