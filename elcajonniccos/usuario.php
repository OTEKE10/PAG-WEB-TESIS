<?php 

//IMportar la conexion

    require 'includes/config/database.php';
    $db = conectarDB();


//Crear un email y password
$email = "cajoniccos@gmail.com";
$password = "cajoniccos";

$passwordHash = password_hash($password, PASSWORD_DEFAULT );





//Query para crear el usuario
$query = "INSERT INTO usuarios (email, password) VALUES ( '${email}', '${passwordHash}'); ";
//echo $query;
 

//Agregarlo a la base de datos

mysqli_query($db, $query);



