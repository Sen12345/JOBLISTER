<?php 
//Start the session
session_start();

require_once 'config/config.php';

require_once 'helpers/system_helper.php';

spl_autoload_register('my_autoloader');

function my_autoloader($class) {
    include 'LIB/' . $class . '.php';
}

