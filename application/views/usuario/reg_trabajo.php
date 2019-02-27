    <body>
        <!-- BODY -->
            <div class="container">
                <div class="row justify-content-center my-4">
                    <div class="col-md-12">
                        <h2>Registrar nuevo trabajo</h2>
                    </div>
                </div>

                <form role="form" method="POST" action="<?php echo site_url('Principal/insert_trabajo'); ?>">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">Familia</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0" id="basic-addon1"><i class="fa fa-users"></i></span>
                                </div>
                                <select class="custom-select rounded-0" id="familia" name="familia" onchange="cambiar_equipos()" required>
                                    <option selected disabled></option>
                                <?php
                                    foreach($familias as $f)
                                    {
                                ?>
                                    <option value="<?php echo $f->FAMILIA; ?>" <?php if ($f->FAMILIA==$this->input->get('f')){echo 'selected';} ?> ><?php echo $f->FAMILIA; ?></option>
                                <?php
                                    }
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">Equipo</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0" id="basic-addon1"><i class="fas fa-sitemap"></i></span>
                                </div>
                                <select class="custom-select rounded-0" id="equipo" name="equipo" required>
                                </select>
                            </div>
                        </div>
                        <!--<div class="col-md-4 mb-3">
                            <label class="font-weight-bold">Tipo</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0" id="basic-addon1"><i class="fas fa-sitemap"></i></span>
                                </div>
                                <select class="custom-select rounded-0" id="tipo" name="tipo">
                                    <option selected disabled>-</option>
                                    <option value="ELÉCTRICO">Eléctrico</option>
                                    <option value="MECÁNICO">Mecánico</option>
                                </select>
                            </div>
                        </div>-->
                        <!--<div class="col-md-4 mb-3">
                            <label class="font-weight-bold">Supervisor</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0" id="basic-addon1"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control rounded-0" name="usuario" placeholder="Clave" aria-describedby="basic-addon1">
                            </div>
                        </div>-->
                    </div>

                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label class="font-weight-bold">Fecha de inicio</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0" id="basic-addon1"><i class="fa fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" class="form-control rounded-0" name="fecha_inicio" id="fecha_inicio" placeholder="Fecha" required>
                            </div>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label class="font-weight-bold">Hora de inicio</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0" id="basic-addon1"><i class="far fa-clock"></i></span>
                                </div>
                                <input type="time" class="form-control rounded-0" name="hora_inicio" id="hora_inicio" placeholder="" onchange="set_turno()" required>
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="font-weight-bold">Turno</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0" id="basic-addon1"><i class="fa fa-clock"></i></span>
                                </div>
                                <select class="custom-select rounded-0" id="turno" name="turno" required>
                                    <option selected disabled></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="font-weight-bold">Descripción</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0" id="basic-addon1"><i class="fa fa-edit"></i></span>
                                </div>
                                <textarea class="form-control rounded-0" name="descripcion" placeholder="Escriba una descripción" aria-describedby="basic-addon1" rows="8" required></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">Fecha de término</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0" id="basic-addon1"><i class="fa fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" class="form-control rounded-0" name="fecha_termino" id="fecha_termino" placeholder="Fecha" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">Hora de término</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0" id="basic-addon1"><i class="far fa-clock"></i></span>
                                </div>
                                <input type="time" class="form-control rounded-0" name="hora_termino" id="hora_termino" placeholder="" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label class="font-weight-bold">Pendiente(s)</label>
                            <div class="input-group">
                                <!--<div class="input-group-prepend">
                                    <span class="input-group-text rounded-0" id="basic-addon1"><i class="fa fa-pause"></i></span>
                                </div>-->
                                <textarea class="form-control rounded-0" name="pendientes" placeholder="Si no hay pendientes, deje este campo vacío" aria-describedby="basic-addon1" rows="4"></textarea>
                            </div>
                        </div>
                       <div class="col-md-4 mb-3">
                            <label class="font-weight-bold">Personal que realizó el trabajo</label>
                            <div class="input-group">
                                <!--<div class="input-group-prepend">
                                    <span class="input-group-text rounded-0" id="basic-addon1"><i class="fa fa-pause"></i></span>
                                </div>-->
                                <textarea class="form-control rounded-0" name="personal" placeholder="Ej. Juan / Guillermo / Daniel" aria-describedby="basic-addon1" rows="4" required></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-3 mb-3">
                            <button type="submit" class="btn btn-danger btn-block rounded-0"><i class="fa fa-sign-in-alt"></i> Registrar</button>
                        </div>
                    </div>
                </form>
            </div>

            <script type="text/javascript">
                /*function cambiar_equipos()
                {
                    familia=document.getElementById("familia").value;
                    window.location.href="<?php //echo site_url('Principal/registrar_trabajo?f='); ?>"+familia;
                }*/

                function set_turno()
                {
                    hora_inicio=document.getElementById("hora_inicio").value;

                    if (hora_inicio>='08:00:00' && hora_inicio<='15:59:99')
                    {
                        document.getElementById("turno").selectedIndex = 1;
                    }

                    if (hora_inicio>='16:00:00' && hora_inicio<='23:59:99')
                    {
                        document.getElementById("turno").selectedIndex = 2;
                    }

                    if (hora_inicio>='00:00:00' && hora_inicio<='07:59:99')
                    {
                        document.getElementById("turno").selectedIndex = 3;
                    }
                }

                function validar_fecha()
                {
                    fecha_inicio=document.getElementById("fecha_inicio").value;
                    fecha_termino=document.getElementById("fecha_termino").value;

                    if (fecha_termino<fecha_inicio)
                    {
                        alert("La fecha de término debe ser mayor o igual a la de inicio");
                        document.getElementById("fecha_termino").value = "";
                    }
                    else if (fecha_termino==fecha_inicio)
                    {
                        validar_tiempo();
                    }
                }

                function validar_tiempo()
                {
                    fecha_inicio=document.getElementById("fecha_inicio").value;
                    fecha_termino=document.getElementById("fecha_termino").value;
                    hora_inicio=document.getElementById("hora_inicio").value;
                    hora_termino=document.getElementById("hora_termino").value;

                    if (fecha_termino==fecha_inicio)
                    {
                        if (hora_termino<hora_inicio)
                        {
                            alert("La hora de término debe ser mayor o igual a la de inicio");
                            document.getElementById("hora_termino").value = "";
                        }
                    }
                }
            </script>


        <!-- /BODY  -->