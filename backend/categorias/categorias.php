<?php

include '../../class/autoload.php';

if (isset($_POST['accion']) && $_POST['accion'] == "guardar"){
    $id = null;
    if (isset($_GET['update'])){
        $id = $_GET['id'];
    }
    $categoria = new categorias($id);
    $categoria->nombre = $_POST['nombre'];
    $categoria->guardar();
    header('Location: '.config::BASE_URL.'backend/categorias/');
} else if (isset($_GET['add']) || isset($_GET['update'])){
    $id = null;
    if (isset($_GET['update'])){
        $id = $_GET['id'];
    }
    $categoria = new categorias($id);
    include './view/formulario_categorias.html';
    die();
} else if (isset($_GET['delete'])){
    $categoria = new categorias($_GET['id']);
    $categoria->eliminar();
    header('Location: '.config::BASE_URL.'backend/categorias/');
}

$categorias = categorias::select();

include './view/home.html';