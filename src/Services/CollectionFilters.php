<?php

namespace WordCounter\Services;

use WordCounter\Interfaces\Filter;

class CollectionFilters implements Filter
{
    private $filters;
    private $words;
    private $saveRecords;
    private $totalRecords;
    public function filter($arrayWords)
    {
        $this->words = $arrayWords;
        foreach ( $this->filters as $filter ) {
            if ($filter == "OR"){
                $this->saveRecords[] = $this->words;
                $this->words = $arrayWords;
                continue;
            }
            $this->words = $filter->filter($this->words);
        }
        $this->saveRecords[] = $this->words;
        $this->totalRecords =  $this->saveRecords;
        $this->resetCollection();
        return $this->totalRecords;
    }

    public function addFilter(Filter $filter){
     $this->filters[] = $filter;
    }
    public function addOrFilter(){
        $this->filters[] = "OR";
    }

    private function resetCollection(){
        $this->filters = array();
        $this->saveRecords = array();
    }
}