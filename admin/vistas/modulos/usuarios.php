                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Administrar Usuarios</h1>
                    <button class="btn btn-primary mb-3" data-toggle="modal"
                        data-target="#modalAgregarUsuarios">
                        Agregar Usuario
                    </button>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Lista de Usuarios</h6>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Foto</th>
                                            <th>Usuario</th>
                                            <th>Tipo</th>
                                            <th>Estado</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Foto</th>
                                            <th>Usuario</th>
                                            <th>Tipo</th>
                                            <th>Estado</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $item = null;
                                        $campo = null;

                                        $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $campo);
                                        foreach ($usuarios as $usuario):
                                        ?>
                                            <tr>
                                                <td><?= $usuario->id ?></td>
                                                <td><img src="<?= $usuario->ruta ?>" width="50px"></td>
                                                <td><?= $usuario->usuario ?></td>
                                                <td><?= $usuario->tipo ?></td>
                                                <td><?= $usuario->estado ?"Activo":"No activo"; ?></td>
                                                <td><button class="btn btn-warning btnEditarUsuario" idUsuario="<?= $usuario->id ?>" data-toggle="modal" data-target="#modalEditarUsuarios">
                                                        Editar
                                                    </button></td>
                                                <td><button class="btn btn-danger btnEliminarUsuario" idUsuario="<?= $usuario->id ?>">Eliminar </button></td>
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

                <!-- MODAL AGREGAR USUARIO -->

                <div class="modal fade" id="modalAgregarUsuarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form class="user" method="post" enctype="multipart/form-data">
                                <!-- CABEZA MODAL -->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <!-- TERMINA CABEZA MODAL -->

                                <!-- CUERPO MODAL -->
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <!-- ENTRAD DEL USUARIO -->
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" name="usuario"
                                                placeholder="Usuario">
                                        </div>
                                        <!-- ENTRADA PASSWORD -->
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user" name="password"
                                                placeholder="Password">
                                        </div>

                                       
                                        <div class="col-sm-6 py-3">
                                            <select name="estado" class="form-control">Selecciona un estado
                                                <option value="0">Inactivo</option>
                                                ><option value="1">Activo</option>
                                            </select>

                                        </div>
                                        <div class="col-sm-6 py-3">
                                            <select name="tipo" class="form-control">Selecciona un tipo de cuenta
                                                <option value="admin">Administrador</option>
                                                ><option value="usuario">Usuario</option>
                                            </select>

                                        </div>
                                        <div class="col-sm-6">
                                            <input type="file" class="nuevaFoto form-control form-control-user" name="nuevaFoto"
                                                placeholder="Sube una foto">
                                                <p>Peso maximo de la foto 2MB</p>
                                                <img src="vistas/img/usuarios/default/anonimo.png" class="img-thumbail previsualizar" width="100px">
                                        </div>
                                    </div>
                                </div>
                                <!-- TERMINA CUERPO DEL MODAL -->

                                <!-- PIE DEL MODAL -->
                                <div class="modal-footer">
                                    <button class="btn btn-danger" type="button" data-dismiss="modal">Salir</button>
                                    <button class="btn btn-success" type="submit">Guardar Usuario</button>
                                </div>
                                <!-- TERMINA PIE DEL MODAL -->
                            </form>
                            <?php
                            $crearUsuario = new ControladorUsuarios();
                            $crearUsuario->ctrCrearUsuario();
                            ?>
                        </div>
                    </div>
                </div>
                <!-- TEMINA MODAL AGREGAR USUARIO -->

                <!-- MODAL EDITAR USUARIO -->

                <div class="modal fade" id="modalEditarUsuarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form class="user" method="post" enctype="multipart/form-data">
                                <!-- CABEZA MODAL -->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">❌</span>
                                    </button>
                                </div>
                                <!-- TERMINA CABEZA MODAL -->

                                <!-- CUERPO MODAL -->
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <!-- ENTRAD DEL USUARIO -->
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" name="editarusuario" id="editarusuario" value="">
                                            <input type="hidden" name="editarid" id="editarid" value="">
                                        </div>
                                        <!-- ENTRADA PASSWORD -->
                                        <div class="col-sm-6">
                                            <input type="hidden" class="form-control form-control-user" name="editarpassword" id="editarpassword" value="">
                                            <input type="text" class="form-control form-control-user" id="passwordActual" name="passwordActual">
                                        </div>

                                       
                                        <div class="col-sm-6 py-3">
                                            <select name="editarestado" class="form-control">Selecciona un Estado>
                                                <option value="" id="editarestado"></option>
                                                <option value="0">Inactivo</option>
                                                <option value="1">Activo</option>
                                            </select>

                                        </div>
                                        <div class="col-sm-6 py-3">
                                            <select name="editartipo"  class="form-control">Selecciona un tipo de cuenta>
                                                <option value="" id="editartipo"></option>    
                                                <option value="admin">Administrador</option>
                                                <option value="admin">Usuario</option>
                                            </select>

                                        </div>
                                        <div class="col-sm-6">
                                            <input type="file" class="nuevaFoto form-control form-control-user" name="editarnuevaFoto">
                                                <p>Peso maximo de la foto 2MB</p>
                                                <img src="vistas/img/usuarios/default/anonimo.png" class="img-thumbail previsualizar" width="100px">
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
                                 <?php
                                 $editarUsuario = new ControladorUsuarios();
                                 $editarUsuario-> ctrEditarUsuario();
                                 ?>
                            </form>
                            <?php

                            ?>
                        </div>
                    </div>
                </div>
                <!-- TEMINA MODAL EDITAR USUARIO -->