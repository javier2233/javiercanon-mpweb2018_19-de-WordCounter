<?php

include __DIR__.'/vendor/autoload.php';

use WordCounter\Characters;
use WordCounter\FilterTemp;
use WordCounter\Keyword;
use WordCounter\Services\Printer;
use WordCounter\Vowel;
use WordCounter\Services\CollectionFilters;
use WordCounter\Filters\AllWords;
use \WordCounter\Services\TextToArray;
use \WordCounter\Services\Counter;

error_reporting(E_ALL);
ini_set('display_errors', 1);

$printer = new Printer();
$counter = new Counter();
$text  = "Esto es un texto molón que sirve como juego de pruebas para la kata de contar palabrejas. No me hagas un diseño de gañán ni de hiper-arquitecto. Que te veo, eh.";
$words = new TextToArray($text);
$arrayWords = $words->convertTextToArray();


$allWords = new AllWords();
$collectionFilters = new CollectionFilters();
$collectionFilters->addFilter($allWords);
$words = $collectionFilters->filter($arrayWords);
$counter->countWords($words, true);
//print_r($result);
/*

// Palabras totales
$counter = new Counter($filter);
$result = $counter->executeFilter();
$result->saveResults();
$printer->printConsole($result->getResults());
$filter->resetResults();
// END Palabras totales


// Contar solo las palabras que empiecen por vocal y tengan más de 2 caracteres (1)
$vowel = new Vowel($filter, "start", TRUE);
$result = $vowel->executeFilter();
$characters = new Characters($result, 2, 2);
$result = $characters->executeFilter();
$result->saveResults();
$printer->printConsole($result->getResults());
$filter->resetResults();
// END Contar solo las palabras que empiecen por vocal y tengan más de 2 caracteres (1)


//Contar solo palabras clave que empiecen por vocal (1)
$keywords = new Keyword($filter);
$result = $keywords->executeFilter();
$vowel = new Vowel($result, "start", true);
$result = $vowel->executeFilter();
$result->saveResults();
$printer->printConsole($result->getResults());
$filter->resetResults();
// END Contar solo palabras clave que empiecen por vocal (1)


// Contar solo palabras clave, que empiecen por vocal y tengan más de dos carácteres (0)
$keywords = new Keyword($filter);
$result = $keywords->executeFilter();
$vowel = new Vowel($result, "start", true);
$result = $vowel->executeFilter();
$characters = new Characters($result, 2, 2);
$result = $characters->executeFilter();
$result->saveResults();
$printer->printConsole($result->getResults());
$filter->resetResults();
// END Contar solo palabras clave, que empiecen por vocal y tengan más de dos carácteres (0)



// Palabras Clave y que no empiecen por vocal - 5
$keywords = new Keyword($filter);
$result = $keywords->executeFilter();
$vowel = new Vowel($result, "start", false);
$result = $vowel->executeFilter();
$filter->saveResults();
$printer->printConsole($result->getResults());
$filter->resetResults();
// Palabras Clave y que no empiecen por vocal - 5



// Palabras que no empiecen por vocal o que sí empiecen por vocal pero tengan mas de dos carácteres (27)
$vowel = new Vowel($filter, "start", false);
$result = $vowel->executeFilter();
$filter->saveResults();
$vowel = new Vowel($filter, "start", true);
$result = $vowel->executeFilter();
$characters = new Characters($result, 2, 2);
$result = $characters->executeFilter();
$filter->saveResults();
$printer->printConsole($result->getResults());
/*
// END Palabras que no empiecen por vocal o que sí empiecen por vocal pero tengan mas de dos carácteres (27)
*/

echo "\n";
