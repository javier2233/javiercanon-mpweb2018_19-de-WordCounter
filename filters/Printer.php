<?php
/**
 * Created by PhpStorm.
 * User: javie
 * Date: 24/02/2019
 * Time: 1:10 PM
 */

namespace filters;
class Printer
{
    public function printHtml($text){
        echo "<p>$text</p>";

    }

    public function printConsole($text){
        echo $text . PHP_EOL;
    }
}