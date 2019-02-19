<?php


class Filter
{

    public function counterWord($text){
        return str_word_count($text,0, "áéíóúñ");
    }

}