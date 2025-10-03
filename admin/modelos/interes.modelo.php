<?php



require_once "conexion.php";

class ModeloInteresantes{
    /**Mostrar Cabezera */
    static public function mdlMostrarInteres($tabla, $item, $campo){
        if ($item != null) {

            $query = Conexion::start()->prepare("SELECT * FROM $tabla WHERE $campo = '$item'"); 
            $query->execute();
            return $query->fetch();
        }else{
            $query = Conexion::start()->prepare("SELECT * FROM $tabla"); 
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }        

        $query->close();
        $query = null;
    }
    /***
     * CREAR Cabezera
     */
    static public function mdIgresarInteres($tabla,$parametros){
        $col = implode(', ',array_keys($parametros));
        $valores = ":". implode(', :',array_keys($parametros)); 
        var_dump($col);           
        $query = Conexion::start()->prepare("INSERT INTO {$tabla} ({$col}) VALUES ({$valores})");
        if ($query->execute($parametros)) {
            return "ok";
        }else{
            return "error";
        }
        $query->close();
        $query = null;
    }
    /***
     * EDITAR Cabezera
     */
    static public function mdIEditarInteres($tabla, $parametros, $id){
    
        
        $col = implode(', ',array_map(function($col){
            return "{$col} =:{$col}";
        }, array_keys($parametros)));
       // var_dump($col);

        $query = Conexion::start()->prepare("UPDATE {$tabla} SET {$col} WHERE id =:id");
        $parametros['id']= $id;
        if ($query->execute($parametros)) {
            return "ok";
        }else{
            return "error";
        }
        $query->close();
        $query=null;
    }

    /**============================================
     * ELIMINAR Cabezera
     =========================================*/

     static public function MdlEliminarInteres($item, $campo, $tabla){
        $query = Conexion::start()->prepare("DELETE from {$tabla} WHERE $campo = '$item'");
        if ($query->execute()) {
            return "ok";
        }else{
            return "error";
        }
        $query->close();
        $query=null;
     }
}