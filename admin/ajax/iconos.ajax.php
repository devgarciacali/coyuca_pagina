<?php 
require_once "../controladores/iconos.controlador.php";
require_once "../modelos/iconos.modelo.php";

class AjaxIconos{
    /**========================
     * EDITAR Iconos
     =========================*/

     public $idIcono;
     
     public function ajaxEditarIcono(){
        $campo = 'id';
        $item = $this->idIcono; 
        $respuesta = ControladorIconos::ctrMostrarIcono($item, $campo);
        echo json_encode($respuesta);
     }
}

if(isset($_POST['idIcono'])){
    $editar = new AjaxIconos();
    $editar-> idIcono = $_POST['idIcono'];
    $editar->ajaxEditarIcono();
}
