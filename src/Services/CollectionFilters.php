<?php


namespace WordCounter\Services;


use WordCounter\Interfaces\Filter;

class CollectionFilters implements Filter
{
    private $filters;
    private $words;

    public function filter($arrayWords)
    {
        $this->words = $arrayWords;
        foreach ( $this->filters as $filter ) {

            $this->words = $filter->filter($this->words);

        }
        return $this->words;
    }

    public function addFilter(Filter $filter){
     $this->filters[] = $filter;
    }
}