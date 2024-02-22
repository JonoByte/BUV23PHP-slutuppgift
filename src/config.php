<?php
session_start();

spl_autoload_register(function ($className) {

    $basePath = __DIR__;
    
    $paths = [
        $basePath . "/config/" . $className . ".php",
        $basePath . "/controller/" . $className . ".php",
        $basePath . "/model/database/" . $className . ".php",
        $basePath . "/model/database/dao/" . $className . ".php",
        $basePath . "/model/database/entity/" . $className . ".php",
    ];
    
    foreach ($paths as $file) {
        $file = str_replace('/', DIRECTORY_SEPARATOR, $file);
        $file = str_replace('\\', DIRECTORY_SEPARATOR, $file);
        // echo $file . '<BR>';

        if (file_exists($file)) {
            require_once $file;
            
            break;
        }
    }
    
});

//ev bool för att kolla om man är inloggad

//http://localhost/BUV23PHP-slutuppgift/src/config/src/config/model/database/

//klistra in php raden här nedan längst upp på sidan:
/*<?php require 'src/config/autoloader.php'; ?>*/

//echo för att testa så den laddar in:
// echo 'test från autoloader';

?>
