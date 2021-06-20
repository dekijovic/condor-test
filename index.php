<?php

function my_autoloader($class) {
    include  str_replace( '\\', '/',$class ). '.php';
}

spl_autoload_register('my_autoloader', true, false);


$controller = new Controllers\Controller();
$controller->render();
