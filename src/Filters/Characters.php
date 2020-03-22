<?php

namespace WordCounter\Filters;

use WordCounter\Interfaces\Filter;

class Characters implements Filter
{
    private $limit;
    public function __construct($limit)
    {
        $this->limit = $limit;
    }

    public function filter($words)
    {
        return $this->moreCharacters($words);
    }

    public function moreCharacters($words){
        foreach ($words as $key => $word){
            $chars = strlen($word);
            if($chars <= $this->limit){
                unset($words[$key]);
            }
        }
        return $words;
    }

}