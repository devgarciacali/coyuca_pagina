<?php 
require_once "../controladores/cabezera.controlador.php";
require_once "../modelos/cabezera.modelo.php";

class AjaxCabezera{
    /**========================
     * EDITAR USUARIO
     =========================*/

     public $idCabezera;
     public function ajaxEditarCabezera(){
        $campo = 'id';
        $item = $this->idCabezera; 
    

        $respuesta = ControladorCabezera::ctrMostrarCabezera($item, $campo);
        echo json_encode($respuesta);
     }

     public function ajaxEliminarCabezera(){
        $campo = 'id';
        $item = $this->idCabezera; 
        $tabla= 'cabezera';
        $respuesta = ModeloCabezera::MdlEliminarCabezera($item, $campo, $tabla);
        return $respuesta;
     }
}

if(isset($_POST['idCabezera'])){
    $editar = new AjaxCabezera();
    $editar-> idCabezera = $_POST['idCabezera'];
    $editar->ajaxEditarCabezera();
}

if(isset($_POST['eliminarCabezera'])){
    $eliminarCabezera = new AjaxCabezera();
    $eliminarCabezera-> idCabezera = $_POST['eliminarCabezera'];
    $eliminarCabezera->ajaxEliminarCabezera();
}

