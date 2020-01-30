<?php 
    if (isset($_SESSION["validar"])) {

        echo '<script type="text/javascript">

    window.location.assign("index.php?action=panel-admin");

    </script>';
    }
?>

<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5 z-depth-4">
                <div class="card-body">
                    <div class="container-fluid">
                        <form class="form-signin" method="POST">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <center>
                                    <h3 style="font-weight: 1000; ">Iniciar Sesión</h3>
                                    <br><img src="vistas/assets/images/logohuella.png" width="100px" height="100px">
                                    </center>
                                </div>
                                <div class="md-form md-outline">
                                    <i class="fas fa-envelope prefix"></i>
                                    <input type="email" id="correo" name="correo" class="form-control form-control-lg validate" placeholder="Correo">
                                </div>
                                <div class="md-form md-outline">
                                    <i class="fas fa-lock prefix"></i>
                                    <input type="password" class="form-control form-control-lg" name="password" id="password" required placeholder="Contraseña"> 
                                </div>
                                <div class="row justify-content-center">
                                    <div class="row justify-content-center">
                                        <button type="submit" class="btn blue-gradient" name="Entrar" value="Entrar">Entrar</button>                     
                                    </div> 
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

  $ingreso = new controlador();
  $ingreso -> Login();

  if (isset($_GET["action"])) {
      if ($_GET["action"]=="error") {
          echo "Verifique los datos";
      }
  }
?>
