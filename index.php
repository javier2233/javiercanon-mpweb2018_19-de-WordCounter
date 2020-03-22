<?php

include __DIR__.'/vendor/autoload.php';

use WordCounter\Filters\Characters;
use WordCounter\Filters\Consonant;
use WordCounter\Filters\Keywords;
use WordCounter\Filters\Vowel;
use WordCounter\Filters\AllWords;
use WordCounter\Services\CollectionFilters;
use \WordCounter\Services\TextToArray;
use \WordCounter\Services\Counter;

$text = "Esto es un texto molón que sirve como juego de pruebas para la kata de contar palabrejas. No me hagas un diseño
 de gañán ni de hiper-arquitecto. Que te veo, eh.";
$counter = new Counter();
$vowel = new Vowel();
$keywords = new Keywords();
$allWords = new AllWords();
$characters = new Characters(2);
$constants = new Consonant();
$collectionFilters = new CollectionFilters();
$words = new TextToArray($text);
$arrayWords = $words->convertTextToArray();

// Palabras totales
$collectionFilters->addFilter($allWords);
$words = $collectionFilters->filter($arrayWords);
//$counter->countWords($words, true);


//Palabras que empiecen por vocal (5)
$collectionFilters->addFilter($vowel);
$words = $collectionFilters->filter($arrayWords);
//$counter->countWords($words, true);


//Palabras de más de dos caracteres (18)
$collectionFilters->addFilter($characters);
$words = $collectionFilters->filter($arrayWords);
//$counter->countWords($words, true);


//Palabras clave (6)
$collectionFilters->addFilter($keywords);
$words = $collectionFilters->filter($arrayWords);
//$counter->countWords($words, true);


//Contar solo las palabras que empiecen por vocal y tengan más de 2 caracteres (1).
$collectionFilters->addFilter($vowel);
$collectionFilters->addFilter($characters);
$words = $collectionFilters->filter($arrayWords);
//$counter->countWords($words, true);


//Contar solo palabras clave que empiecen por vocal (1).
$collectionFilters->addFilter($keywords);
$collectionFilters->addFilter($vowel);
$words = $collectionFilters->filter($arrayWords);
//$counter->countWords($words, true);


//Contar solo pablabras clave, que empiecen por vocal y tengan más de dos caracteres (0).
$collectionFilters->addFilter($keywords);
$collectionFilters->addFilter($vowel);
$collectionFilters->addFilter($characters);
$words = $collectionFilters->filter($arrayWords);
//$counter->countWords($words, true);


//Solo palabras clave y que no empiecen por vocal (5).
$collectionFilters->addFilter($keywords);
$collectionFilters->addFilter($constants);
$words = $collectionFilters->filter($arrayWords);
$counter->countWords($words);

//Palabras que no empiecen por vocal o que sí empiecen por vocal pero tengan más de dos caracteres (27).
$collectionFilters->addFilter($constants);
$collectionFilters->addOrFilter();
$collectionFilters->addFilter($vowel);
$collectionFilters->addFilter($characters);
$words = $collectionFilters->filter($arrayWords);
$counter->countWords($words);

echo "\n";
