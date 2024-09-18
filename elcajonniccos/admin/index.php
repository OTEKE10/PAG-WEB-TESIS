<?php
    

    //echo "<pre>";
    //var_dump($_GET);
    //echo "</pre>";
    $resultado= $_GET['resultado'] ?? null;
    require '../includes/funciones.php';
    
    incluirTemplate('header');

?>

    <main class="contenedor seccion">
        <h1>Administrador</h1>
        <?php if( intval ($resultado) === 1): ?>
            <p class="alerta exito">Producto creado correctamente</p>
        <?php endif; ?>
            
        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nuevo Producto</a>
        <a href="/admin/propiedades/borrar.php" class="boton boton-verde">Borrar Producto</a>
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

            <tbody>
                <tr>
                    <td>1</td>
                    <td>Blusa</td>
                    <td>$125</td>
                    <td> <img src="../imagenes/4df72f139a30bf19b7c920c3ed719291.jpg" class="imagen-tabla"></td>
                    <td>
                        <a href="#" class="boton-rojo-block">Eliminar</a>
                        <a href="#" class="boton-verde-block">Actualizar</a>

                    </td>
                    



                </tr>
            </tbody>

        </table>
    </main>

    
<?php
    incluirTemplate('footer');
?>   