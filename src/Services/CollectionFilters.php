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
            //print_r($filter);echo PHP_EOL;
            $this->words = $filter->filter($this->words);

        }
        $this->resetFilters();
        return $this->words;
    }

    public function addFilter(Filter $filter){
     $this->filters[] = $filter;
    }

    private function resetFilters(){
        $this->filters = array();
    }
}