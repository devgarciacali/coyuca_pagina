<?php
session_start();
//definir tiempo mazimo de inatividad
$tiempo_max_inativo = 500;
// verficar si la session ha expirado
if (isset($_SESSION['actividad'])) {
    $tiempo_inactivo = time() - $_SESSION['actividad'];
    if ($tiempo_inactivo > $tiempo_max_inativo) {
        // si el tiempo inactivo excede el limite destruir la session
        // y redigir a logibn
        session_unset();
        session_destroy();
        header("Location:index.php");
        die();
    }
    $_SESSION['actividad'] = time();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrador Pagina coyuca</title>

    <!-- Custom fonts for this template-->
    <link href="vistas/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="vistas/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- SweetAlert2 -->
    <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
</head>

<body id="page-top">

    <?php
    if (!isset($_SESSION['usuario'])) {
    ?>

        <!-- Codigo del Login en Hmtl  si no esta logiado-->
        <div class="container">

            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block bg-login-image">

                                </div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Bienvenido!</h1>
                                        </div>
                                        <form class="user" method="post">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user"
                                                    placeholder="Ingresa tu usuario" name="usuario">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user"
                                                    placeholder="Contraseña" name="password">
                                            </div>
                                            <div class="form-group">

                                            </div>
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                Login
                                            </button>
                                            <?php
                                            $login = new ControladorUsuarios();
                                            $login->ctrIngresoUsuario();
                                            ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    <?php
        exit();
    } else {
    ?>
        <!-- Codigo del Panel si esta logiado -->

        <!-- Page Wrapper -->
        <div id="wrapper">
            <?php
            /**================================
             * MENU
         ==================================== */
            include 'modulos/menu.php';
            ?>
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">
                    <?php
                    /**================================
                     * CABECERA
                    ==================================== */
                    include 'modulos/cabezera.php';
                    /**================================
                     * CONTENIDO
                    ==================================== */
                    //include 'modulos/addusuarios.php';
                    //
                    //include 'modulos/usuarios.php';
                    ///
                    if (isset($_GET["ruta"])) {
                        if (
                            $_GET["ruta"] == "usuarios"||                          
                            $_GET["ruta"] == "header"||
                            $_GET["ruta"] == "inicio"||
                            $_GET["ruta"] == "noticias"||
                            $_GET["ruta"] == "sliders"||
                            $_GET["ruta"] == "interes"||
                            $_GET["ruta"] == "autor"||
                            $_GET["ruta"] == "links"||
                            $_GET["ruta"] == "iconos"||
                            $_GET["ruta"] == "quejas"||
                            $_GET["ruta"] == "sociales"

                        ) {
                            include 'modulos/' . $_GET["ruta"] . '.php';
                        } else {
                            include 'modulos/404.php';
                        }
                    } else {
                        include 'modulos/inicio.php';
                    }



                    /**================================
                     * FOOTER
                    ==================================== */
                    include 'modulos/footer.php';
                    ?>

                </div>
                <!-- End of Main Content -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->
    <?php
    }
    ?>


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="controladores/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vistas/vendor/jquery/jquery.min.js"></script>
    <script src="vistas/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vistas/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="vistas/js/sb-admin-2.min.js"></script>
    <script src="vistas/js/usuarios.js"></script>
    <script src="vistas/js/cabezera.js"></script>
    <script src="vistas/js/noticias.js"></script>
    <script src="vistas/js/sliders.js"></script>
    <script src="vistas/js/interes.js"></script>
    <script src="vistas/js/autores.js"></script>
    <script src="vistas/js/links.js"></script>
    <script src="vistas/js/iconos.js"></script>
    <script src="vistas/js/sociales.js"></script>
    
</body>

</html>