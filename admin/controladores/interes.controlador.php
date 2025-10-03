<?php

class ControladorInteresantes
{
    /**
     * MOSTRAR CABEZERA
     */
    static public function ctrMostrarInteres($item, $campo)
    {
        $tabla = 'sitios';

        $respuesta = ModeloInteresantes::mdlMostrarInteres($tabla, $item, $campo);
        return $respuesta;
    }
    /**
     * CREAR CABEZERA
     */
    static public function ctrCrearInteres()
    {
        
                
        if (isset($_POST["rut"])) {
            if (
                !empty($_POST['rut']) 
                && !empty($_FILES['fotosit']['tmp_name'])
            ) {

                $directorio = 'vistas/img/interes';
                $nuevoalto =180;
                $nuevoancho =180;
                
                $fotosit = ControladorInteresantes::guardarimagen($_FILES['fotosit'],$directorio,$nuevoancho,$nuevoalto);
               
                $tabla = 'sitios';                
                $parametros = [
                    'rut' => $_POST['rut'],  
                    'fotosit' => $fotosit,                
                ];
                var_dump($parametros);
                
                $respuesta = ModeloInteresantes::mdIgresarInteres($tabla, $parametros);
                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        type: "success",
                        title: "Cabezera Guardado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location ="?ruta=interes";
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
                                window.location ="?ruta=interes";
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
                                window.location ="?ruta=interes";
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

    static public function ctrEditarInteres()
    {       
        if (isset($_POST["editarut"])) {           
            
                  $interes = $_POST["fotoactual"]; 
                  if (isset($_FILES['editarinteres']['tmp_name']) && !empty($_FILES['editarinteres'])) {
                    $directorio = 'vistas/img/interes';
                   
                   
                    $nuevoancho = 180;
                    $nuevoalto = 180;

                    $interes = ControladorInteresantes::guardarimagen($_FILES['editarinteres'],$directorio,$nuevoancho,$nuevoalto);

                }
               
                $tabla = 'sitios';
                $id = $_POST['editarid'];              
                $parametros = [
                    'rut' => $_POST['editarut'],
                    'fotosit' => $interes               
                ];
               
                $respuesta =  ModeloInteresantes::mdIEditarInteres($tabla, $parametros, $id);
                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        type: "success",
                        title: "Sitio de Interes Guardado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location ="interes";
                             }                        
                        });
                    </script>';
                } else {
                    echo '<script>
                    swal({
                        type: "error",
                        title: "ineteres no se guardo",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location ="interes";
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
