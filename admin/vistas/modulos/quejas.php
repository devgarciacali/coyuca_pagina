<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Administrar Buzon</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Buzon Ciudadania</h6>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>nombre</th>
                            <th>queja</th>
                            <th>correo de la persona</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>nombre</th>
                            <th>queja</th>
                            <th>correo de la persona</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $item = null;
                        $campo = null;

                        $quejas = ControladorQuejas::ctrMostrarQuejas($item, $campo);
                        foreach ($quejas as $queja):
                            ?>
                            <tr>
                                <td><?= $queja->id ?></td>
                                <td><?= $queja->nombre?></td>
                                <td><?= $queja->queja?></td>
                                <td><?= $queja->correo?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->