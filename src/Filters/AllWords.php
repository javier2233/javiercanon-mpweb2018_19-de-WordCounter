<?php


namespace WordCounter\Filters;


use WordCounter\Interfaces\Filter;

class AllWords implements Filter
{

    public function filter($words)
    {
        return $words;
    }

}