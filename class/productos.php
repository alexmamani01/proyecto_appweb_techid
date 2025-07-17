<?php
class productos{
    public $id;
    public $nombre;
    public $descripcion;
    public $id_categoria;
    public $precio;
    public $imagen;

    private $exist=false;
    private $db

    public function __construct($id=null){
            $db=new database("mysql", "miproyecto", "root", "baro2461m!");
            if($id !=null){
                $response=$this->$db->select("productos", "id=?", array($id));
                if(isset($response[0]['id'])){
                    $this->$id=$response[0]['id'];
                    $this->$nombre=$response[0]['nombre'];
                    $this->$descripcion=$response[0]['descripcion'];
                    $this->$id_categoria=$response[0]['id_categoria'];
                    $this->$precio=$response[0]['precio'];
                    $this->$imagen=$response[0]['imagen'];
                }
            }
    }


}