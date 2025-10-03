<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Administrar Cabezera</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lista de Cabezera</h6>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Titulo</th>
                            <th>Link</th>
                            <th>Logo</th>
                            <th>texto</th>
                            <th>Editar</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Titulo</th>
                            <th>Link</th>
                            <th>Logo</th>
                            <th>texto</th>
                            <th>Editar</th>

                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $item = null;
                        $campo = null;

                        $campos = ControladorCabezera::ctrMostrarCabezera($item, $campo);
                        foreach ($campos as $campo):
                            ?>
                            <tr>
                                <td><?= $campo->id ?></td>
                                <td><?= $campo->titulo ?></td>
                                <td><?= $campo->link ?></td>
                                <td><img src="<?= $campo->logo ?>" width="50px"></td>
                                <td><?= $campo->texto ?></td>

                                <td><button class="btn btn-warning btnEditarCabezera" idCabezera="<?= $campo->id ?>"
                                        data-toggle="modal" data-target="#modalEditarCebezera">
                                        Editar
                                    </button></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->


<!-- INICIAN LOS MODALES -->

<!-- MODAL AGREGAR CABEZARA -->

<div class="modal fade" id="modalAgregarCabezera" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="user" method="post" enctype="multipart/form-data">
                <!-- CABEZA MODAL -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Cabezera</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!-- TERMINA CABEZA MODAL -->

                <!-- CUERPO MODAL -->
                <div class="modal-body">
                    <div class="form-group row">
                        <!-- ENTRADA DEL TITULO -->
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" class="form-control form-control-user" name="titulo"
                                placeholder="Titulo">
                        </div>
                        <!-- ENTRADA LINK -->
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-user" name="link"
                                placeholder="Link de la red Social">
                        </div>

                        <div class="col-sm-6 py-3">
                            <input type="file" class="nuevoLogo form-control form-control-user" name="logo"
                                placeholder="Sube el logo">
                            <p>Peso maximo de la foto 2MB</p>
                            <img src="vistas/img/usuarios/default/anonimo.png" class="img-thumbail previsualizar"
                                width="100px">
                        </div>
                        <!-- ENTRADA codigo -->
                        <div class="col-sm-6 py-3">
                            <input type="text" class="form-control form-control-user" name="texto"
                                placeholder="Escribe tu codigo">
                        </div>
                    </div>
                </div>
                <!-- TERMINA CUERPO DEL MODAL -->

                <!-- PIE DEL MODAL -->
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Salir</button>
                    <button class="btn btn-success" type="submit">Guardar Cabezera</button>
                </div>
                <!-- TERMINA PIE DEL MODAL -->
            </form>
            <?php
            $crearCabezera = new ControladorCabezera();
            $crearCabezera->ctrCrearCabezera();
            ?>
        </div>
    </div>
</div>
<!-- TEMINA MODAL AGREGAR cabezera -->

<!-- MODAL EDITAR CABEZERA -->

<div class="modal fade" id="modalEditarCebezera" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="user" method="post" enctype="multipart/form-data">
                <!-- CABEZA MODAL -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Cabezera</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">❌</span>
                    </button>
                </div>
                <!-- TERMINA CABEZA MODAL -->

                <!-- CUERPO MODAL -->
                <div class="modal-body">
                    <div class="form-group row">
                        <!-- ENTRAD DE LA CABEZERA -->
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" class="form-control form-control-user" name="editartitulo"
                                id="editartitulo" value="">
                            <input type="hidden" name="editarid" id="editarid" value="">
                        </div>
                        <!-- ENTRADA LINK -->
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-user" name="editarlink" id="editarlink"
                                value="">
                        </div>

                        <div class="col-sm-6 py-3">
                            <input type="file" class="nuevaFoto form-control form-control-user" name="editarnuevaFoto">
                            <p>Peso maximo de la foto 2MB</p>
                            <img src="vistas/img/usuarios/default/anonimo.png" class="img-thumbail previsualizar"
                                width="100px">
                            <input type="hidden" name="fotoactual" id="fotoactual">
                        </div>
                        <!-- ENTRADA codigo -->
                        <div class="col-sm-6 py-3">
                            <input type="text" class="form-control form-control-user" name="editartexto"
                                id="editartexto" value="">
                        </div>
                    </div>
                </div>
                <!-- TERMINA CUERPO DEL MODAL -->

                <!-- PIE DEL MODAL -->
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Salir</button>
                    <button class="btn btn-success" type="submit">Guardar Cambios</button>
                </div>
                <!-- TERMINA PIE DEL MODAL -->
                <?php
                $editarCabezera = new ControladorCabezera();
                $editarCabezera->ctrEditarCabezera();
                ?>
            </form>
            <?php

            ?>
        </div>
    </div>
</div>
<!-- TEMINA MODAL EDITAR USUARIO -->