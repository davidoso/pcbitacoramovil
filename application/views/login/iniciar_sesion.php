    <style>
        body, html {
            height: 90%;
        }
        .bglogin { 
            /* The image used */
            background-image: url("<?php echo base_url("assets/img/bglogin.jpg"); ?>");

            /* Full height */
            height: 100%; 

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-color: #282828;
        }
    </style>
    <body class="bglogin d-flex align-items-center">
    <!--<body class="bglogin">-->
        <div class="container">
            <div class="row justify-content-center">
                <img src="<?php echo base_url('assets/img/logo_peco.png'); ?>" class="img-fluid">
            </div>
            
            <div class="row justify-content-center my-3">
                <h3 class="text-white">Sistema Único de Acceso (STS/ADFS)</h3>
            </div>
            
            <div class="row justify-content-center my-3">
                <h4 class="text-white">Inicio de Sesión</h4>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <!--<form role="form" method="POST" action="http://vadaexterno:8080/wsAutEmp/Service1.asmx/Valida_Usuario">-->
                        <form role="form" method="POST" action="<?php echo site_url('Login/validar_usuario'); ?>">
                        <!--<label for="exampleInputEmail1">Email address</label>-->
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0" id="basic-addon1" title="Usuario"><i class="fa fa-fw fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control rounded-0" id="usuario" name="usuario" placeholder="Usuario" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0" id="basic-addon1" title="Contraseña"><i class="fa fa-fw fa-lock"></i></span>
                            </div>
                            <input type="password" class="form-control rounded-0" id="contrasena" name="contrasena" placeholder="Contraseña" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0" id="puesto-icono" title="Puesto"><i class="fa fa-fw fa-id-badge"></i></span>
                            </div>
                            <input type="text" class="form-control rounded-0" id="puesto" name="puesto" placeholder="Puesto" disabled>
                        </div>
                        <button type="submit" class="btn btn-danger btn-block rounded-0"><i class="fa fa-fw fa-sign-in-alt"></i> Ingresar</button>
                    </form>
                </div>
            </div>
            
            <div class="row justify-content-center mt-5">
                <p class="text-muted">Peña Colorada | Tecnologías de Información</p>
            </div>
        </div>