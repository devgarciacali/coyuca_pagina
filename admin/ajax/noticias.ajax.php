<?php 
require_once "../controladores/noticias.controlador.php";
require_once "../modelos/noticias.modelo.php";

class AjaxNoticias{
    /**========================
     * EDITAR NOTICIAS
     =========================*/

     public $idNoticia;
     public function ajaxEditarNoticias(){
        $campo = 'id';
        $item = $this->idNoticia; 
    

        $respuesta = ControladorNoticias::ctrMostrarNoticias($item, $campo);
        echo json_encode($respuesta);
     }

     public function ajaxEliminarNoticias(){
        $campo = 'id';
        $item = $this->idNoticia; 
        $tabla= 'noticias';
        $respuesta = ModeloNoticias::MdlEliminarNoticias($item, $campo, $tabla);
        return $respuesta;
     }
}

if(isset($_POST['idNoticia'])){
    $editar = new AjaxNoticias();
    $editar-> idNoticia = $_POST['idNoticia'];
    $editar->ajaxEditarNoticias();
}

if(isset($_POST['eliminarNoticia'])){
    $eliminar = new AjaxNoticias();
    $eliminar-> idNoticia = $_POST['eliminarNoticia'];
    $eliminar->ajaxEliminarNoticias();
}

