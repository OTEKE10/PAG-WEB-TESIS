<?php
    
    //IMportar la conexion

    require '../includes/config/database.php';
    
    $db = conectarDB();

    //Escribir el uery
    $query = "SELECT * FROM productos";

    //Consultar la BD
    $resultadoConsulta = mysqli_query($db, $query);



    //Muestra mensaje condicional
    $resultado= $_GET['resultado'] ?? null;

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT );

        if($id) {

            //Eliminar archivo
            $query = "SELECT imagen FROM productos WHERE id = ${id}";
            $resultado = mysqli_query($db, $query);
            $producto = mysqli_fetch_assoc($resultado);

            unlink('../imagenes/' . $producto['imagen']);
            


            //Eliminar propiedad
            $query = "DELETE FROM productos WHERE id = ${id}";
            $resultado = mysqli_query($db, $query);

            if($resultado) {
                header('location: /admin?resultado=3');
            }
        }
        
        

    }

    require '../includes/funciones.php';
    incluirTemplate('header');

?>

    <main class="contenedor seccion">
        <h1>Administrador</h1>
        <?php if( intval ($resultado) === 1): ?>
            <p class="alerta exito">Producto creado correctamente</p>
        <?php elseif(intval ($resultado) === 2): ?>
            <p class="alerta exito">Producto actualizado correctamente</p>
            <?php elseif(intval ($resultado) === 3): ?>
            <p class="alerta exito">Producto eliminado correctamente</p>
        <?php endif; ?>

            
        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nuevo Producto</a>
        <a href="/admin/propiedades/actualizar.php" class="boton boton-verde">Actualizar Producto</a>


        <table class="propiedades">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Titulo</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>Acciones</th>

                </tr>

            </thead>

            <tbody> <!-- Mostar los resultados -->
                <?php while( $producto = mysqli_fetch_assoc($resultadoConsulta)): ?>
                <tr>
                    <td> <?php echo $producto ['id']; ?></td>
                    <td> <?php echo $producto ['titulo']; ?></td>
                    <td>Q <?php echo $producto ['precio']; ?></td>
                    <td> <img src="../imagenes/<?php echo $producto ['imagen']; ?>" class="imagen-tabla"></td>
                    <td>

                        <form method="POST" class="w-100">

                            <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">


                            <input type="submit"  class="boton-rojo-block" value="Eliminar">
                        </form>
                       
                        <a href="admin/propiedades/actualizar.php?id=<?php echo $producto ['id']; ?>" class="boton-amarillo-block">Actualizar</a>

                    </td>
                    



                </tr>
                <?php endwhile; ?>
            </tbody>

        </table>
    </main>

    
<?php

    //Cerrar la conexion

    mysqli_close($db);


    incluirTemplate('footer');
?>