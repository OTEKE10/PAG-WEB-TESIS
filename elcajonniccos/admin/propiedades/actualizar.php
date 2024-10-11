<?php

require '../../includes/funciones.php';
$auth = estaAutenticado();

if (!$auth) {
    header('Location: /');
}

// Validar la URL por ID válido
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: /admin');
}

// Base de datos
require '../../includes/config/database.php';
$db = conectarDB();

// Obtener los datos del producto
$consulta = "SELECT * FROM productos WHERE id = ${id}";
$resultadoProducto = mysqli_query($db, $consulta);
$producto = mysqli_fetch_assoc($resultadoProducto);

if (!$producto) {
    header('Location: /admin?error=producto_no_encontrado');
    exit;
}

// Consultar los vendedores
$consultaVendedores = "SELECT * FROM vendedores";
$resultadoVendedores = mysqli_query($db, $consultaVendedores);

// Arreglo con mensajes de errores
$errores = [];

$titulo = $producto['titulo'];
$precio = $producto['precio'];
$descripcion = $producto['descripcion'];
$cantidad = $producto['cantidad'];
$vendedores_id = $producto['vendedores_id'];
$imagenProducto = $producto['imagen'];

// Ejecutar el código cuando el usuario envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
    $precio = mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $cantidad = mysqli_real_escape_string($db, $_POST['cantidad']);
    $vendedores_id = mysqli_real_escape_string($db, $_POST['vendedor']);
    $creacion = date('Y/m/d');

    // Asignar files a una variable
    $imagen = $_FILES['imagen'];

    if (!$titulo) {
        $errores[] = "Debes añadir un título";
    }

    if (!$precio) {
        $errores[] = "Debes añadir un precio";
    }

    if (!$descripcion) {
        $errores[] = "Debes añadir una descripción";
    }

    if (!$cantidad) {
        $errores[] = "Debes añadir una cantidad";
    }

    if (!$vendedores_id) {
        $errores[] = "Elige un vendedor";
    }

    // Validar por tamaño (1MB)
    $medida = 1000 * 1000;
    if ($imagen['size'] > $medida) {
        $errores[] = 'La imagen es muy pesada';
    }

    // Revisar que el arreglo de errores esté vacío
    if (empty($errores)) {

        // Crear carpeta
        $carpetaImagenes = '../../imagenes/';

        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }

        $nombreImagen = '';

        // Subida de archivos
        if ($imagen['name']) {
            // Eliminar imagen previa
            unlink($carpetaImagenes . $producto['imagen']);

            // Generar nombre único para la imagen
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
        } else {
            $nombreImagen = $producto['imagen'];
        }

        // Subir imagen
        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);

        // Actualizar producto en la base de datos
        $query = "UPDATE productos SET titulo = '${titulo}', precio = '${precio}', imagen = '${nombreImagen}', descripcion = '${descripcion}', cantidad = ${cantidad}, vendedores_id = ${vendedores_id} WHERE id = ${id}";

        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            // Redireccionar
            header('Location: /admin?resultado=2');
        }
    }
}

incluirTemplate('header');

?>

<main class="contenedor seccion">
    <h1>Actualizar Producto</h1>

    <a href="/admin" class="btn btn-pink-outline">Volver</a>
    <br><br>

    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Información General</legend>

            <label for="titulo">Título:</label>
            <input class="form-control" type="text" id="titulo" name="titulo" placeholder="Título Producto" value="<?php echo $titulo; ?>">

            <label for="precio">Precio:</label>
            <input class="form-control" type="number" id="precio" name="precio" placeholder="Precio Producto" value="<?php echo $precio; ?>">

            <label for="imagen">Imagen:</label>
            <input class="form-control" type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">
            <img src="/imagenes/<?php echo $imagenProducto; ?>" class="imagen-small">

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Información del Producto</legend>

            <label for="cantidad">Disponibilidad:</label>
            <input class="form-control" type="number" id="cantidad" name="cantidad" placeholder="Ej: 20" min="1" max="20" value="<?php echo $cantidad; ?>">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>

            <select name="vendedor" class="form-select">
                <option value="">Selecciona vendedor</option>
                <?php while ($row = mysqli_fetch_assoc($resultadoVendedores)): ?>
                    <option <?php echo $vendedores_id === $row['vendedores_id'] ? 'selected' : ''; ?> value="<?php echo $row['vendedores_id']; ?>">
                        <?php echo $row['nombre'] . " " . $row['apellido']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </fieldset>

        <input type="submit" value="Actualizar Producto" class="btn btn-warning" id="btn-warning">
    </form>
</main>

<?php
incluirTemplate('footer');
?>
