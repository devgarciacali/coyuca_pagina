<?php

class ControladorSociales
{
    /**
     * MOSTRAR NOTICIAS
     */
    static public function ctrMostrarSocial($item, $campo)
    {
        $tabla = 'sociales';

        $respuesta = ModeloSociales::mdlMostrarSocial($tabla, $item, $campo);
        return $respuesta;
    }
    /**
     * CREAR NOTICIAS
     */
    // static public function ctrCrearLink()
    // {
        
                
    //     if (isset($_POST["rsocial"])) {
    //         if (
    //             !empty($_POST['rsocial']) && !empty($_POST['livideo'])
    //         ) {
                   
    //             $tabla = 'links';                
    //             $parametros = [
    //                 'rsocial' => $_POST['rsocial'],
    //                 'livideo' => $_POST['livideo'],                  
    //             ];
              
    //             $respuesta = ModeloLinks::mdIgresarLink($tabla, $parametros);
    //             if ($respuesta == "ok") {
    //                 echo '<script>
    //                 swal({
    //                     type: "success",
    //                     title: "Links Guardado correctamente",
    //                     showConfirmButton: true,
    //                     confirmButtonText: "Cerrar"
    //                     }).then(function(result){
    //                         if(result.value){
    //                             window.location ="links";
    //                          }                        
    //                     });
    //                 </script>';
    //             } else {
    //                 echo '<script>
    //                 swal({
    //                     type: "error",
    //                     title: "La noticia no se guardo",
    //                     showConfirmButton: true,
    //                     confirmButtonText: "Cerrar"
    //                     }).then(function(result){
    //                         if(result.value){
    //                             window.location ="links";
    //                          }                        
    //                     });
    //                 </script>';
    //             }

    //         } else {
    //             echo '<script>
    //                 swal({
    //                     type: "error",
    //                     title: "No deben quedar Campos Vacios",
    //                     showConfirmButton: true,
    //                     confirmButtonText: "Cerrar"
    //                     }).then(function(result){
    //                         if(result.value){
    //                             window.location ="links";
    //                          }                        
    //                     });
    //                 </script>';
    //         }
    //     }
    // }


    /**
     * ===========================================
     * EDITAR NOTICIAS
     * ===========================================
     */

    static public function ctrEditarSocial()
    {       
        if (isset($_POST["editarface"])) {  
              
                $tabla = 'sociales';
                $id = $_POST['editarid'];              
                $parametros = [
                    'lface' => $_POST['editarface'],
                    'linsta' => $_POST['editarinsta'],
                    'lex' => $_POST['editarlex'],
                             
                ];
               
                $respuesta =  ModeloSociales::mdIEditarSocial($tabla, $parametros, $id);
                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        type: "success",
                        title: "Links Guardado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location ="sociales";
                             }                        
                        });
                    </script>';
                } else {
                    echo '<script>
                    swal({
                        type: "error",
                        title: "Links no se guardo",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location ="sociales";
                             }                        
                        });
                    </script>';
                }
           
        }
    }
}