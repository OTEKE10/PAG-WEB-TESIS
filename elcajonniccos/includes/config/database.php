<?php
 
function conectarDB() : mysqli {
    //$db = mysqli_connect('sql205.infinityfree.com', 'if0_37481964', 'QLHe4hWyB6', 'if0_37481964_cajoniccos');
    $db = mysqli_connect('localhost', 'root', 'wolverin10', 'cajondeniccos_crud');
    
    $db->set_charset("utf8");
 
    if(!$db) {
        echo "Error no se pudo conectar";
        exit;
    } 
 
    return $db;
}
