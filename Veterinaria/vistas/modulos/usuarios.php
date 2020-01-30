<?php 
  $objinsert = new controlador();
  $objinsert -> CrearUsuarioControlador();
 ?>
<div class="container">
        <div class="col-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist" name="">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#Usuarios" role="tab"
                        aria-controls="home" aria-selected="true">Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#rUsuarios" role="tab"
                        aria-controls="profile" aria-selected="false">Registrar Usuario</a>
                </li>
            </ul>
        </div>
    
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="Usuarios" role="tabpanel" aria-labelledby="home-tab">
            <div class="container justify-content-center">
            <h3 class="text-primary" style="text-align:center; padding: 15px;">Lista de Usuarios</h3>
                <table class="table table-striped table-responsive-sm">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Username</th>
                            <th scope="col">Password</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Tipo</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php
                        $objetVer = new controlador();
                        $objetVer -> VerUsuarioControlador();
                        $objetVer -> BorrarUsuarioControlador();
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="rUsuarios" role="tabpanel" aria-labelledby="profile-tab">
            <div class="container justify-content-center">
            <h3 class="text-primary" style="text-align:center; padding: 15px;">Agregar Usuarios</h3>
              <form method="POST">
             
          
            <div class="form-row">
                <div class="form-group col-md-3 offset-2">
                    <label>Nombre:</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                </div>
                <div class="form-group col-md-3">
                    <label>Username:</label>
                    <input type="text" class="form-control" name="username" placeholder="Username">
                </div>
                <div class="form-group col-md-2">
                    <label>Password:</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
            </div> 
            <div class="form-row">
                <div class="form-group col-md-4 offset-3">
                    <label>Correo:</label>
                    <input type="email" class="form-control" name="email" placeholder="Correo">
                </div>
                <div class="form-group col-md-2">
                    <label for="tipo">Tipo</label>
                    <select id="tipo" class="form-control" name="tipo">
                        <option selected>Elegir...</option>
                        <option>Master</option>
                        <option>Normal</option>
                    </select>
                </div>
            </div>
            <div class="row justify-content-center">
        <input type="submit" class="btn btn-primary" name="Registrar" value="Registrar">
        </div>
            </form>  
        </div>
    </div>
</div>
