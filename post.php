<?php
include_once 'cabezera.php';
include_once 'menu.php';
include_once "admin/controladores/noticias.controlador.php";
include_once 'admin/modelos/noticias.modelo.php';

//recupero el id
$id = $_GET['id'];
$campo = 'id';
$respuesta = ControladorNoticias::ctrMostrarNoticias($id,$campo);

?>
<div class="container">
    <div class="row">
        <main class="col-md-8">
            <h4 class="bloc-title"><span class="span-title">Noticias</span></h4>
            <article>
                <div class="borde">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <br>
                            <img src="admin/<?=$respuesta['foto']?>" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?=$respuesta['titulo']?></h5>
                                <p class="card-text"><?=$respuesta['descripcion']?></p>
                                <p class="card-text"><small class="text-muted"><?=$respuesta['fecha']?></small></p>
                               <button class="btn btn-danger"><a href="../coyuca" style="color: white;">regresar</a></button>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </article>
        </main>
        <div class="col-md-1"></div>
        <?php

        include_once 'aside.php';
        include_once 'footer.php';
        ?>
