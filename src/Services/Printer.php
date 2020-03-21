<?php
/**
 * Created by PhpStorm.
 * User: javie
 * Date: 24/02/2019
 * Time: 1:10 PM
 */

namespace WordCounter\Services;
class Printer
{
    public function printHtml($result){
        
        echo "<p>Total palabras: $result</p>";

    }

    public function printConsole($result){
        echo "Total palabras: ". $result .PHP_EOL;
        echo PHP_EOL;
    }
}