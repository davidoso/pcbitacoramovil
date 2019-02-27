    <body>
        <!-- BODY -->
            <div class="container">
                <div class="row mt-4 d-none d-md-flex">
                    <!--<div class="col-md-2 mt-3">
                        <button type="button" class="btn btn-info btn-block" onclick="goBack()"><i class="fas fa-arrow-left"></i> Volver</button>
                    </div>-->
                    <?php
                        if ($trabajo[0]->estatus=='1')
                        {
                            if ($this->session->userdata('admin')!=null || $trabajo[0]->usuario==$this->session->userdata('usuario'))
                            {

                    ?>
                    <div class="col-md-2 mt-3">
                        <a href="<?php echo site_url('Principal/editar_trabajo?t=').$trabajo[0]->id.'&f='.$trabajo[0]->familia; ?>" class="btn btn-warning btn-block rounded-0"><i class="far fa-edit"></i> Editar</a>
                    </div>
                    <div class="col-md-1 mt-3">
                        <button class="btn btn-danger btn-block rounded-0" data-toggle="modal" data-target="#eliminar"><i class="fas fa-trash-alt"></i></button>
                    </div>
                    <?php
                            } // cierra if de admin o dueño del registro
                        } // cierra if (si el trabajo sigue activo)
                        else
                        {
                    ?>
                    <div class="col-md-12">
                        <h4><span><i class="fas fa-trash-alt text-danger"></i></span> Este trabajo fue eliminado. <a href="<?php echo site_url('Principal/delete_trabajo?t=').$trabajo[0]->id.'&o=1'; ?>">Deshacer</a></h4>
                    </div>
                    <?php
                        } // cierra else (si el trabajo ha sido eliminado)
                    ?>
                </div>

                <div class="row mt-2 justify-content-center">
                    <h4><?php echo $trabajo[0]->familia.' - '.$trabajo[0]->equipo; ?></h4>
                </div>

                <div class="row mt-3 justify-content-center">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col" class="text-center align-middle">Turno</th>
                                <th scope="col" class="text-center align-middle">Fecha de inicio</th>
                                <th scope="col"class="text-center align-middle">Hora de inicio</th>
                                <th scope="col"class="text-center align-middle">Fecha de término</th>
                                <th scope="col"class="text-center align-middle">Hora de término</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center"><?php echo $trabajo[0]->turno;?></td>
                                    <td class="text-center"><?php echo $trabajo[0]->fecha_inicio;?></td>
                                    <td class="text-center"><?php echo $trabajo[0]->hora_inicio;?></td>
                                    <td class="text-center"><?php echo $trabajo[0]->fecha_termino;?></td>
                                    <td class="text-center"><?php echo $trabajo[0]->hora_termino;?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-8">
                        <h5>Descripción: </h5>
                        <p><?php echo $trabajo[0]->descripcion; ?></p>
                    </div>
                    <div class="col-md-4">
                        <h5>Pendientes: </h5>
                        <p><?php echo $trabajo[0]->pendiente; ?></p>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-12">
                        <h5>Personal: </h5>
                        <p><?php echo $trabajo[0]->personal; ?></p>
                    </div>
                </div>

                <div class="row my-3 d-block d-md-none">
                    <?php
                        if ($trabajo[0]->estatus=='1')
                        {
                    ?>
                    <div class="col-md-2 mt-3">
                        <a href="<?php echo site_url('Principal/editar_trabajo?t=').$trabajo[0]->id.'&f='.$trabajo[0]->familia; ?>" class="btn btn-warning btn-block rounded-0"><i class="far fa-edit"></i> Editar</a>
                    </div>
                    <div class="col-md-1 mt-3">
                        <button class="btn btn-danger btn-block rounded-0" data-toggle="modal" data-target="#eliminar"><i class="fas fa-trash-alt"></i></button>
                    </div>
                    <?php
                        } // cierra if (si el trabajo sigue activo)
                        else
                        {
                    ?>
                    <div class="col-md-12">
                        <h4><span><i class="fas fa-trash-alt"></i></span> Este trabajo fue eliminado. <a href="<?php echo site_url('Principal/delete_trabajo?t=').$trabajo[0]->id.'&o=1'; ?>">Deshacer</a></h4>
                    </div>
                    <?php
                        } // cierra else (si el trabajo ha sido eliminado)
                    ?>
                </div>

            </div>

            <!-- Modal -->
            <div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">¡Alerta!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <div class="modal-body justify-content-center">
                    <h3>¿Desea eliminar el trabajo?</h3>
                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">No</button>
                            <a href="<?php echo site_url('Principal/delete_trabajo?t=').$trabajo[0]->id.'&o=0'; ?>">
                                <button type="button" class="btn btn-danger rounded-0">Eliminar</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Modal -->