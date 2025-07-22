<?php
include 'class/autoloaded.php';
$lista_productos = productos::select();
$productos=productos::select();
$lista_ctg = categorias::select();
include 'views/home.html';


?>