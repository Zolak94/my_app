<?php
require_once('Routes.php');

function __autoload($class_name) {
    if (file_exists('./models/'.$class_name.'.php')) {
        require_once './models/'.$class_name.'.php';
    } else if (file_exists('./Controllers/'.$class_name.'.php')) {
        require_once './controllers/'.$class_name.'.php';
    }
}
?>