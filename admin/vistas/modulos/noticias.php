<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Administrar Noticias</h1>
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalAgregarNoticias">
        Agregar Noticias
    </button>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lista de Noticias</h6>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Foto</th>
                            <th>Titulo</th>
                            <th>Descripcion</th>
                            <th>Fecha</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Foto</th>
                            <th>Titulo</th>
                            <th>Descripcion</th>
                            <th>Fecha</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $item = null;
                        $campo = null;

                        $noticias = ControladorNoticias::ctrMostrarNoticias($item, $campo);
                        foreach ($noticias as $noticia):
                            ?>
                            <tr>
                                <td><?= $noticia->id ?></td>
                                <td><img src="<?= $noticia->foto ?>" width="50px"></td>
                                <td><?= $noticia->titulo ?></td>
                                <td><?= $noticia->descripcion ?></td>
                                <td><?= $noticia->fecha ?></td>

                                <td><button class="btn btn-warning btnEditarNoticia" idNoticia="<?= $noticia->id ?>"
                                        data-toggle="modal" data-target="#modalEditarNoticia">
                                        Editar
                                    </button></td>
                                <td><button class="btn btn-danger btnEliminarNoticia"
                                        idNoticia="<?= $noticia->id ?>">Eliminar </button></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- INICIAN LOS MODALES -->

<!-- MODAL AGREGAR NOTICIA -->

<div class="modal fade" id="modalAgregarNoticias" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="user" method="post" enctype="multipart/form-data">
                <!-- CABEZA MODAL -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Nueva Noticia</h5>
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
                            <input type="text" class="form-control form-control-user" name="titulo"
                                placeholder="Titulo">
                        </div>
                        <!-- ENTRADA LINK -->
                        <div class="col-sm-12 py-3">
                            <textarea name="descripcion" id="" class="form-control form-control-user">
                                            Descripcion de la nota
                                            </textarea>
                        </div>

                        <div class="col-sm-6 py-3">
                            <input type="file" class="nuevafotonota form-control form-control-user" name="foto"
                                placeholder="Sube el logo">
                            <p>Peso maximo de la foto 2MB</p>
                            <img src="vistas/img/usuarios/default/anonimo.png" class="img-thumbail previsualizar"
                                width="100px">
                        </div>
                        <!-- ENTRADA codigo -->
                        <div class="col-sm-6 py-3">
                            <input type="date" class="form-control form-control-user" name="fecha">
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
            $crearNoticia = new ControladorNoticias();
            $crearNoticia->ctrCrearNoticias();
            ?>
        </div>
    </div>
</div>
<!-- TEMINA MODAL AGREGAR USUARIO -->

<!-- MODAL EDITAR NOTICIA -->

<div class="modal fade" id="modalEditarNoticia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="user" method="post" enctype="multipart/form-data">
                <!-- CABEZA MODAL -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Noticia</h5>
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
                            <input type="text" class="form-control form-control-user" name="editartitulo"
                                id="editartitulo" value="">
                            <input hidden type="text" name="editarid" id="editarid" value="">
                        </div>
                        <!-- ENTRADA DESCRIPCION -->
                        <div class="col-sm-12 py-3">
                            <input type="text" class="form-control form-control-user" name="editardescripcion"
                                id="editardescripcion" value="">
                        </div>
                        <!-- EDITAR FOTO -->
                        <div class="col-sm-6 py-3">
                            <input type="file" class="nuevafotonota form-control form-control-user"
                                name="editarnuevaFoto">
                            <p>Peso maximo de la foto 2MB</p>
                            <img src="vistas/img/usuarios/default/anonimo.png" class="img-thumbail previsualizar"
                                width="100px">
                            <input hidden type="text" name="fotoactual" id="fotoactual">
                        </div>
                        <!-- ENTRADA codigo -->
                        <div class="col-sm-6 py-3">
                            <input type="date" class="form-control form-control-user" name="editarfecha"
                                id="editarfecha" value="">
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
                $editarNoticia = new ControladorNoticias();
                $editarNoticia->ctrEditarNoticias();
                ?>
            </form>
            <?php

            ?>
        </div>
    </div>
</div>
<!-- TEMINA MODAL EDITAR USUARIO -->