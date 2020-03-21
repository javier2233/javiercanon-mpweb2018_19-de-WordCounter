<?php

namespace WordCounter\Filters;


use WordCounter\Interfaces\Filter;

class Keywords implements Filter
{
    private $listKeywords = ["palabrejas", "gañán", "hiper-arquitecto", "que", "eh"];

    public function filter($words)
    {
        return $this->onlyKeywords($words);
    }

    public function onlyKeywords($words){
        foreach ($words as $key => $word){
            if(!in_array(strtolower($word), $this->listKeywords)){
                unset($words[$key]);
            }
        }
        return $words;
    }
}