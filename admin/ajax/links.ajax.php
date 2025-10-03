<?php 
require_once "../controladores/links.controlador.php";
require_once "../modelos/links.modelo.php";

class AjaxLinks{
    /**========================
     * EDITAR NOTICIAS
     =========================*/

     public $idLink;
     public function ajaxEditarLink(){
        $campo = 'id';
        $item = $this->idLink; 
    

        $respuesta = ControladorLinks::ctrMostrarlink($item, $campo);
        echo json_encode($respuesta);
     }

     public function ajaxEliminarLink(){
        $campo = 'id';
        $item = $this->idLink; 
        $tabla= 'links';
        $respuesta = ModeloLinks::MdlEliminarLink($item, $campo, $tabla);
        return $respuesta;
     }
}

if(isset($_POST['idLink'])){
    $editar = new AjaxLinks();
    $editar-> idLink = $_POST['idLink'];
    $editar->ajaxEditarLink();
}

if(isset($_POST['eliminarLink'])){
    $eliminar = new AjaxLinks();
    $eliminar-> idLink = $_POST['eliminarLink'];
    $eliminar->ajaxEliminarLink();
}

