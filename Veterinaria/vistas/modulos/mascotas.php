<?php
    $objeto = new controlador();
    $objeto -> CrearMascotaControlador();
 ?>

<div class="container">
      <div class="col-12">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#mascota" role="tab"
                aria-controls="home" aria-selected="true">Mascotas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#Rmascota" role="tab"
                aria-controls="profile" aria-selected="false">Registrar Mascotas</a>
          </li>
        </ul>
      </div>
</div>

    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="mascota" name="mascota" role="tabpanel" aria-labelledby="home-tab">
        <div class="container justify-content-center">
                <h3 class="text-primary" style="text-align:center; padding: 15px;">Lista de Mascotas</h3>
                <div class= "table-responsive-sm">
                <table style="text-align:center" class="table table-striped">
                    <thead>
                        <tr>
                            <th  scope="col">ID</th>
                            <th  scope="col">Nombre</th>
                            <th  scope="col">Especie</th>
                            <th  scope="col">Raza</th>
                            <th  scope="col">Sexo</th>
                            <th  scope="col">Edad</th>
                            <th  scope="col">Tamaño</th>
                            <th  scope="col">Peso</th>
                            <th  scope="col">Enfermedades</th>
                            <th  scope="col">Observaciones</th>
                            <th  scope="col">Dueño</th>
                            <th  scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                                $objeto -> InnerMascotaControlador();
                                $objeto -> BorrarMascotaControlador();
                            ?>  
                    </tbody>
                </table>
                </div>
               
        </div>
      </div>




      <div class="tab-pane fade" id="Rmascota" role="tabpanel" aria-labelledby="home-tab">
            <div class="container justify-content-center">
                <h3 class="text-primary" style="text-align:center; padding: 15px;">Registrar Mascota</h3>
      
      <form method="POST">

        <div class="form-row">
           <div class="form-group col-md-4">
            <label for="cliente">Cliente</label>
              <select id="cliente" class="form-control" name="cliente">
               <option selected>Elegir...</option>
                <!--<option>1</option>
                <option>2</option>-->
                <?php
                 $objeto ->allClienteControlador();
                ?>
              </select>
            </div>
            <div class="form-group col-md-4">
                <label>Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre de la mascota" required>
            </div>
            <div class="form-group col-md-2">
              <label for="tamano">Especie:</label>
                <select  class="form-control" name="especie">
                  <option selected>Elegir...</option>
                  <option>Gato</option>
                  <option>Perro</option>
                  <option>Hámster</option>
                  <option>Pez</option>
                  <option>Ave</option>
                </select>
            </div>
            <div class="form-group col-md-2">
              <label>Raza</label>
              <input type="text" class="form-control" name="raza" id="raza" placeholder="Raza" required>
            </div>
        </div>
        <div class="form-row"> 
            <div class="form-group col-md-3">
                <label for="sexo">Sexo</label>
                  <select id="sexo" class="form-control" name="sexo">
                    <option selected>Elegir...</option>
                    <option>Hembra</option>
                    <option>Macho</option>
                  </select>
            </div>
            <div class="form-group col-md-3">
                <label>Edad</label>
                <input type="text" class="form-control" name="edad" id="edad" placeholder="Edad" required>
            </div>
            <div class="form-group col-md-3">
              <label for="tamano">Tamaño:</label>
                <select  class="form-control" name="tamano">
                  <option selected>Elegir...</option>
                  <option>Chico</option>
                  <option>Mediano</option>
                  <option>Grande</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label>Peso</label>
                <input type="text" class="form-control" name="peso" id="peso" placeholder="Peso" required>
            </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-4 offset-2">
              <label>Enfermedades</label>
              <textarea class="form-control"  name="enfermedad" id="enfermedad" placeholder="Enfermedades" required></textarea>
          </div>
          <div class="form-group col-md-4">
              <label>Observaciones</label>
              <textarea class="form-control"  name="observaciones" id="observaciones" placeholder="Observaciones" required></textarea>
          </div>
        </div>
        <div class="row justify-content-center">
          <input type="submit" class="btn btn-primary" name="Registrar" value="Registrar">
        </div>

      </form>
    </div>

