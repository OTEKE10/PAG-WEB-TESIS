<?php

//Importar la conexion
require __DIR__ . '/../config/database.php';
$db = conectarDB();


//Consultar
$query = "SELECT * FROM productos LIMIT ${limite}";

//Obtener resultado
$resultado = mysqli_query($db, $query);


?>



<div class="contenedor-anuncios">
        <?php while($producto = mysqli_fetch_assoc($resultado)):  ?>
        <div class="anuncio">
               
                    <img loading="lazy" src="/imagenes/<?php echo $producto['imagen'];?>" alt="shein">
               

                <div class="contenido-anuncio">
                    <h3><?php echo $producto['titulo'];?></h3>
                    <p><?php echo $producto['descripcion'];?></p>
                    <p class="precio">Q<?php echo $producto['precio'];?></p>

                    <a href="anuncio.php?id=<?php echo $producto['id'];?>" class="btn btn-ver">
                        Ver Articulos
                    </a>
                </div><!--.contenido-anuncio-->
            </div><!--anuncio-->
            <?php endwhile;  ?>

</div> <!--,contenedor-anuncios-->


<?php

//Cerrar la comexion
mysqli_close($db);


?>

            
