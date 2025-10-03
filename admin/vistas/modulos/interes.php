<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Administrar Sitios</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lista de sitios de interes</h6>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Link</th>
                            <th>Foto del sitio</th>
                            <th>Editar</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Link</th>
                            <th>Foto del sitio</th>
                            <th>Editar</th>

                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $item = null;
                        $campo = null;

                        $interesantes = ControladorInteresantes::ctrMostrarInteres($item, $campo);
                        foreach ($interesantes as $interes):
                            ?>
                            <tr>
                                <td><?= $interes->id ?></td>
                                <td><?= $interes->rut ?></td>
                                <td><img src="<?= $interes->fotosit ?>" width="50px"></td>
                                <td><button class="btn btn-warning btnEditarInteres" idInteres="<?= $interes->id ?>"
                                        data-toggle="modal" data-target="#modalEditarInteres">
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

<div class="modal fade" id="modalAgregarInteres" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="user" method="post" enctype="multipart/form-data">
                <!-- CABEZA MODAL -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Sitio de interes</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!-- TERMINA CABEZA MODAL -->

                <!-- CUERPO MODAL -->
                <div class="modal-body">
                    <div class="form-group row">
                        <!-- ENTRADA LINK -->
                        <div class="col-sm-6 py-3">
                            <input type="text" class="form-control form-control-user" name="rut"
                                placeholder="Link de la red Social">
                        </div>

                        <div class="col-sm-6 py-3">
                            <input type="file" class="nuevointeres form-control form-control-user" name="fotosit"
                                placeholder="Sube el logo">
                            <p>Peso maximo de la foto 2MB</p>
                            <img src="vistas/img/usuarios/default/anonimo.png" class="previsualizar img-thumbail"
                                width="100px">
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
            $crearInteres = new ControladorInteresantes();
            $crearInteres->ctrCrearInteres();
            ?>
        </div>
    </div>
</div>
<!-- TEMINA MODAL AGREGAR cabezera -->

<!-- MODAL EDITAR CABEZERA -->

<div class="modal fade" id="modalEditarInteres" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="user" method="post" enctype="multipart/form-data">
                <!-- CABEZA MODAL -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Sitio de interes</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">❌</span>
                    </button>
                </div>
                <!-- TERMINA CABEZA MODAL -->

                <!-- CUERPO MODAL -->
                <div class="modal-body">
                    <div class="form-group row">
                        <!-- ENTRAD DE LA CABEZERA -->
                        <div class="col-sm-6 py-3">
                            <input type="text" class="form-control form-control-user" name="editarut"
                                id="editarut" value="">
                            <input type="hidden" name="editarid" id="editarid" value="">
                        </div>

                        <div class="col-sm-6 py-3">
                            <input type="file" class="nuevointeres form-control form-control-user" name="editarinteres">
                            <p>Peso maximo de la foto 2MB</p>
                            <img src="vistas/img/usuarios/default/anonimo.png" class="previsualizar img-thumbail"
                                width="100px">
                            <input type="hidden" name="fotoactual" id="fotoactual">
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
                $editarInteres= new ControladorInteresantes();
                $editarInteres->ctrEditarInteres();
                ?>
            <?php

            ?>
        </div>
    </div>
</div>
<!-- TEMINA MODAL EDITAR USUARIO -->