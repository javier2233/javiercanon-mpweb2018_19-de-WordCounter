<?php

namespace WordCounter\Services;

class Counter
{
    public function countWords($arrayCounters, $debug = false){
        if($debug){
            print_r($arrayCounters);
            echo PHP_EOL;
        }
        $total = 0;
        foreach ($arrayCounters as $counter){
            $total += count($counter);
        }
        echo "Total: " . $total .PHP_EOL;
    }

}