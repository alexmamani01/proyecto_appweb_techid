<?php
/*Alexandra Mamani */

class productos{
    public $id;
    public $nombre;
    public $descripcion;
    public $id_categoria;
    public $precio;
    public $imagen;

    private $exist=false;
    private $db;

    public function __construct($id=null){
          $this->db=new database();
            if($id !=null){
                $response=$this->db->select("productos", "id=?", array($id));
                if(isset($response[0]['id'])){
                    $this->id=$response[0]['id'];
                    $this->nombre=$response[0]['nombre'];
                    $this->descripcion=$response[0]['descripcion'];
                    $this->id_categoria=$response[0]['id_categoria'];
                    $this->precio=$response[0]['precio'];
                    $this->imagen=$response[0]['imagen'];
                    $this->exist=true;
                }
            }
    }

   public function mostrar(){ 
        echo "<pre>";
        print_r($this);
        echo "<pre>";
    }
    
    public function guardar(){
        if ($this->exist){
            return $this ->update();
        } else {
            return $this ->insert();
        }
    }

    public function eliminar(){
        return  $this->db->delete("productos", "id=?", array($this->id));
    }

    private function insertar(){
        $response=$this->db->insert(
            "productos",
            "nombre,descripcion, precio, imagen, id_categoria ",
            "?,?,?,?,?",
            array($this->nombre,$this->descripcion,$this->precio,$this->imagen,$this->id_categoria)
        );
        if($response){
            $this->id=$response;
            $this->exist=true;
            return true;
        } else {
            return false;
        }
    }

    private function actualizar(){
        return $this->db->update(
            "productos",
            "nombre=?, descripcion=?, precio=?, imagen =?, id_categoria=?",
            "id=?",
            array($this->nombre, $this->descripcion, $this->precio, $this->imagen, $this->id_categoria)
        );
    }

    static function select(){
        $db=new database();
        return $db->select("productos");
    }



 }