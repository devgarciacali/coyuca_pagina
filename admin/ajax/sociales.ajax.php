<?php 
require_once "../controladores/sociales.controlador.php";
require_once "../modelos/sociales.modelo.php";

class AjaxSociales{
    /**========================
     * EDITAR NOTICIAS
     =========================*/

     public $idSocial;
     public function ajaxEditarSocial(){
        $campo = 'id';
        $item = $this->idSocial; 
    

        $respuesta = ControladorSociales::ctrMostrarSocial($item, $campo);
        echo json_encode($respuesta);
     }
}

if(isset($_POST['idSocial'])){
    $editar = new AjaxSociales();
    $editar-> idSocial = $_POST['idSocial'];
    $editar->ajaxEditarSocial();
}

