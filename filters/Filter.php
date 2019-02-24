<?php
namespace filters;
use filters\Printer as Printer;
class Filter
{
    private $keywords = ["palabrejas", "gañán", "hiper-arquitecto", "que", "eh"];
    public function processWord($text){
        $printer = new Printer;
        $count = $this->counterWord($text);
        $printer->printConsole($count);

        $vewels = $this->firstVocal($text);
        $printer->printConsole($vewels);

        $two_chars = $this->twoMoreChar($text);
        $printer->printConsole($two_chars);

        $key_words = $this->getKeyWords($text);
        $printer->printConsole($key_words);
    }
    public function getArrayWords ($text){
        $array_words = str_word_count($text,1, "áéíóúñ");
        return $array_words;
    }

    public function counterWord($text){
        $response = "Palabras Totales: " . str_word_count($text,0, "áéíóúñ");
        return $response;
    }

    public function firstVocal($text){
        $words = $this->getArrayWords($text);
        $vewels = 0;
        foreach ($words as $word){
            $firts = substr($word, 0, 1);
            $firts = strtolower($firts);
            $is_vewel = preg_match('/[aeiouáéóú]/', $firts);
            if($is_vewel){
                $vewels++;
            }
        }
        $response = "Palabras que empiecen por vocal: " .$vewels;
        return $response;
    }

    public function twoMoreChar($text){
        $words = $this->getArrayWords($text);
        $count = 0;
        foreach ($words as $word){
            $chars = strlen($word);
            if($chars > 2){
                $count++;
            }
        }
        $response = "palabras con mas de 2 caracteres: ". $count;
        return $response;
    }

    public function getKeyWords($text){
        $words = $this->getArrayWords($text);
        $counter = 0;
        foreach ($words as $word){
            $is_key_word = in_array(strtolower($word), $this->keywords);
            if($is_key_word){
                echo $word . PHP_EOL;
                $counter++;
            }
        }
        $response = "Palabras clave: " . $counter;
        return $response;
    }
}