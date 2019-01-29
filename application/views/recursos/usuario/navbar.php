        <!-- NavBar -->
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <span class="navbar-brand mb-0 h1"><img src="<?php echo base_url('assets/img/logo_peco.png'); ?>" width="95" height="40"></span>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse collapse" id="navbarsExampleDefault" style="">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('Principal/registrar_trabajo'); ?>"><i class="far fa-edit"></i> Registrar trabajo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('Principal/trabajos_registrados'); ?>"><i class="fas fa-bars"></i> Ver trabajos registrados</a>
                    </li>
                    <!--<li class="nav-item">
                        <a class="nav-link" href="#"><i class="far fa-file-alt"></i> Reportes</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="http://example.com/" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item" href="https://getbootstrap.com/docs/4.0/examples/starter-template/#">Action</a>
                            <a class="dropdown-item" href="https://getbootstrap.com/docs/4.0/examples/starter-template/#">Another action</a>
                            <a class="dropdown-item" href="https://getbootstrap.com/docs/4.0/examples/starter-template/#">Something else here</a>
                        </div>
                    </li>-->
                </ul>
                
                <!-- Información del usuario -->
                <h6 class="text-white"><i class="fa fa-user-circle mr-2"></i><?php echo $this->session->userdata('nombre'); ?></h6>
                <!-- /Información del usuario -->
                
                <!-- Cerrar sesión -->
                <a href="<?php echo site_url('Login/cerrar_sesion'); ?>">
                    <h6 class="text-warning ml-3"><i class="fas fa-sign-out-alt mr-2"></i>Cerrar sesión</h6>
                </a>
                <!-- /Cerrar sesión -->
                
                <!--<form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>-->
            </div>
        </nav>        
        <!-- /NavBar -->