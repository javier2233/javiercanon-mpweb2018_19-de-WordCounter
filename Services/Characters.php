<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 30/06/2019
 * Time: 7:55 AM
 */

namespace WordCounter;


class Characters extends FilterDecorator
{
    private $filter;
    private $type;
    private $limit;

    public function __construct(Filter $filter, $type, $limit)
    {
        $this->filter = $filter;
        $this->type= $type;
        $this->limit= $limit;
    }

    public function executeFilter()
    {
        switch ($this->type){

            case 1:
                $this->lessCharacters($this->limit);
                break;

            case 2:
                $this->moreCharacters($this->limit);
        }
        return $this->filter;

    }

    public function lessCharacters($limit){
        foreach ($this->filter->words as $key => $word){
            $chars = strlen($word);
            echo $chars . "-- ". $word;
            if($chars > $limit){
                unset($this->filter->words[$key]);
            }
        }
        return $this;
    }

    public function moreCharacters($limit){
        foreach ($this->filter->words as $key => $word){
            $chars = strlen($word);
            //echo $chars . "-- ". $word;
            if($chars <= $limit){
                unset($this->filter->words[$key]);
            }
        }
    }
}