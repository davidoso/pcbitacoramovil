 <!--<style>
    body {
      background: url('https://redfynn-gt7rmksqqwq7f30mi.netdna-ssl.com/wp-content/uploads/2016/08/home-italian-food-background.jpg') no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      background-size: cover;
      -o-background-size: cover;
    }
 </style>-->
 <body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5 border-danger">
      <div class="card-header bg-danger text-white font-weight-bold">Iniciar sesión</div>
      <div class="card-body">
        <form role="form" method="POST" action="<?php echo site_url('Login/sign_in'); ?>">
          <div class="form-group">
            <span class="text-danger"><i class="fa fa-fw fa-envelope"></i></span>
            <label for="exampleInputEmail1" class="font-weight-bold">Correo Electrónico</label>
            <input class="form-control rounded-0" name="email" type="email" aria-describedby="emailHelp" placeholder="tu_correo@ejemplo.com">
          </div>
          <div class="form-group">
            <span class="text-danger"><i class="fa fa-fw fa-lock"></i></span>
            <label for="exampleInputPassword1" class="font-weight-bold">Contraseña</label>
            <input class="form-control rounded-0" name="pass" type="password" placeholder="************">
          </div>
          <!--<div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember Password</label>
            </div>
          </div>-->
          <button type="submit" class="btn btn-outline-danger btn-block rounded-0 font-weight-bold"><i class="fa fa-fw fa-sign-in"></i> Entrar</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.html">Crear una cuenta</a>
          <a class="d-block small" href="forgot-password.html">Olvidé mi contraseña</a>
        </div>
      </div>
    </div>
  </div>