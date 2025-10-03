<?php

class ControladorNoticias
{
    /**
     * MOSTRAR NOTICIAS
     */
    static public function ctrMostrarNoticias($item, $campo)
    {
        $tabla = 'noticias';

        $respuesta = ModeloNoticias::mdlMostrarNoticias($tabla, $item, $campo);
        return $respuesta;
    }
    /**
     * CREAR NOTICIAS
     */
    static public function ctrCrearNoticias()
    {
        
                
        if (isset($_POST["titulo"])) {
            if (
                !empty($_POST['titulo']) && !empty($_POST['descripcion'])
                && !empty($_POST['fecha']) && !empty($_FILES['foto']['tmp_name'])
            ) {
                   

                    
                $directorio = 'vistas/img/fotonota';
                list($ancho, $alto) = getimagesize($_FILES['foto']["tmp_name"]);
                $nuevoancho =$ancho;
                $nuevoalto =$alto;
                
                $fotonota = ControladorNoticias::guardarimagen($_FILES['foto'],$directorio,$nuevoancho,$nuevoalto);
               
                $tabla = 'noticias';                
                $parametros = [
                    'titulo' => $_POST['titulo'],
                    'descripcion' => $_POST['descripcion'],
                    'foto' => $fotonota,
                    'fecha' => $_POST['fecha'],                    
                ];
              
                $respuesta = ModeloNoticias::mdIgresarNoticias($tabla, $parametros);
                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        type: "success",
                        title: "Noticia Guardado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location ="noticias";
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
                                window.location ="noticias";
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
                                window.location ="noticias";
                             }                        
                        });
                    </script>';
            }
        }
    }


    /**
     * ===========================================
     * EDITAR NOTICIAS
     * ===========================================
     */

    static public function ctrEditarNoticias()
    {       
        if (isset($_POST["editartitulo"])) {  
            
           
            
            
                $fotonota = $_POST["fotoactual"]; 
                
                if (isset($_FILES['editarnuevaFoto']['tmp_name']) && !empty($_FILES['editarnuevaFoto']['tmp_name'])) {
                    $directorio = 'vistas/img/fotonota';
                    list($ancho, $alto) = getimagesize($_FILES['editarnuevaFoto']["tmp_name"]);
                    $nuevoancho =$ancho;
                    $nuevoalto =$alto;
                    $fotonota = ControladorNoticias::guardarimagen($_FILES['editarnuevaFoto'],$directorio,$nuevoancho,$nuevoalto);
                }            
              
                $tabla = 'noticias';
                $id = $_POST['editarid'];              
                $parametros = [
                    'titulo' => $_POST['editartitulo'],
                    'descripcion' => $_POST['editardescripcion'],
                    'foto' => $fotonota,
                    'fecha' => $_POST['editarfecha'],                    
                ];
               
                $respuesta =  ModeloNoticias::mdIEditarNoticias($tabla, $parametros, $id);
                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        type: "success",
                        title: "Noticia Guardado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location ="noticias";
                             }                        
                        });
                    </script>';
                } else {
                    echo '<script>
                    swal({
                        type: "error",
                        title: "Noticis no se guardo",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location ="noticias";
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
