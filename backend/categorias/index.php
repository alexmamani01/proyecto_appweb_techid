<?php
/*Alexandra Mamani */
include '../../class/autoloaded.php';

if (isset($_POST['accion']) && $_POST['accion'] == "guardar"){
    $id = null;
    if (isset($_GET['update'])){
        $id = $_GET['id'];
    }
    $categoria = new categorias($id);
    $categoria->nombre = $_POST['nombre'];
    $categoria->guardar();
    header('Location: index.php');
    exit;
} else if (isset($_GET['add']) || isset($_GET['update'])){
    $id = null;
    if (isset($_GET['update'])){
        $id = $_GET['id'];
    }
    $categoria = new categorias($id);
    include './views/formulario_categorias.html';
    exit;
} else if (isset($_GET['delete'])){
    $categoria = new categorias($_GET['id']);
    $categoria->eliminar();
    header('Location: index.php');
    exit;
}

$lista_ctg = categorias::select();
include './views/lista_categorias.html';
