<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Administrar Foto del Presidente</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Foto del presidente</h6>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Foto del Presidente</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Foto del Presidente</th>
                            <th>Editar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $item = null;
                        $campo = null;

                        $autores = ControladorAutores::ctrMostrarAutor($item, $campo);
                        foreach ($autores as $autor):
                            ?>
                            <tr>
                                <td><?= $autor->id ?></td>
                                <td><img src="<?= $autor->fotoautor ?>" width="80px"></td>
                                <td><button class="btn btn-warning btnEditarAutor" idAutor="<?= $autor->id ?>"
                                        data-toggle="modal" data-target="#modalEditaridAutor">
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

<div class="modal fade" id="modalAgregarAutor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="user" method="post" enctype="multipart/form-data">
                <!-- CABEZA MODAL -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Foto Autor</h5>
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
                            <input type="file" class="autorFt form-control form-control-user" name="fotoautor"
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
                    <button class="btn btn-success" type="submit">Guardar foto Autor</button>
                </div>
                <!-- TERMINA PIE DEL MODAL -->
            </form>
            <?php
            $crearAutor = new ControladorAutores();
            $crearAutor->ctrCrearAutor();
            ?>
        </div>
    </div>
</div>
<!-- TEMINA MODAL AGREGAR Slider -->

<!-- MODAL EDITAR SLIDER -->

<div class="modal fade" id="modalEditaridAutor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="user" method="post" enctype="multipart/form-data">
                <!-- CABEZA MODAL -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cambiar foto autor</h5>
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
                            <input type="file" class="autorFt form-control form-control-user" name="editarnuevoautor">
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
                $editarFoto = new ControladorAutores();
                $editarFoto->ctrEditarAutor();
                ?>
            <?php

            ?>
        </div>
    </div>
</div>
<!-- TEMINA MODAL EDITAR USUARIO -->