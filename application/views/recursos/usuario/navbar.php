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
                </ul>

                <!-- Información del usuario -->
                <h6 class="text-white"><i class="fas fa-fw fa-user-circle mr-2"></i><?php echo $this->session->userdata('nombre'); ?></h6>
                <!-- /Información del usuario -->

                <!-- Cerrar sesión -->
                <a href="<?php echo site_url('Login/cerrar_sesion'); ?>">
                    <h6 class="text-warning ml-3"><i class="fas fa-fw fa-sign-out-alt mr-2"></i>Cerrar sesión</h6>
                </a>
                <!-- /Cerrar sesión -->
            </div>
        </nav>
        <!-- /NavBar -->