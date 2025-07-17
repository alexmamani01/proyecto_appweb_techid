<?php 
class categorias{
    public $id;
    public $nombre;

    public function __construct($id=null, $nombre=null){
        if($id!=null){
            $temp = self::select($id);
            if (!empty($temp)){
                $this->id = $temp[0]['id'];
                $this->nombre = $temp[0]['nombre'];
                $this->_exists = true;
                 }
             }  
         }
    public function guardar(){
        $db = new database();
        if ($this->_exists){
            return $db->update("categorias", "nombre=?", "id=?",
                        array(trim($this->nombre), $this->id));
        } else {
            return $db->insert("categorias", array("nombre"), array("?"), array(trim($this->nombre)));
        }
    }
    
    public function eliminar() {
        $db = new database();
        return $db->delete("categorias", "id = ?", array($this->id));
    }

    static public function select(){
        $db=new database("mysql", "miproyecto", "root", "baro2461m!");
        $categorias=$db->select("categorias");
        echo "<pre>";
        print_r($categorias);
        echo "<pre>";
        return $categorias;
    }
     

     static public function validar($nombre){
        if (trim($nombre) == '' || strlen($nombre) < 3){  
            return false;
        }
        return true;
      }
  }