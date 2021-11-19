<?php 
require_once 'config/config.php';

require_once 'helpers/system_helper.php';

spl_autoload_register('my_autoloader1');

function my_autoloader1($class) {
    include 'LIB/' . $class . '.php';
}

