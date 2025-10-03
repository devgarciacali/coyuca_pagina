<?php 
require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxUsuarios{
    /**========================
     * EDITAR USUARIO
     =========================*/

     public $idUsuario;
     public function ajaxEditarUsuario(){
        $campo = 'id';
        $item = $this->idUsuario; 
    

        $respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $campo);
        echo json_encode($respuesta);
     }

     public function ajaxEliminarUsuario(){
        $campo = 'id';
        $item = $this->idUsuario; 
        $tabla= 'usuarios';
        $respuesta = ModeloUsuarios::MdlEliminarUsuario($item, $campo, $tabla);
        return $respuesta;
     }
}

if(isset($_POST['idUsuario'])){
    $editar = new AjaxUsuarios();
    $editar-> idUsuario = $_POST['idUsuario'];
    $editar->ajaxEditarUsuario();
}

if(isset($_POST['eliminarUsuario'])){
    $eliminarUsuario = new AjaxUsuarios();
    $eliminarUsuario-> idUsuario = $_POST['eliminarUsuario'];
    $eliminarUsuario->ajaxEliminarUsuario();
}

