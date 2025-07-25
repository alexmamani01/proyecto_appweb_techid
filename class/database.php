<?php
/*esta clase nos permite acceder a la base de datos, y hacer consultas */
require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();


class database{
    private $conexion;

    public function __construct(){
        /*PDO('mysql:host=xxx;dbname=xxx', 'username', 'password') */
        $dns=$_ENV['DB_DSN'];
        $username= $_ENV['DB_USERNAME'];
        $password=$_ENV['DB_PASSWORD'];
        try{
            $this->conexion= new PDO($dns,$username,$password);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conexion->exec("SET NAMES 'utf8mb4'");
        } catch (PDOException $e){
            die("Error de conexion: " . $e ->getMessage());
        }        
    }


    public function getConnection() {
        return $this->conexion;
    }


    public function select($table_name, $filtros = null, $order = null , $params = []){ 
        $query = "SELECT * FROM ".$table_name; 
        if ($filtros != null){
            $query .= " WHERE ".implode(" AND ", $filtros); 
        }
        if ($order != null && is_string($order)){
            $query .= " ORDER BY ".$order;
        }
        try {
            $resource = $this->conexion->prepare($query);
            $resource->execute();
            if (!$resource){
                echo "Revisar la consulta";
                echo "<pre>";
                print_r($resource);
                echo "</pre>";
                echo $query;
                return [];
            } else {
                $result = $resource->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }
        } catch (PDOException $e) {
            echo "Error en la consulta SELECT: " . $e->getMessage() . "<br>";
            echo "Consulta SQL: " . $query . "<br>";
            return []; // Devuelve un array vacío en caso de error
        }
     }
     

    public function delete($table_name, $filtros=null, $array_prepare=null){
        $query_delete = " DELETE FROM " . $table_name. " WHERE ".$filtros;
        $resource=$this->conexion->prepare($query_delete);
        if($resource->execute($array_prepare)){
            return true;
        } else {
            throw new Exception('No se puede realizar la consulta de eliminacion');
        }
    }


    public function update($table_name, $campos,$filtros, $array_prepare=null){
        $query_update= " UPDATE ". $table_name ." SET " .$campos ." WHERE ". $filtros;
        $resource=$this->conexion->prepare($query_update);
        if($resource->execute($array_prepare)){
            return true;
        } else {
            echo '<pre>';
            print_r($resource->errorInfo());
            echo '</pre>';
            throw new Exception("No se pudo realizar la consulta de update");
        }
     }
    public function insert($table_name,array $campos,array $values, $array_prepare=null){
        $query_insert= " INSERT INTO ". $table_name . " (" .implode(",", $campos).") VALUES (".implode(",", $values ).")";
        $resource=$this->conexion->prepare($query_insert);
        if($resource->execute($array_prepare)){
            return $this->conexion->lastInsertId();
        } else {
            echo '<pre>';
            print_r($resource->errorInfo());
            echo '</pre>';
            throw new Exception("No se pudo realizar la consulta de insert");
        }
    }
 }
 