<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 30/06/2019
 * Time: 7:58 AM
 */

namespace WordCounter;


class Counter extends FilterDecorator
{
    private $filter;

    public function __construct(Filter $filter)
    {
        $this->filter = $filter;
    }

    public function executeFilter(){
        return $this->filter;
    }


}