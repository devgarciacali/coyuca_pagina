<?php

class ControladorQuejas
{
    /**
     * MOSTRAR NOTICIAS
     */
    static public function ctrMostrarQuejas($item, $campo)
    {
        $tabla = 'quejas';
        $respuesta = ModeloQuejas::mdlMostrarQueja($tabla, $item, $campo);
        return $respuesta;
    }
    /**
     * CREAR NOTICIAS
     */
    static public function ctrCrearQuejas()
    {
        
                
        if (isset($_POST["nombre"])) {
            if (
                !empty($_POST['nombre']) && !empty($_POST['queja'])
                && !empty($_POST['correo'])
            ) {
                $tabla = 'quejas';                
                $parametros = [
                    'nombre' => $_POST['nombre'],
                    'queja' => $_POST['queja'],
                    'correo' => $_POST['correo'],                    
                ];
              
                $respuesta = ModeloQuejas::mdIgresarQueja($tabla, $parametros);
                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        type: "success",
                        title: "Guardado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location ="/coyuca";
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
                                window.location ="/coyuca";
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
                                window.location ="/coyuca";
                             }                        
                        });
                    </script>';
            }
        }
    }
}