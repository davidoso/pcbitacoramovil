    <body>
        
        <!-- BODY -->
            <div class="container">
                            
                <div class="row justify-content-center my-4">
                    <h1 class="display-3">
                        ¡El trabajo se registró con éxito!
                    </h1>
                </div>
                
                <div class="row justify-content-center my-3">
                    <div class="col-md-3 mb-3">
                        <a href="<?php echo site_url('Principal/registrar_trabajo'); ?>">
                            <button type="button" class="btn btn-primary btn-lg btn-block">Registrar nuevo trabajo</button>
                        </a>
                    </div>
                    <!--<div class="col-md-3">
                        <button type="button" class="btn btn-warning btn-lg btn-block">Página principal</button>
                    </div>-->
                </div>
                
                <div class="row justify-content-center mt-5">
                    <h3>Últimos trabajos resgistrados</h3>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Fecha</th>
                                    <th scope="col" class="text-center">Familia</th>
                                    <th scope="col" class="text-center">Equipo</th>
                                    <th scope="col" class="text-center">Trabajo</th>
                                    <th scope="col" class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach ($trabajos as $t)
                                {
                            ?>
                                <tr>
                                    <th class="align-middle" scope="row"><?php echo $t->fecha; ?></th>
                                    <td class="align-middle"><?php echo $t->familia; ?></td>
                                    <td class="align-middle"><?php echo $t->equipo; ?></td>
                                    <td class="align-middle"><?php echo $t->descripcion; ?></td>
                                    <td class="align-middle">
                                        <a href="<?php echo site_url('Principal/ver_trabajo?t=').$t->id; ?>">
                                            <button type="button" class="btn btn-secondary">Ver más</button>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                                } // cierra el foreach de trabajos
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>