<?php
require_once 'admin/controladores/cabezera.controlador.php';
require_once 'admin/modelos/cabezera.modelo.php';
require_once 'admin/controladores/iconos.controlador.php';
require_once 'admin/modelos/iconos.modelo.php';
require_once 'admin/controladores/quejas.controlador.php';
require_once 'admin/modelos/quejas.modelo.php';
$campo = 'id';
$item = 11;
$respuesta = ControladorCabezera::ctrMostrarCabezera($item, $campo);

$campo_icono = 'id';
$item_icono = 1;
$respuesta_icono = ControladorIconos::ctrMostrarIcono($item_icono, $campo_icono)
?>
<!DOCTYPE html>
<html lang="es">
    
    <head>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        H. Ayuntaminto de Coyuca de Catalan
    </title>
 <!-- SweetAlert2 -->
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/sweetalert2/sweetalert2.all.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="icon" href="admin/<?= $respuesta_icono['icono'] ?>">
</head>

<body>
    <div class="container">
        <header>
            <hr>
            <div class="row">
                <div class="col-4">
                </div>
                <div class="col-4">
                    <img src="admin/<?= $respuesta['logo'] ?>" class="img-fluid">
                </div>
                <div class="col-4 text-muted text-end py-5">
                    <?= $respuesta['texto'] ?>
                </div>
            </div>
            <hr>
        </header>