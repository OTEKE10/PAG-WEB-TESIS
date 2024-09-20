<?php
    //Validar la url por id valido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header('Location: /admin');
    }

    // Base de datos

    require '../../includes/config/database.php';
    
    $db = conectarDB();

    // Obtener los datos del producto
    $consulta = "SELECT *FROM productos WHERE id = ${id}";
    $resultado = mysqli_query($db, $consulta);
    $producto =  mysqli_fetch_assoc($resultado);

        //echo "<pre>";
        //var_dump($producto);
        //echo "</pre>";



    // Consultar los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    
    //Arreglo con mensajes de errores
    $errores = [];

    $titulo = $producto['titulo'];
    $precio = $producto['precio'];
    $descripcion = $producto['descripcion'];
    $cantidad = $producto['cantidad'];
    $vendedores_id = $producto['vendedores_id'];
    $imagenProducto = $producto['imagen'];




    //Ejecutar el codigo que el usuario envia el formulario
    
    

    if($_SERVER['REQUEST_METHOD'] === 'POST') {




       // echo "<pre>";
       // var_dump($_POST);
       // echo "</pre>";

        

       // echo "<pre>";
       // var_dump($_FILES);
       // echo "</pre>";

        

        $titulo = mysqli_real_escape_string( $db,  $_POST['titulo'] );
        $precio = mysqli_real_escape_string( $db, $_POST['precio'] );
        $descripcion = mysqli_real_escape_string( $db, $_POST['descripcion'] );
        $cantidad = mysqli_real_escape_string( $db, $_POST['cantidad'] );
        $vendedores_id = mysqli_real_escape_string( $db, $_POST['vendedor'] );
        $creacion = date( 'Y/m/d');

        //Asignar files a una variable

        $imagen = $_FILES['imagen'];

        


        if (!$titulo) {
            $errores[] = "Debes añadir un titulo";

        }

        if (!$precio) {
            $errores[] = "Debes añadir un precio";

        }

        if (!$descripcion) {
            $errores[] = "Debes añadir una descripcion";

        }

        if (!$cantidad) {
            $errores[] = "Debes añadir una cantidad";

        }

        if (!$vendedores_id) {
            $errores[] = "Elige un vendedor";

        }

        

        //Validar por tamaño (1MB)

        $medida = 1000 * 1000;
        if($imagen['size'] > $medida ){
            $errores[] = 'La imagen es muy pesada';

        }


        //echo "<pre>";
        //var_dump($errores);
        //echo "</pre>";

        //Revisar que el arreglo de errores este vacio

        if(empty($errores)) {

            //Crear carpeta
            $carpetaImagenes = '../../imagenes/';

            if(!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);
            }
            $nombreImagen = '';

            //Subida de archivos
            if($imagen['name']){
                
                //Eliminar imagen previa
                unlink($carpetaImagenes . $producto['imagen']  );

                //Generar nombre
                $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

            } else {
                $nombreImagen = $producto['imagen'];
            }

    

            // Subir imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen  );


            //Insertar en la base de datos
            $query = " UPDATE productos SET titulo = '${titulo}', precio = '${precio}', imagen = '${nombreImagen}', descripcion = '${descripcion}', cantidad = ${cantidad}, vendedores_id = ${vendedores_id} WHERE id = ${id}  ";
            
            //echo $query;
            

            $resultado = mysqli_query($db, $query);

            if($resultado) {
                //Redireccion

                header('Location: /admin?resultado=2');


            }



        }

        

    }
        
    require '../../includes/funciones.php';
    
    incluirTemplate('header');

?>

    <main class="contenedor seccion">
        <h1>Actualizar Producto</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>  
        <div class="alerta error">
            <?php echo $error; ?> 

        </div>    
        
        <?php endforeach; ?>

        <form class="formulario" method="POST"  enctype="multipart/form-data">
            <fieldset>
                <legend>Informacion General</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo Producto" value="<?php echo $titulo; ?>">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio Producto" value="<?php echo $precio; ?>"> 

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

                <img src="/imagenes/<?php echo $imagenProducto; ?>" class="imagen-small" >
                
                <label for="descripcion">Descripcion:</label>
                <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>


            </fieldset>

            <fieldset>
                <legend>Informacion Producto</legend>

                <label for="cantidad">Disponibilidad:</label>
                <input type="number" id="cantidad" name="cantidad" placeholder="Ej: 20" min="1" max="20" value="<?php echo $cantidad; ?>">


            </fieldset>

            <fieldset>

            <legend>Vendedor</legend> 

            

            <select name="vendedor">
            <option value="">Selecciona vendedor</option>
            <?php while($row = mysqli_fetch_assoc($resultado) ): ?>
                <option <?php echo $vendedores_id === $row['vendedores_id'] ? 'selected' : ''; ?> value="<?php echo $row['vendedores_id']; ?>"> <?php echo $row['nombre'] . " " . $row['apellido']; ?> </option>
        
            <?php endwhile; ?>    

            </select>
            </fieldset>

            <input type="submit" value="Actualizar Producto" class="boton boton-verde">


        </form>
    </main>

    
<?php
    incluirTemplate('footer');
?>   