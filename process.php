<?php

require ("vendor/autoload.php");

require 'class/Filters.php';



if (isset($_POST['op']) && $_POST['op'] != '') {

    $response = array();
    $filters = new Filters();
    $text = $_POST["text"];
    if($text){
        $characters_now = $filters->counter($text);
        $response["counter"] = $characters_now;
    }else{
        $response["counter"] = 0;
        
    }
    $response["status"] = true;
    echo json_encode($response);
    
}

