<?php

class autoload{
    
    static public function autocarga($clase){
        $base = __DIR__.DIRECTORY_SEPARATOR;
        $class = array();
        $class['categorias'] = $base."categorias.php";
        $class['productos'] = $base."productos.php";
        $class['database'] = $base."database.php";
        
        if (isset($class[$clase])){
            include $class[$clase];
        } else {
            die("No se ha definido la clase ".$clase);
        }
    }
}

spl_autoload_register("autoload::autocarga");