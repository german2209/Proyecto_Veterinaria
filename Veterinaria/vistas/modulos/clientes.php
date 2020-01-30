<?php 
  $objinsert = new controlador();
  $objinsert -> CrearClienteControlador();
 ?>


<div class="container">
      <div class="col-12">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#cliente" role="tab"
                aria-controls="home" aria-selected="true">Clientes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#Rcliente" role="tab"
                aria-controls="profile" aria-selected="false">Registrar Clientes</a>
          </li>
        </ul>
      </div>
</div>

    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="cliente" name="cliente" role="tabpanel" aria-labelledby="home-tab">
        <div class="container justify-content-center">
                <h3 class="text-primary" style="text-align:center; padding: 15px;">Lista de Clientes</h3>
                <div class= "table-responsive-sm">
                <table style="text-align:center" class="table table-striped">
                    <thead>
                        <tr>
                            <th  scope="col">ID</th>
                            <th  scope="col">Nombre</th>
                            <th  scope="col">Apellido</th>
                            <th  scope="col">Direccion</th>
                            <th  scope="col">Telefono</th>
                            <th  scope="col">Correo</th>
                            <th  scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $objetVer = new controlador();
                        $objetVer -> VerClienteControlador();
                        $objetVer -> BorrarClienteControlador();
                    ?>
                    </tbody>
                </table>
                </div>
               
        </div>
      </div>




      <div class="tab-pane fade" id="Rcliente" role="tabpanel" aria-labelledby="home-tab">
            <div class="container justify-content-center">
                <h3 class="text-primary" style="text-align:center; padding: 15px;">Registrar Cliente</h3>
      <form method="POST">
      <div class="form-row">
        <div class="form-group col-md-6">
            <label>Nombre</label>
            <input type="text" class="form-control" name="nombre"  placeholder="Nombre" required>
        </div>

        <div class="form-group  col-md-6">      
            <label>Apellido</label>
            <input type="text" class="form-control" name="apellido" placeholder="Apellido" required>
        </div>
    </div>

    <div class="form-row">

        <div class="form-group  col-md-4">      
            <label>Direccion</label>
            <input type="text" class="form-control" name="direccion" placeholder="Direccion" required>
        </div>
        <div class="form-group col-md-4">
            <label>Telefono</label>
            <input type="tel" class="form-control" name="telefono" placeholder="Telefono" required>
        </div>

        <div class="form-group  col-md-4">      
            <label>Correo</label>
            <input type="text" class="form-control" name="correo" placeholder="Correo" required>
        </div>

    </div>

        <div class="row justify-content-center">
        <input type="submit" class="btn btn-primary" name="Registrar" value="Registrar">
        </div>
      </form>
    </div>
