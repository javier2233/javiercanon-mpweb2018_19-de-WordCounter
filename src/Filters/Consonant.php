<?php


namespace WordCounter\Filters;


use WordCounter\Interfaces\Filter;

class Consonant implements Filter
{

    public function filter($words)
    {
        return $this->getConsonants($words);
    }

    private function getConsonants($words){
        foreach ($words as $key => $word){
            $letter = substr($word, 0, 1);
            $letter = strtolower($letter);
            $letterIsVowel = preg_match('/[bcdfghjklmnpqrstvwxyz]/', $letter);
            if(!$letterIsVowel){
                unset($words[$key]);
            }
        }
        return $words;
    }
}