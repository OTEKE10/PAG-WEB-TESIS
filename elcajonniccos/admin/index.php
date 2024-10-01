<?php

    require '../includes/funciones.php';
    $auth = estaAutenticado();

    if(!$auth) {
    header('Location: /');
    }

    
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

            
        <a href="/admin/propiedades/crear.php" class="btn btn-pink fg-white"> <i class="fa-solid fa-circle-plus"></i> Nuevo Producto</a>
        


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
                    <td class="d-flex flex-center flex-row flex-gap">

                        <form method="POST" class=" d-flex flex-center">

                            <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">


                            <button title="Eliminar" type="submit" class="btn-icon btn-delete"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                       
                        <a title="Editar" href="admin/propiedades/actualizar.php?id=<?php echo $producto ['id']; ?>" class="btn-icon btn-editar"><i class="fa-regular fa-pen-to-square"></i></a>

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
