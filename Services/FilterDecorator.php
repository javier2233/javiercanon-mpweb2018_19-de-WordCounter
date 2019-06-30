<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 30/06/2019
 * Time: 9:52 AM
 */

namespace WordCounter;


Abstract class FilterDecorator extends Filter
{
    abstract public function executeFilter();

}