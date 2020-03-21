<?php

namespace WordCounter\Filters;

use WordCounter\Interfaces\Filter;

class Vowel implements Filter
{

    public function filter($words)
    {
        return $this->getVowels($words);
    }

    private function getVowels($words){

        foreach ($words as $key => $word){
            //$letter = ($position == "start" ? substr($word, 0, 1) : substr($word, -1));
            $letter = substr($word, 0, 1);
            $letter = strtolower($letter);
            $letterIsVowel = preg_match('/[aeiouáéóú]/', $letter);
            if(!$letterIsVowel){
                unset($words[$key]);
            }
        }
        return $words;
    }

}