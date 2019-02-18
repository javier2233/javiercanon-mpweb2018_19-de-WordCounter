<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
//echo __DIR__.'/class/Filter.php';
include __DIR__.'/class/Filter.php';
//var_dump($argc);
//var_dump($argv);

$filter  = new Filter();
$valor = $argv[1];
$count = $filter->counter($valor);
echo "Palabras totales:" . $count;
echo "\n";
exit();
?>