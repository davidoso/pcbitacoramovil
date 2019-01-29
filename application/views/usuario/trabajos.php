    <body>
        
        <!-- BODY -->
            <div class="container">           
                
                <div class="row justify-content-center my-4">
                    <h1>Trabajos registrados</h1>
                </div>
                    
                <!-- Orden -->
                <form role="form" id="filtro" action="<?php echo site_url('Principal/trabajos_registrados'); ?>" method="get">
                    <div class="row mt-3 align-items-end">
                        <div class="col-md-3 mb-3">
                            <label class="font-weight-bold">Fecha Inicio</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0" id="basic-addon1"><i class="fa fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" class="form-control rounded-0" name="fi" id="fi" placeholder="Fecha" value="<?php echo $this->input->get('fi') ?>">
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="font-weight-bold">Fecha término</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0" id="basic-addon1"><i class="fa fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" class="form-control rounded-0" name="ft" id="ft" placeholder="Fecha" value="<?php echo $this->input->get('ft') ?>" onfocusout="validar_fecha()">
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="font-weight-bold">Usuario</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0" id="basic-addon1"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control rounded-0" name="us" id="us" placeholder="Ejemplo: rrangel" value="<?php echo $this->input->get('us') ?>">
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <button type="submit" class="btn btn-info btn-block rounded-0 mt-3"><i class="fas fa-search"></i> Buscar</button>
                        </div>
                        <div class="col-md-1 mb-3">
                            <button type="button" class="btn btn-danger btn-block rounded-0 mt-3" onclick="limpiar()"><i class="fas fa-undo-alt"></i></button>
                        </div>
                    </div>
                    
                    <div class="row mt-1 align-items-end">
                        <div class="col-md-3 mb-3">
                            <label class="font-weight-bold">Familia</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0" id="basic-addon1"><i class="fas fa-truck"></i></span>
                                </div>
                                <select class="custom-select rounded-0" name="fa" id="familia">
                                    <option value="" selected disabled>Todas</option>
                                <?php
                                    //$fam_equipos=$this->session->userdata('fam_equipos');
                                    foreach($familias as $f)
                                    {
                                ?>
                                    <option value="<?php echo $f->FAMILIA ?>"><?php echo $f->FAMILIA; ?></option>
                                <?php
                                    } // foreach de familias
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="font-weight-bold">Equipo</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0" id="basic-addon1"><i class="fas fa-truck"></i></span>
                                </div>
                                <select class="custom-select rounded-0" name="eq" id="equipo"></select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">Busqueda en descripción del trabajo</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0" id="basic-addon1"><i class="fas fa-search-plus"></i></span>
                                </div>
                                <input type="text" class="form-control rounded-0" name="des" id="des" placeholder="Llantas, cambio, mantenimiento, reporte, manguera, etc..." value="<?php echo $this->input->get('des') ?>">
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /Orden -->
                
                <div class="row justify-content-center mt-3">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Ver</th>
                                    <th scope="col" class="text-center">Inicio</th>
                                    <th scope="col" class="text-center">Término</th>
                                    <th scope="col" class="text-center">Familia</th>
                                    <th scope="col" class="text-center">Equipo</th>
                                    <th scope="col" class="text-center">Trabajo</th>
                                    <th scope="col" class="text-center">Usuario</th>
                                    <th scope="col" class="text-center">Personal</th>
                                    <th scope="col" class="text-center">Ver</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach ($trabajos as $t)
                                {
                                    if (strlen($t->descripcion)>250) // comprueba si la descripción contiene más de 250 caracteres
                                    {
                                        // Toma los primeros 250 caracteres de la cadena y lo almacena en una variable llamada "$descripcion"
                                        $pos=strpos($t->descripcion, ' ', 250);
                                        $descripcion=substr($t->descripcion,0,$pos).' [...]';
                                        // No sé como funciona exactamente, pero funciona xd
                                    }
                                    else // si no tiene más de 250, la variable almacena toda de la cadena
                                    {
                                        $descripcion=$t->descripcion;
                                    }
                                    
                                    if (strlen($t->personal)>50) // comprueba si la descripción contiene más de 250 caracteres
                                    {
                                        // Toma los primeros 250 caracteres de la cadena y lo almacena en una variable llamada "$descripcion"
                                        $pos=strpos($t->personal, ' ', 50);
                                        $personal=substr($t->personal,0,$pos).' [...]';
                                        // No sé como funciona exactamente, pero funciona xd
                                    }
                                    else // si no tiene más de 250, la variable almacena toda de la cadena
                                    {
                                        $personal=$t->personal;
                                    }
                            ?>
                                <tr <?php if($t->estatus=='0'){echo 'class="table-danger"';} ?> >
                                     <th class="align-middle text-center" scope="row"> <a href="<?php echo site_url('Principal/ver_trabajo?t=').$t->id; ?>">Ver</a></th>
                                    <th class="align-middle text-center" scope="row"><?php echo $t->fecha.'<br>'.$t->hora_inicio; ?></th>
                                    <td class="align-middle text-center"><?php echo $t->fecha_t.'<br>'.$t->hora_termino; ?></td>
                                    <td class="align-middle text-center"><?php echo $t->familia; ?></td>
                                    <td class="align-middle text-center"><?php echo $t->equipo; ?></td>
                                    <td class="align-middle text-center"><?php echo $descripcion; ?></td>
                                    <td class="align-middle text-center"><?php echo $t->usuario; ?></td>
                                    <td class="align-middle text-center"><?php echo $personal; ?></td>
                                    <td class="">
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
            
            <script type="text/javascript">
                function limpiar() {
                    document.getElementById("fi").valueAsDate = null;
                    document.getElementById("ft").valueAsDate = null;
                    document.getElementById("equipo").selectedIndex = 0;
                    document.getElementById("familia").selectedIndex = 0;
                    document.getElementById("us").value='';
                    document.getElementById("des").value='';
                }
                
                function validar_fecha()
                {
                    fecha_inicio=document.getElementById("fi").value;
                    fecha_termino=document.getElementById("ft").value;
                    
                    if (fecha_termino<fecha_inicio)
                    {
                        alert("La fecha de termino debe ser mayor o igual a la de inicio");
                        document.getElementById("ft").value = "";
                    }
                }
            </script>