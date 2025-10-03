<?php

class ControladorIconos
{
    /**
     * MOSTRAR Sliders
     */
    static public function ctrMostrarIcono($item, $campo)
    {
        $tabla = 'iconos';

        $respuesta = ModeloIconos::mdlMostrarIcono($tabla, $item, $campo);
        return $respuesta;
    }
    /**
     * CREAR Sliders
     */
    static public function ctrCrearIcono()
    {           
        if (isset($_FILES['icono'])) {
            if ( !empty($_FILES['icono']['tmp_name']) 
            ) {  
               
                $directorio = 'vistas/img/iconosfotos';                
                $nuevoancho =180;
                $nuevoalto =180;                
                $icono = ControladorIconos::guardarimagen($_FILES['icono'],$directorio,$nuevoancho,$nuevoalto);
                
                
                $tabla = 'iconos';                
                $parametros = [   
                    'icono' => $icono,                                      
                ];
              
                $respuesta = ModeloIconos::mdIgresarIcono($tabla, $parametros);
                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        type: "success",
                        title: "Foto Guardado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location ="iconos";
                             }                        
                        });
                    </script>';
                } else {
                    echo '<script>
                    swal({
                        type: "error",
                        title: "La noticia no se guardo",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location ="iconos";
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
                                window.location ="iconos";
                             }                        
                        });
                    </script>';
            }
        }
    }


    /**
     * ===========================================
     * EDITAR SLIDERS
     * ===========================================
     */

     static public function ctrEditarIcono()
    {       
        if (isset($_POST["fotoactual"])) {              
            
                $icono = $_POST["fotoactual"]; 
                $directorio = 'vistas/img/iconos';
                
                if (isset($_FILES['editaricono']['tmp_name']) && !empty($_FILES['editaricono']['tmp_name'])) {
                    $nuevoancho = 180;
                    $nuevoalto = 180;
                    $icono = ControladorAutores::guardarimagen($_FILES['editaricono'],$directorio,$nuevoancho,$nuevoalto);
                }                   
                $tabla = 'iconos';
                $id = $_POST['editarid'];              
                $parametros = [
                    'id' => $id,
                    'icono' => $icono                        
                ];
               
                $respuesta =  ModeloIconos::mdIEditarIcono($tabla, $parametros, $id);
                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        type: "success",
                        title: " Guardado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location ="iconos";
                             }                        
                        });
                    </script>';
                } else {
                    echo '<script>
                    swal({
                        type: "error",
                        title: " no se guardo",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location ="iconos";
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
