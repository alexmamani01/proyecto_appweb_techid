<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/*Alexandra Mamani */
include '../../class/autoloaded.php';


// Acción: Mostrar formulario para agregar producto
if (isset($_GET['add'])) {
    $lista_ctg = categorias::select();
    include './views/formulario_productos.html';
    exit;
}

// Acción: Eliminar producto
if (isset($_GET['eliminar'])) {
    $producto = new productos($_GET['eliminar']);
    $producto->eliminar();
    header('Location: index.php');
    exit;
}

// Acción: Guardar producto (nuevo o edición)
if (isset($_POST['accion']) && $_POST['accion'] == "guardar") {
    try {
    $miproducto = new productos();
    $miproducto->nombre = $_POST['nombre'] ?? '';
    $miproducto->descripcion = $_POST['descripcion'] ?? '';
    $miproducto->id_categoria = $_POST['id_categoria'] ?? null;
    $miproducto->precio = $_POST['precio'] ?? '';

    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        $uploadDir = __DIR__ . '/../../assets/img/productos/';
        $fileName = uniqid() . '_' . $_FILES['imagen']['name'];
        $targetPath = $uploadDir . $fileName;
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $targetPath)) {
            $miproducto->imagen = 'assets/img/productos/' . $fileName;
        } else {
            $miproducto->imagen = '';
        }
    } else {
        $miproducto->imagen = '';
    }
    $miproducto->guardar();
    } catch (Exception $e) {
        error_log($e->getMessage());
    }
    header('Location: index.php');
    exit;
    }

$lista_productos=productos::select();
include './views/lista_productos.html';

