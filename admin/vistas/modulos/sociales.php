<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Administrar Redes Sociales</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">links</h6>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Facebook</th>
                            <th>Instagram</th>
                            <th>X</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Facebook</th>
                            <th>Instagram</th>
                            <th>X</th>
                            <th>Editar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $item = null;
                        $campo = null;

                        $sociales = ControladorSociales::ctrMostrarSocial($item, $campo);
                        foreach ($sociales as $social):
                            ?>
                            <tr>
                                <td><?= $social->id?></td>
                                <td><?= $social->lface ?></td>
                                <td><?= $social->linsta ?></td>
                                <td><?= $social->lex ?></td>
                                <td><button class="btn btn-warning btnEditarSocial" idSocial="<?= $social->id ?>"
                                        data-toggle="modal" data-target="#modalEditarSocial">
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


<!-- INICIAN LOS MODALES -->>

<!-- MODAL EDITAR NOTICIA -->

<div class="modal fade" id="modalEditarSocial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="user" method="post" enctype="multipart/form-data">
                <!-- CABEZA MODAL -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Sociales</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">❌</span>
                    </button>
                </div>
                <!-- TERMINA CABEZA MODAL -->

                <!-- CUERPO MODAL -->
                <div class="modal-body">
                    <div class="form-group row">
                        <!-- ENTRAD DE LA CABEZERA -->
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <label for="">Link del Facebook</label>
                            <input type="text" class="form-control form-control-user" name="editarface"
                                id="editarface" value="">
                            <input type="hidden" name="editarid" id="editarid" value="">
                        </div>
                        <!-- ENTRADA DESCRIPCION -->
                        <br>
                        <div class="col-sm-12 mb-3 mb-sm-0 py-3">
                            <label for="">Link del Instagram</label>
                            <input type="text" class="form-control form-control-user" name="editarinsta"
                                id="editarinsta" value="">
                        </div>
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <label for="">Link de X</label>
                            <input type="text" class="form-control form-control-user" name="editarlex"
                                id="editarlex" value="">
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
                $editarSocial = new ControladorSociales();
                $editarSocial->ctrEditarSocial();
                ?>
            <?php

            ?>
        </div>
    </div>
</div>
<!-- TEMINA MODAL EDITAR USUARIO -->