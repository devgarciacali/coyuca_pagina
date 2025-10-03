<?php 
require_once "../controladores/autores.controlador.php";
require_once "../modelos/autores.modelo.php";

class AjaxAutores{
    /**========================
     * EDITAR NOTICIAS
     =========================*/

     public $idAutor;
     
     public function ajaxEditarAutor(){
        $campo = 'id';
        $item = $this->idAutor; 
        $respuesta = ControladorAutores::ctrMostrarAutor($item, $campo);
        echo json_encode($respuesta);
     }

     public function ajaxEliminarAutor(){
        $campo = 'id';
        $item = $this->idAutor; 
        $tabla= 'autores';
        $respuesta = ModeloAutores::MdlEliminarAutor($item, $campo, $tabla);
        return $respuesta;
     }
}

if(isset($_POST['idAutor'])){
    $editar = new AjaxAutores();
    $editar-> idAutor = $_POST['idAutor'];
    $editar->ajaxEditarAutor();
}

if(isset($_POST['eliminarAutor'])){
    $eliminar = new AjaxAutores();
    $eliminar-> idAutor = $_POST['eliminarAutor'];
    $eliminar->ajaxEliminarAutor();
}

