<?php

class ControladorUsuarios
{
    /**
     * MOSTRAR USUARIOS
     */
    static public function ctrMostrarUsuarios($item, $campo)
    {
        $tabla = 'usuarios';
        
        $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $campo);
        return $respuesta;
    }
    /**
     * CREAR USUARIOS
     */
    static public function ctrCrearUsuario()
    {
        $validos = "/^[a-z]+$/";
        $validos2 = "/^[a-zA-Z0-9]+$/";
        if (isset($_POST["usuario"])) {
            if (
                preg_match($validos, $_POST["usuario"]) &&
                preg_match($validos2, $_POST["password"])
            ) {
               
                //var_dump($_FILES['nuevaFoto']['tmp_name']);
                $ruta = "";
                if(isset($_FILES['nuevaFoto']['tmp_name'])){
                    list($ancho, $alto) = getimagesize($_FILES['nuevaFoto']['tmp_name']);
                    echo $ancho;
                    echo '<br>';
                    echo $alto;
                    $nuevo_ancho =500;
                    $nuevo_alto=500;
                    /*
                    ==============================================================
                    creamos el directorio donde vamos a guardar la foto de usuario
                    ==============================================================
                    */

                    $directorio = 'vistas/img/usuarios/'.$_POST['usuario'];
                    if(!file_exists($directorio)){
                        mkdir($directorio, 0755);
                    }
                    

                    /**
                     * de acuerdo al tipo de imagen, recortamos
                     */
                    if($_FILES['nuevaFoto']['type'] == 'image/jpeg'){
                        /**
                         * Guardamos la imagen en el directorio
                         */

                         $aleatorio = mt_rand(100, 999);
                         $ruta = 'vistas/img/usuarios/'.$_POST['usuario'].'/'.$aleatorio.'.jpg';

                         $origen = imagecreatefromjpeg($_FILES['nuevaFoto']['tmp_name']);
                         $destino = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);

                         imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
                         imagejpeg($destino, $ruta);

                    }
                    if($_FILES['nuevaFoto']['type'] == 'image/png'){
                        /**
                         * Guardamos la imagen en el directorio
                         */

                         $aleatorio = mt_rand(100, 999);
                         $ruta = 'vistas/img/usuarios/'.$_POST['usuario'].'/'.$aleatorio.'.png';

                         $origen = imagecreatefrompng($_FILES['nuevaFoto']['tmp_name']);
                         $destino = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);

                         imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
                         imagepng($destino, $ruta);

                    }
                    
                    
                }

                
                $tabla = 'usuarios';
                $encritar = md5($_POST["password"]);
                $parametros = [
                    'usuario' => $_POST['usuario'],
                    'ruta' => $ruta,
                    'password' => $encritar,
                    'estado' => $_POST['estado'],
                    'tipo' => $_POST['tipo']
                ];
                $respuesta =  ModeloUsuarios::mdIgresarUsuarios($tabla, $parametros);
                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        type: "success",
                        title: "Usuario Guardado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location ="usuarios";
                             }                        
                        });
                    </script>';
                } else {
                    echo '<script>
                    swal({
                        type: "error",
                        title: "Usuario no se guardo",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location ="usuarios";
                             }                        
                        });
                    </script>';
                }
            } else {
                echo '<script>
                    swal({
                        type: "error",
                        title: "Caracteres no valido, no se admiten mayusculas ni espacios",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location ="usuarios";
                             }                        
                        });
                    </script>'; 
            }
        }
    }
    /**=========================================
     * INGRESO DE USUARIO
     ===============================================*  */
    public function ctrIngresoUsuario()
    {
        $validos = "/^[a-z]+$/";
        $validos2 = "/^[a-zA-Z0-9]+$/";

        if (isset($_POST["usuario"])) {

            if (
                preg_match($validos, $_POST["usuario"]) &&
                preg_match($validos2, $_POST["password"])
            ) {
                $tabla = 'usuarios';
                $campo = 'usuario';
                $item = $_POST['usuario'];
                $encritar = md5($_POST["password"]);
                $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $campo);

                if ($respuesta['usuario'] == $item &&
                    $respuesta['password'] == $encritar) {

                    if ($respuesta['estado']) {
                        $_SESSION['usuario'] = $item;
                        $_SESSION['actividad'] = time();
                        $_SESSION['tipo']= $respuesta['tipo'];
                        $_SESSION['imagen']=$respuesta['ruta'];
                        header("Location:inicio");
                        exit();
                    } else{
                        echo '<script>
                    swal({
                        type: "error",
                        title: "Usuario inhabilitado",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                                                 
                        });
                    </script>';
                    }
                } else {
                    echo '<script>
                    swal({
                        type: "error",
                        title: "Usuario o contraseña incorrecta",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                                                 
                        });
                    </script>';
                }
            }
        }
    }

    /**
     * ===========================================
     * EDITAR USUARIO
     * ===========================================
     */

     static public function ctrEditarUsuario(){
        $validos = "/^[a-z]+$/";
        $validos2 = "/^[a-zA-Z0-9]+$/";
        if (isset($_POST["editarusuario"])) {
            if (
                preg_match($validos, $_POST["editarusuario"])
            ) {

                $ruta = $_POST["fotoactual"];
                if(isset($_FILES['editarnuevaFoto']['tmp_name']) && !empty($_FILES['editarnuevaFoto']['tmp_name'])){
                    list($ancho, $alto) = getimagesize($_FILES['editarnuevaFoto']['tmp_name']);

                    $nuevo_ancho =500;
                    $nuevo_alto=500;
                    /*
                    ==============================================================
                    creamos el directorio donde vamos a guardar la foto de usuario
                    ==============================================================
                    */

                    $directorio = 'vistas/img/usuarios/'.$_POST['editarusuario'];
                    if(!file_exists($directorio)){
                        mkdir($directorio, 0755);
                    }
                    

                    /**
                     * de acuerdo al tipo de imagen, recortamos
                     */
                    if($_FILES['editarnuevaFoto']['type'] == 'image/jpeg'){
                        /**
                         * Guardamos la imagen en el directorio
                         */

                         $aleatorio = mt_rand(100, 999);
                         $ruta = 'vistas/img/usuarios/'.$_POST['editarusuario'].'/'.$aleatorio.'.jpg';

                         $origen = imagecreatefromjpeg($_FILES['editarnuevaFoto']['tmp_name']);
                         $destino = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);

                         imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
                         imagejpeg($destino, $ruta);

                    }
                    if($_FILES['nuevaFoto']['type'] == 'image/png'){
                        /**
                         * Guardamos la imagen en el directorio
                         */

                         $aleatorio = mt_rand(100, 999);
                         $ruta = 'vistas/img/usuarios/'.$_POST['editarusuario'].'/'.$aleatorio.'.png';

                         $origen = imagecreatefrompng($_FILES['editarnuevaFoto']['tmp_name']);
                         $destino = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);

                         imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
                         imagepng($destino, $ruta);

                    }
                    
                    
                }

                if($_POST['editarpassword'] !=''){
                    if(preg_match($validos2, $_POST["editarpassword"])){
                        $encritar = md5($_POST["editarpassword"]);
                        
                    }else{
                        echo '<script>
                        swal({
                            type: "error",
                            title: "Caracteres no valido, no se admiten espacios",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                            }).then(function(result){
                                if(result.value){
                                    window.location ="usuarios";
                                 }                        
                            });
                        </script>'; 
                    }
                }else{
                    $encritar = $_POST['passwordActual'];
                }
                
                $tabla = 'usuarios';
                $id = $_POST['editarid'];
                $parametros = [
                    'usuario' => $_POST['editarusuario'],
                    'ruta' => $ruta,
                    'password' => $encritar,
                    'estado' => $_POST['editarestado'],
                    'tipo' => $_POST['editartipo']
                ];
                
                $respuesta =  ModeloUsuarios::mdIEdtarUsuarios($tabla, $parametros, $id);
                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        type: "success",
                        title: "Usuario Guardado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location ="usuarios";
                             }                        
                        });
                    </script>';
                } else {
                    echo '<script>
                    swal({
                        type: "error",
                        title: "Usuario no se guardo",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location ="usuarios";
                             }                        
                        });
                    </script>';
                }
            } else {
                echo '<script>
                    swal({
                        type: "error",
                        title: "Caracteres no valido, no se admiten mayusculas ni espacios",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location ="usuarios";
                             }                        
                        });
                    </script>'; 
            }
        }
     }
}
