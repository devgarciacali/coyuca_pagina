<?php 
require_once "../controladores/interes.controlador.php";
require_once "../modelos/interes.modelo.php";

class AjaxInteresantes{
    /**========================
     * EDITAR USUARIO
     =========================*/

     public $idInteres;
     public function ajaxEditarInteres(){
        $campo = 'id';
        $item = $this->idInteres; 
    

        $respuesta = ControladorInteresantes::ctrMostrarInteres($item, $campo);
        echo json_encode($respuesta);
     }

     public function ajaxEliminarInteres(){
        $campo = 'id';
        $item = $this->idInteres; 
        $tabla= 'sitios';
        $respuesta = ModeloInteresantes::MdlEliminarInteres($item, $campo, $tabla);
        return $respuesta;
     }
}

if(isset($_POST['idInteres'])){
    $editar = new AjaxInteresantes();
    $editar-> idInteres = $_POST['idInteres'];
    $editar->ajaxEditarInteres();
}

if(isset($_POST['eliminarInteres'])){
    $eliminarCabezera = new AjaxInteresantes();
    $eliminarCabezera-> idInteres = $_POST['eliminarInteres'];
    $eliminarCabezera->ajaxEliminarInteres();
}

