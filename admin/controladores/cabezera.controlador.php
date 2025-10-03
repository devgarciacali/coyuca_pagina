<?php

class ControladorCabezera
{
    /**
     * MOSTRAR CABEZERA
     */
    static public function ctrMostrarCabezera($item, $campo)
    {
        $tabla = 'cabezera';

        $respuesta = ModeloCabezera::mdlMostrarCabezera($tabla, $item, $campo);
        return $respuesta;
    }
    /**
     * CREAR CABEZERA
     */
    static public function ctrCrearCabezera()
    {
        
                
        if (isset($_POST["titulo"])) {
            if (
                !empty($_POST['titulo']) && !empty($_POST['link'])
                && !empty($_POST['texto']) && !empty($_FILES['logo']['tmp_name'])
            ) {

                $directorio = 'vistas/img/logo';
                $nuevoalto =540;
                $nuevoancho =200;
                
                $logo = ControladorCabezera::guardarimagen($_FILES['logo'],$directorio,$nuevoancho,$nuevoalto);
               
                $tabla = 'cabezera';                
                $parametros = [
                    'titulo' => $_POST['titulo'],
                    'link' => $_POST['link'],
                    'logo' => $logo,
                    'texto' => $_POST['texto'],                    
                ];
                var_dump($parametros);
                
                $respuesta = ModeloCabezera::mdIgresarCabezera($tabla, $parametros);
                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        type: "success",
                        title: "Cabezera Guardado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location ="?ruta=header";
                             }                        
                        });
                    </script>';
                } else {
                    echo '<script>
                    swal({
                        type: "error",
                        title: "Cabezaera no se guardo",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location ="?ruta=header";
                             }                        
                        });
                    </script>';
                }

            } else {
                echo '<script>
                    swal({
                        type: "error",
                        title: "No deben quedar Campos Vacios",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location ="?ruta=header";
                             }                        
                        });
                    </script>';
            }
        }
    }


    /**
     * ===========================================
     * EDITAR CABEZERA
     * ===========================================
     */

    static public function ctrEditarCabezera()
    {       
        if (isset($_POST["editartitulo"])) {           
            
                  $logo = $_POST["fotoactual"]; 
                if (isset($_FILES['editarnuevaFoto']['tmp_name']) && !empty($_FILES['editarnuevaFoto'])) {
                    $directorio = 'vistas/img/logo';
                   
                    $nuevoancho = 540;
                    $nuevoalto = 200;

                    $logo = ControladorCabezera::guardarimagen($_FILES['editarnuevaFoto'],$directorio,$nuevoancho,$nuevoalto);

                }
               
                $tabla = 'cabezera';
                $id = $_POST['editarid'];              
                $parametros = [
                    'titulo' => $_POST['editartitulo'],
                    'link' => $_POST['editarlink'],
                    'logo' => $logo,
                    'texto' => $_POST['editartexto'],                    
                ];
               
                $respuesta =  ModeloCabezera::mdIEditarCabezera($tabla, $parametros, $id);
                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        type: "success",
                        title: "Usuario Guardado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location ="header";
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
                                window.location ="header";
                             }                        
                        });
                    </script>';
                }
           
        }
    }

    /***=================================================
     * 
     * FUNCION PARA PROCESAR Y GUARDAR IMAGENES
     *
      ===========================================================*/

    public static function guardarimagen($imagen, $directorio, $nuevoancho, $nuevoalto)
    {
        list($ancho, $alto) = getimagesize($imagen["tmp_name"]);

        /*
        ==============================================================
        creamos el directorio donde vamos a guardar la foto de usuario
        ==============================================================
        */
        if (!file_exists($directorio)) {
            mkdir($directorio, 0755);
        }


        /**
         * de acuerdo al tipo de imagen, recortamos
         */
        if ($imagen['type'] == 'image/jpeg') {
            /**
             * Guardamos la imagen en el directorio
             */

            $aleatorio = mt_rand(100, 999);
            $ruta = $directorio . '/' . $aleatorio . '.jpg';

            $origen = imagecreatefromjpeg($imagen['tmp_name']);
            $destino = imagecreatetruecolor($nuevoancho, $nuevoalto);

            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoancho, $nuevoalto, $ancho, $alto);
            imagejpeg($destino, $ruta);
        }
        if ($imagen['type'] == 'image/png') {
            /**
             * Guardamos la imagen en el directorio
             */

            $aleatorio = mt_rand(100, 999);
            $ruta = $directorio . '/' . $aleatorio . '.png';

            $origen = imagecreatefrompng($imagen['tmp_name']);
            $destino = imagecreatetruecolor($nuevoancho, $nuevoalto);

            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoancho, $nuevoalto, $ancho, $alto);
            imagepng($destino, $ruta);
        }
        return $ruta;
    }
}
