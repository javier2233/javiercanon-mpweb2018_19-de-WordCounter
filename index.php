<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
//echo __DIR__.'/class/Filter.php';
include __DIR__.'/class/Filter.php';
//var_dump($argc);
//var_dump($argv);

$filter = new Filter();
$valor  = "Esto es un texto molón que sirve como juego de pruebas para la kata de contar palabrejas. No me hagas un diseño de gañán ni de hiper-arquitecto. Que te veo, eh.";
//$valor  = $argv[1];
//$accion = $argv[2];
$count  = $filter->counterWord($valor);
echo "Palabras totales:" . $count;
//print_r($count);
echo "\n";
//echo $accion;
echo "\n";
exit();
