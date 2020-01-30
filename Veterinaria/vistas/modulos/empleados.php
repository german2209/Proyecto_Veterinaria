<?php
  $objeto = new controlador();
  $objeto -> CrearEmpleadoControlador();
?>
<div class="container">
      <div class="col-12">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#empleado" role="tab"
                aria-controls="home" aria-selected="true">Empleados</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#Rempleado" role="tab"
                aria-controls="profile" aria-selected="false">Registrar Empleados</a>
          </li>
        </ul>
      </div>
</div>

    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="empleado" name="empleado" role="tabpanel" aria-labelledby="home-tab">
        <div class="container justify-content-center">
                <h3 class="text-primary" style="text-align:center; padding: 15px;">Lista de Empleados</h3>
                <div class= "table-responsive-sm">
                <table style="text-align:center" class="table table-striped">
                    <thead>
                        <tr>
                            <th  scope="col">ID</th>
                            <th  scope="col">Nombre</th>
                            <th  scope="col">Apellido</th>
                            <th  scope="col">Telefono</th>
                            <th  scope="col">Correo</th>
                            <th  scope="col">Puesto</th>
                            <th  scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $objeto -> VerEmpleadoControlador();
                            $objeto -> BorrarEmpleadoControlador();
                        ?>
                    </tbody>
                </table>
                </div>
               
        </div>
      </div>




      <div class="tab-pane fade" id="Rempleado" role="tabpanel" aria-labelledby="home-tab">
            <div class="container justify-content-center">
                <h3 class="text-primary" style="text-align:center; padding: 15px;">Registrar Empleado</h3>
      <form method="POST">
      <div class="form-row">
        <div class="form-group col-md-6">
            <label>Nombre</label>
            <input type="text" class="form-control" name="nombre" id="inputNombre" placeholder="Nombre" required>
        </div>

        <div class="form-group  col-md-6">      
            <label>Apellido</label>
            <input type="text" class="form-control" name="apellido" id="inputApellido" placeholder="Apellido" required>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label>Telefono</label>
            <input type="tel" class="form-control" name="telefono" id="inputTelefono" placeholder="Telefono" required>
        </div>

        <div class="form-group  col-md-4">      
            <label>Correo</label>
            <input type="text" class="form-control" name="correo" id="inputCorreo" placeholder="Correo" required>
        </div>
        <div class="form-group col-md-4">
            <label for="puesto">Puesto:</label>
              <select id="puesto" class="form-control" name="puesto">
               <option selected>Elegir...</option>
                <option>Veterinario</option>
                <option>Asistente Veterinario</option>
                <option>Bañador</option>
                <option>Estilista</option>
              </select>
            </div>
    </div>

    <div class="row justify-content-center">
        <input type="submit" class="btn btn-primary" name="Registrar" value="Registrar">
        </div>
      </form>
    </div>