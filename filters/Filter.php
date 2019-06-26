<?php
namespace filters;


class Filter
{    
    private $text;
    private $result = array();
    private $keywords = ["palabrejas", "gañán", "hiper-arquitecto", "que", "eh"];
    private $isKeyword = false;
    public $words;

    public function __construct(String $text)
    {        
        $this->text = $text;
        $this->words = $this->getArrayWords($this->text);
        print_r($this->words);
    }

    public function execute(){
        $this->result[] = count($this->words);
    }

    public function getResults(){
        $total = 0;        
        foreach ($this->result as $value) {
            $total += $value;
        }
       return $total;

    } 
    public function getArrayWords ($text){
        $array_words = str_word_count($text,1, "áéíóúñ");
        return $array_words;
    }

    public function counterWord(){
        
        return $this;
    }

    public function vowel($position = "start", $isVowel = true){        
        foreach ($this->words as $key => $word){
            $letter = ($position == "start" ? substr($word, 0, 1) : substr($word, -1));
            $letter = strtolower($letter);
            //echo $word . "--" . $letter . PHP_EOL;
            $letterIsVewel = preg_match('/[aeiouáéóú]/', $letter);
            if($letterIsVewel == !$isVowel){
                unset($this->words[$key]);
            }
        }
        return $this;
    }
    
    public function onlyKeywords(){
        $this->isKeyword = true;
        $this->words = $this->keywords;
        return $this;
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

    public function limitCharacters($limit){
        foreach ($this->words as $key => $word){
            $chars = strlen($word);
            if($chars <= $limit){
                unset($this->words[$key]);
            }
        }
        return $this;
    }

    public function moreCharacters($limit){
        foreach ($this->words as $key => $word){
            $chars = strlen($word);
            if($chars <= $limit){
                unset($this->words[$key]);
            }
        }
        return $this;
    }

    public function resetResults(){
        $this->words = $this->getArrayWords($this->text);
        $this->result = array();
    }
  
}