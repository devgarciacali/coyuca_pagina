<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Administrar Foto de Icono</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Foto de Icono</h6>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Foto del Icono</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Foto del Icono</th>
                            <th>Editar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $item = null;
                        $campo = null;

                        $iconos = ControladorIconos::ctrMostrarIcono($item, $campo);
                        foreach ($iconos as $icono):
                            ?>
                            <tr>
                                <td><?= $icono->id ?></td>
                                <td><img src="<?= $icono->icono ?>" width="80px"></td>
                                <td><button class="btn btn-warning btnEditarIcono" idIcono="<?= $icono->id ?>"
                                        data-toggle="modal" data-target="#modalEditarIcono">
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

<!-- MODAL AGREGAR SLIDERS -->

<div class="modal fade" id="modalAgregarIconos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="user" method="post" enctype="multipart/form-data">
                <!-- CABEZA MODAL -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Foto Icono</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!-- TERMINA CABEZA MODAL -->

                <!-- CUERPO MODAL -->
                <div class="modal-body">
                    <div class="form-group row">
                        <!-- ENTRADA DEL TITULO -->

                        <div class="col-sm-6 py-3">
                            <input type="file" class="iconoft form-control form-control-user" name="icono"
                                placeholder="Sube foto autor">
                            <p>Peso maximo de la foto 2MB</p>
                            <img src="vistas/img/usuarios/default/anonimo.png" class="img-thumbail previsualizar"
                                width="100px">
                        </div>
                    </div>
                </div>
                <!-- TERMINA CUERPO DEL MODAL -->

                <!-- PIE DEL MODAL -->
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Salir</button>
                    <button class="btn btn-success" type="submit">Guardar Icono</button>
                </div>
                <!-- TERMINA PIE DEL MODAL -->
            </form>
            <?php
            $crearIconos = new ControladorIconos();
            $crearIconos->ctrCrearIcono();
            ?>
        </div>
    </div>
</div>
<!-- TEMINA MODAL AGREGAR Slider -->

<!-- MODAL EDITAR SLIDER -->

<div class="modal fade" id="modalEditarIcono" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="user" method="post" enctype="multipart/form-data">
                <!-- CABEZA MODAL -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cambiar Icono</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">❌</span>
                    </button>
                </div>
                <!-- TERMINA CABEZA MODAL -->

                <!-- CUERPO MODAL -->
                <div class="modal-body">
                    <div class="form-group row">
                        <!-- ENTRAD DE LA CABEZERA -->

                        <!-- EDITAR FOTO -->
                        <div class="col-sm-6 py-3">
                            <input type="file" class="autorFt form-control form-control-user" name="editaricono">
                            <p>Peso maximo de la foto 2MB</p>
                            <img src="vistas/img/usuarios/default/anonimo.png" class="img-thumbail previsualizar"
                                width="100px">
                            <input type="hidden" name="fotoactual" id="fotoactual">
                            <input type="hidden" name="editarid" id="editarid" value="">
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
            </form>
                <?php
                $editarIcono = new ControladorIconos();
                $editarIcono->ctrEditarIcono();
                ?>
            <?php

            ?>
        </div>
    </div>
</div>
<!-- TEMINA MODAL EDITAR USUARIO -->