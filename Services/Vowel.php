<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 30/06/2019
 * Time: 7:52 AM
 */

namespace WordCounter;


class Vowel extends FilterDecorator
{
    private $filter;
    private $position;
    private $isVowel;
    public function __construct(Filter $filter, String $position, $isVowel)
    {
        $this->filter = $filter;
        $this->position = $position;
        $this->isVowel = $isVowel;
    }

    public function executeFilter()
    {
        $this->getVowel($this->position, $this->isVowel);
        return $this->filter;
    }

    public function getVowel($position = "start", $isVowel = true){

        foreach ($this->filter->words as $key => $word){
            $letter = ($position == "start" ? substr($word, 0, 1) : substr($word, -1));
            $letter = strtolower($letter);
            //echo $word . "--" . $letter . PHP_EOL;
            $letterIsVowel = preg_match('/[aeiouáéóú]/', $letter);
            if($letterIsVowel == !$isVowel){
                unset($this->filter->words[$key]);
            }
        }
    }
}