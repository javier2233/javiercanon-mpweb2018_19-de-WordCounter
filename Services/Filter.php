<?php
namespace WordCounter;


class Filter
{    
    private $text;
    public $result = array();
    public $words;


    public function __construct(String $text)
    {        
        $this->text = $text;
        $this->words = $this->getArrayWords($this->text);
        //print_r($this->words);
    }

    public function getArrayWords ($text){
        $array_words = str_word_count($text,1, "áéíóúñ");
        return $array_words;
    }


    public function getResults(){
        $total = 0;
        foreach ($this->result as $result){
            $total += $result;
        }
       return $total;

    }

    public function saveResults(){
        $this->result[] = count($this->words);

    }


    public function resetResults(){
        $this->words = $this->getArrayWords($this->text);
        $this->result = array();
    }
  
}