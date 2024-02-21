<?php
session_start();

spl_autoload_register(function ($className) {

    $basePath = __DIR__ . '/src/';

    $class = str_replace('', DIRECTORY_SEPARATOR, $className);

    $paths = [
        $basePath . "config/" . $class . ".php",
        $basePath . "controller/" . $class . ".php",
        $basePath . "model/database/" . $class . ".php",
        $basePath . "model/database/dao/" . $class . ".php",
        $basePath . "model/database/entity/" . $class . ".php",
    ];
    foreach ($paths as $file) {
        if (file_exists($file)) {
            require_once $file;
            break;
        }
    }
});

//klistra in php raden här nedan längst upp på sidan:
/*<?php require 'src/config/autoloader.php'; ?>*/

//echo för att testa så den laddar in:
// echo 'test från autoloader';
?>
