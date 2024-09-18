<?php
    
    // Base de datos

    require '../../includes/config/database.php';
    
    $db = conectarDB();


    // Consultar los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    
    //Arreglo con mensajes de errores
    $errores = [];

    $titulo = '';
    $precio = '';
    $descripcion = '';
    $cantidad = '';
    $vendedores_id = '';




    //Ejecutar el codigo que el usuario envia el formulario
    
    

    if($_SERVER['REQUEST_METHOD'] === 'POST') {




        //echo "<pre>";
        //var_dump($_POST);
        //echo "</pre>";

        echo "<pre>";
        var_dump($_FILES);
        echo "</pre>";

        

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

        if (!$imagen ['name'] || $imagen['error'] ) {
            $errores[] = "La imagen es obligatoria";

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


            //Subida de archivos

            //Crear carpeta
            $carpetaImagenes = '../../imagenes/';

            if(!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);

            }

            //Generar nombre
            $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";
            


            // Subir imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen  );

            

            

            //Insertar en la base de datos
            $query = " INSERT INTO productos ( titulo, precio, imagen, descripcion, creacion, cantidad, vendedores_id ) VALUES ('$titulo', '$precio', '$nombreImagen', '$descripcion', '$creacion', '$cantidad', '$vendedores_id' ) ";
            //echo $query;

            $resultado = mysqli_query($db, $query);

            if($resultado) {
                //Redireccion

                header('Location: /admin?resultado=1');


            }



        }

        

    }
        
    require '../../includes/funciones.php';
    
    incluirTemplate('header');

?>

    <main class="contenedor seccion">
        <h1>CREAR</h1>


        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>  
        <div class="alerta error">
            <?php echo $error; ?> 

        </div>    
        
        <?php endforeach; ?>

        <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
            <fieldset>
                <legend>Informacion General</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo Producto" value="<?php echo $titulo; ?>">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio Producto" value="<?php echo $precio; ?>"> 

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">
                
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

            <input type="submit" value="Crear Producto" class="boton boton-verde">


        </form>
    </main>

    
<?php
    incluirTemplate('footer');
?>   
