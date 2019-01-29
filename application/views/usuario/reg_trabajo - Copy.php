    <body>
        
        <!-- BODY -->
            <div class="container">
                            
                <div class="row my-4">
                    <div class="col-md-12">
                        <h2>Registrar nuevo trabajo</h2>
                    </div>
                </div>
                
                <form role="form" method="POST" action="<?php echo site_url('Login/iniciar_sesion'); ?>">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="font-weight-bold">Fecha</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0" id="basic-addon1"><i class="fa fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" class="form-control rounded-0" name="usuario" placeholder="Fecha" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="font-weight-bold">Turno</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0" id="basic-addon1"><i class="fa fa-clock"></i></span>
                                </div>
                                <select class="custom-select rounded-0" id="inputGroupSelect01">
                                    <option selected disabled>-</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="font-weight-bold">Equipo</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0" id="basic-addon1"><i class="fa fa-users"></i></span>
                                </div>
                                <input type="text" class="form-control rounded-0" name="usuario" placeholder="Clave del equipo" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="font-weight-bold">Supervisor</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0" id="basic-addon1"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control rounded-0" name="usuario" placeholder="Clave" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">Descripción</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0" id="basic-addon1"><i class="fa fa-edit"></i></span>
                                </div>
                                <textarea class="form-control rounded-0" name="usuario" placeholder="Inserte descripción" aria-describedby="basic-addon1" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">Pendiente(s)</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0" id="basic-addon1"><i class="fa fa-pause"></i></span>
                                </div>
                                <textarea class="form-control rounded-0" name="usuario" placeholder="Si no hay pendientes deja el campo en blanco." aria-describedby="basic-addon1" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="font-weight-bold">Fecha y hora de inicio</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0" id="basic-addon1"><i class="fa fa-clock-o"></i></span>
                                </div>
                                <input type="datetime-local" class="form-control rounded-0" name="usuario" placeholder="" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="font-weight-bold">Fecha y hora de termino</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0" id="basic-addon1"><i class="fa fa-clock-o"></i></span>
                                </div>
                                <input type="datetime-local" class="form-control rounded-0" name="usuario" placeholder="" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="font-weight-bold">Tiempo total</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0" id="basic-addon1"><i class="fa fa-stopwatch"></i></span>
                                </div>
                                <input type="text" class="form-control rounded-0" name="usuario" placeholder="" aria-describedby="basic-addon1" disabled>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        <!-- /BODY  -->
        
       
                          <!--<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <h5 class="card-header">Featured</h5>
                                            <div class="card-body">
                                                <h5 class="card-title">Special title treatment</h5>
                                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                                <a href="#" class="btn btn-primary">Go somewhere</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>-->