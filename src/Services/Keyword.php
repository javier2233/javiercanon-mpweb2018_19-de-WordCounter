<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 30/06/2019
 * Time: 11:09 AM
 */

namespace WordCounter;


class Keyword extends FilterTempDecorator
{
    private $keywords = ["palabrejas", "gañán", "hiper-arquitecto", "que", "eh"];
    private $filter;
    public function __construct(FilterTemp $filter)
    {
        $this->filter = $filter;
    }
    public function executeFilter()
    {
        $this->onlyKeywords();
        return $this->filter;
    }

    public function onlyKeywords(){
        $this->filter->words = $this->keywords;
    }


}