<?php
session_start();

spl_autoload_register(function ($className) {

    //sökvägen blir fel, den utgår från src/config,
    //den ska utgå från 2 mappar upp där alla sidor ligger

    $basePath = '../';
    print_r($basePath);
    echo 'test';    
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


//http://localhost/BUV23PHP-slutuppgift/src/config/src/config/model/database/


//klistra in php raden här nedan längst upp på sidan:
/*<?php require 'src/config/autoloader.php'; ?>*/

//echo för att testa så den laddar in:
// echo 'test från autoloader';
?>
