<?php

if(!function_exists('classAutoLoader')){
    function classAutoLoader($class)
    {
        $root = dirname(__FILE__)  . DIRECTORY_SEPARATOR;
        $classesDir = array(
            $root . "class" . DIRECTORY_SEPARATOR,
            );
        foreach ($classesDir as $directory) {
            if (file_exists($directory . $class . '.php')) {
                require_once ($directory . $class . '.php');
                return;
            }
        }
    }
}
spl_autoload_register('classAutoLoader');
