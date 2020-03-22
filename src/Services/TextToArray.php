<?php

namespace WordCounter\Services;

class TextToArray
{
    private $text;
    private $arrayWords;
    public function __construct($text)
    {
        $this->text = $text;
    }

    public function convertTextToArray(){
        $this->arrayWords = str_word_count($this->text,1, "áéíóúñ");;
        return $this->arrayWords;
    }

}