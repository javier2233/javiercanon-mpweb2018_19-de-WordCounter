<?php
namespace filters;
use filters\Printer as Printer;
class Filter
{
    public function processWord($text){
        $printer = new Printer;
        $count = "Palabras:". $this->counterWord($text);
        $printer->printConsole($count);
    }

    public function counterWord($text){
        return str_word_count($text,0, "áéíóúñ");
    }

    public function firstVocal($text){
        return str_word_count($text,0, "áéíóúñ");
    }

    public function twoMoreChar($text){
        return str_word_count($text,0, "áéíóúñ");
    }

    public function getKeyWords($text){
        return str_word_count($text,0, "áéíóúñ");
    }

}