<?php


namespace WordCounter\Services;


class Counter
{

    public function countWords($arrayWords, $debug = false){
        if($debug){
            print_r($arrayWords);
            echo PHP_EOL;
        }
        echo "Total: " . count($arrayWords) .PHP_EOL;
    }


}