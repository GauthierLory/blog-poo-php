<?php

spl_autoload_register(function ($className){
    $className = str_replace('\\', DIRECTORY_SEPARATOR, lcfirst($className));
    require_once("libraries/$className.php");
});