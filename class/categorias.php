<?php 
/*Alexandra Mamani */

class categorias{
    public $id;
    public $nombre;

    private $db;
    private $exist=false;

   public function __construct($id=null){
      $this->db=new database();
        if($id !=null){
            $response=$this->db->select("categorias", ["id=?"], [$id]);
            if(isset($response[0]['id'])){
                $this->id=$response[0]['id'];
                $this->nombre=$response[0]['nombre']; 
                $this->exist=true;
            }
        }
    }
    public function guardar(){
        $db = new database();
        if ($this->exist){
            return $db->update("categorias", "nombre=?", "id=?", 
                                 [trim($this->nombre), $this->id])
                       ;
        } else {
            return $db->insert("categorias",['nombre'], array("?"), array(trim($this->nombre)));
        }
    }
    
    public function eliminar() {
        $db = new database();
        return $db->delete("categorias", "id = ?", array($this->id));
    }

    static public function select(){
        $db=new database();
        return $db->select("categorias");
    }
     

     static public function validar($nombre){
        if (trim($nombre) == '' || strlen($nombre) < 3){  
            return false;
        }
        return true;
      }
  }