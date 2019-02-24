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

        $key_words = $this->vewelsTwoLetters($text);
        $printer->printConsole($key_words);

        $key_words = $this->keywordsVewel(true, false);
        $printer->printConsole($key_words);

        $key_words = $this->keywordsVewel(true, true);
        $printer->printConsole($key_words);

        $key_words = $this->keywordsVewel(false, false);
        $printer->printConsole($key_words);

        $key_words = $this->keywordsVewelMultiple($text);
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

    public function firstVocalByWord($word){

        $response = false;
        $firts = substr($word, 0, 1);
        $firts = strtolower($firts);
        $is_vewel = preg_match('/[aeiouáéóú]/', $firts);
        if($is_vewel){
            $response = true;
        }
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

    public function twoMoreCharByWord($word){
        $response = false;
        $chars = strlen($word);
        if($chars > 2){
            $response = true;
        }
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

    public function vewelsTwoLetters($text){
        $words = $this->getArrayWords($text);
        $counter = 0;
        foreach ($words as $word){
            $vewels = $this->firstVocalByWord($word);
            $two_letters = $this->twoMoreCharByWord($word);
            if($vewels && $two_letters){
                $counter++;
            }
        }
        $respose = "Contar solo las palabras que empiecen por vocal y tengan más de 2 caracteres: " . $counter;
        return $respose;

    }

    public function keywordsVewel($is_vewels_first, $is_two_letters){
        $words = $this->keywords;
        $counter = 0;
        $text_response = "";
        foreach ($words as $word){
            $firts = substr($word, 0, 1);
            $firts = strtolower($firts);
            $is_vewel = preg_match('/[aeiouáéóú]/', $firts);
            if($is_vewel && $is_vewels_first){
                if($is_two_letters){
                    $text_response = "Contar solo palabras clave, que empiecen por vocal y tengan más de dos carácteres: ";
                    if($this->twoMoreCharByWord($word)){
                        $counter++;
                    }
                }else{
                    $text_response = "Contar solo palabras clave que empiecen por vocal: ";
                    $counter++;
                }
            }elseif (!$is_two_letters){
                $text_response = "Solo palabras clave y que no empiecen por vocal: ";
                $counter++;
            }
        }
        $response = $text_response . $counter;
        return $response;
    }

    public function keywordsVewelMultiple($text){
        $words = $this->getArrayWords($text);
        $counter = 0;
        $text_response = "Palabras que no empiecen por vocal o que sí empiecen por vocal pero tengan mas de dos carácteres: ";
        foreach ($words as $word){
            $is_vewel = $this->firstVocalByWord($word);
            if($is_vewel){
                if($this->twoMoreCharByWord($word)){
                    $counter++;
                }
            }else{
                $counter++;
            }
        }
        $response = $text_response . $counter;
        return $response;
    }
}