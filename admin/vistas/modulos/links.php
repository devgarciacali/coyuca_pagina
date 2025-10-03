<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Administrar red social y video</h1>

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
                            <th>link red social</th>
                            <th>Id del video de youtube</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>link red social</th>
                            <th>Id del video de youtube</th>
                            <th>Editar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $item = null;
                        $campo = null;

                        $links = ControladorLinks::ctrMostrarLink($item, $campo);
                        foreach ($links as $link):
                            ?>
                            <tr>
                                <td><?= $link->id ?></td>
                                <td><?= $link->rsocial ?></td>
                                <td><?= $link->livideo ?></td>
                                <td><button class="btn btn-warning btnEditarLink" idLink="<?= $link->id ?>"
                                        data-toggle="modal" data-target="#modalEditarLinks">
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

<!-- MODAL AGREGAR NOTICIA -->

<div class="modal fade" id="modalAgregarLinks" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="user" method="post" enctype="multipart/form-data">
                <!-- CABEZA MODAL -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Noticia</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!-- TERMINA CABEZA MODAL -->

                <!-- CUERPO MODAL -->
                <div class="modal-body">
                    <div class="form-group row">
                        <!-- ENTRADA DEL TITULO -->
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <input type="text" class="form-control form-control-user" name="rsocial"
                                placeholder="link de red social">
                        </div>
                        <!-- ENTRADA LINK YOUTUBE -->
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <input type="text" class="form-control form-control-user" name="livideo"
                                placeholder="link del video">
                        </div>
                    </div>
                </div>
                <!-- TERMINA CUERPO DEL MODAL -->

                <!-- PIE DEL MODAL -->
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Salir</button>
                    <button class="btn btn-success" type="submit">Guardar Noticia</button>
                </div>
                <!-- TERMINA PIE DEL MODAL -->
            </form>
            <?php
            $crearLink = new ControladorLinks();
            $crearLink->ctrCrearLink();
            ?>
        </div>
    </div>
</div>
<!-- TEMINA MODAL AGREGAR USUARIO -->

<!-- MODAL EDITAR NOTICIA -->

<div class="modal fade" id="modalEditarLinks" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="user" method="post" enctype="multipart/form-data">
                <!-- CABEZA MODAL -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Links</h5>
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
                            <label for="">Link de la red social</label>
                            <input type="text" class="form-control form-control-user" name="editarsocial"
                                id="editarsocial" value="">
                            <input type="hidden" name="editarid" id="editarid" value="">
                        </div>
                        <!-- ENTRADA DESCRIPCION -->
                        <br>
                        <div class="col-sm-12 mb-3">
                            <label class="py-3" for="">Coloque el id del video a modificar</label>
                            <input type="text" class="form-control form-control-user" name="editarvideo"
                                id="editarvideo" value="" placeholder="v=0qofKeGA3TQ">
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
                $editarLink = new ControladorLinks();
                $editarLink->ctrEditarLink();
                ?>
            <?php

            ?>
        </div>
    </div>
</div>
<!-- TEMINA MODAL EDITAR USUARIO -->