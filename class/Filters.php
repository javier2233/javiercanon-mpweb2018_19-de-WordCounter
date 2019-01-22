<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
class Filters
{
    private function __construct() {
        
    }

    public function counter($text){
        return strlen($text);
    }

}