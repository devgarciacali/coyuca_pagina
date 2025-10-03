<?php
require_once "conexion.php";

class ModeloQuejas{
    /**Mostrar NOTICIAS */
    static public function mdlMostrarQueja($tabla, $item, $campo){
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
     * CREAR NOTICIAS
     */
    static public function mdIgresarQueja($tabla,$parametros){
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
     * EDITAR NOTICIAS
     */
}