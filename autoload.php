<?php

function mi_autocargador($clase) {

	$name_class = str_replace('\\', '/', $clase );
    include __DIR__ . '/' . $name_class . '.php';
}

spl_autoload_register('mi_autocargador');


//echo "-> todo ok <br>";
