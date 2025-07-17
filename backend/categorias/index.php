<?php
/*$nombre="Monitores";
$id=1;
$precio=100.000;

echo $nombre."<br>";
echo $id."<br>";
echo $precio."<br>";

for ($i=0;$i<10;$i++) {
    echo "el valor de i es" .$i;
    echo "<br>";
}

$i=0;
while ($i<10){
    echo"El valor de i es".$i ."<br>";
    $i++;
} */
/*
$categorias= array(
    "0"=>array(
        "nombre"=>"Monitores",
        "id"=>1,
        "nivel"=>1,
    ),

    "1"=>array(
        "nombre"=>"Teclados", 
        "id"=>2,
        "nivel"=>2,
    ),

    "2"=>array(
        "nombre"=>"Audio",
        "id"=>3,
        "nivel"=>3,
    ),

    "3"=>array(
        "nombre"=>"Microprocesadores",
        "id"=>4,
        "nivel"=>4,
    ),

);

foreach($categorias as $categorias){
    echo "Id: ".$categorias["id"]." - Nombre: ".$categorias["nombre"]." <br> ";
}
;
*/


include '../../class/database.php';
include '../../class/categorias.php';

$categorias=categorias::select();
include '../../home.html';