<?php
    
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header('Location: /');
    }

    //Importar la conexion
    require 'includes/config/database.php';
    $db = conectarDB();


    //Consultar
    $query = "SELECT * FROM productos WHERE id = ${id}";

    //Obtener resultado
    $resultado = mysqli_query($db, $query);

    if(!$resultado->num_rows) {
        header('Location: /');
    }

    $producto = mysqli_fetch_assoc($resultado);
    
    require 'includes/funciones.php';
    
    incluirTemplate('header');

?>

    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $producto['titulo'];?></h1>

      
        <img loading="lazy" src="/imagenes/<?php echo $producto['imagen'];?>" alt="shein">
        

        <div class="resumen-propiedad">
            <p class="precio">Q<?php echo $producto['precio'];?></p>

            <p><?php echo $producto['descripcion'];?></p>
        </div>
    </main>

    <?php

        //Cerrar la comexion
        mysqli_close($db);
        incluirTemplate('footer');
    ?>   
</body>
</html>




