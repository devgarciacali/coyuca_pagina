<?php

class ControladorAutores
{
    /**
     * MOSTRAR Sliders
     */
    static public function ctrMostrarAutor($item, $campo)
    {
        $tabla = 'autores';

        $respuesta = ModeloAutores::mdlMostrarAutor($tabla, $item, $campo);
        return $respuesta;
    }
    /**
     * CREAR Sliders
     */
    static public function ctrCrearAutor()
    {           
        if (isset($_FILES['fotoautor'])) {
            if ( !empty($_FILES['fotoautor']['tmp_name']) 
            ) {  
               
                $directorio = 'vistas/img/fotosautores';                
                $nuevoancho =470;
                $nuevoalto =470;                
                $fotoautor = ControladorAutores::guardarimagen($_FILES['fotoautor'],$directorio,$nuevoancho,$nuevoalto);
                
                
                $tabla = 'autores';                
                $parametros = [   
                    'fotoautor' => $fotoautor,                                      
                ];
              
                $respuesta = ModeloAutores::mdIgresarAutor($tabla, $parametros);
                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        type: "success",
                        title: "Foto Guardado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location ="autor";
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
                                window.location ="autor";
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
                                window.location ="autor";
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

     static public function ctrEditarAutor()
    {       
        if (isset($_POST["fotoactual"])) {              
            
                $fotoautor = $_POST["fotoactual"]; 
                $directorio = 'vistas/img/fotosautores';
                
                if (isset($_FILES['editarnuevoautor']['tmp_name']) && !empty($_FILES['editarnuevoautor']['tmp_name'])) {
                    $nuevoancho = 470;
                    $nuevoalto = 470;
                    $fotoautor = ControladorAutores::guardarimagen($_FILES['editarnuevoautor'],$directorio,$nuevoancho,$nuevoalto);
                }                   
                $tabla = 'autores';
                $id = $_POST['editarid'];              
                $parametros = [
                    'id' => $id,
                    'fotoautor' => $fotoautor                        
                ];
               
                $respuesta =  ModeloAutores::mdIEditarAutor($tabla, $parametros, $id);
                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        type: "success",
                        title: " Guardado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location ="autor";
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
                                window.location ="autor";
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
