<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
//echo __DIR__.'/class/Filter.php';
//include __DIR__.'/class/Filter.php';
include __DIR__.'/autoload.php';
//var_dump($argc);
//var_dump($argv);
use filters\Filter;
use filters\Printer;
$printer = new Printer();
$text  = "Esto es un texto molón que sirve como juego de pruebas para la kata de contar palabrejas. No me hagas un diseño de gañán ni de hiper-arquitecto. Que te veo, eh.";
$filter = new Filter($text);

// Palabras totales
$filter->execute();
$printer->printConsole($filter->getResults());
$filter->resetResults();
// END Palabras totales

// Contar solo las palabras que empiecen por vocal y tengan más de 2 caracteres (1)
$filter->vowel("start", true)->limitCharacters(2)->execute();
$printer->printConsole($filter->getResults());
$filter->resetResults();
// END Contar solo las palabras que empiecen por vocal y tengan más de 2 caracteres (1)

//Contar solo palabras clave que empiecen por vocal (1)
$filter->onlyKeywords()->vowel("start", true)->execute();
$printer->printConsole($filter->getResults());
$filter->resetResults();
// END Contar solo palabras clave que empiecen por vocal (1)


// Contar solo palabras clave, que empiecen por vocal y tengan más de dos carácteres (0) 
$filter->onlyKeywords()->vowel("start", true)->limitCharacters(2)->execute();
$printer->printConsole($filter->getResults());
$filter->resetResults();
// END Contar solo palabras clave, que empiecen por vocal y tengan más de dos carácteres (0) 

// Palabras Clave y que no empiecen por vocal - 5
$filter->onlyKeywords()->vowel("start", false)->execute();
$printer->printConsole($filter->getResults());
$filter->resetResults();
// Palabras Clave y que no empiecen por vocal - 5


// Palabras que no empiecen por vocal o que si empiecen por vocal pero que tengan menos de dos caracteres
$filter->vowel("start", false)->execute();
$filter->vowel("start", true)->moreCharacters(2)->execute();
$printer->printConsole($filter->getResults());

/*
// END Palabras que no empiecen por vocal o que si empiecen por vocal pero que tengan menos de dos caracteres
*/

echo "\n";
