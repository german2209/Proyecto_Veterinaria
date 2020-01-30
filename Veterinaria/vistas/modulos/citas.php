<?php
 $objeto = new controlador();
 $objeto -> CrearCitaControlador();
?>
<div class="container">
        <div class="col-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist" name="">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#Citas" role="tab"
                        aria-controls="home" aria-selected="true">Citas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#rCitas" role="tab"
                        aria-controls="profile" aria-selected="false">Registrar Citas</a>
                </li>
            </ul>
        </div>
    
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="Citas" role="tabpanel" aria-labelledby="home-tab">
            <div class="container justify-content-center">
            <h3 class="text-primary" style="text-align:center; padding: 15px;">Lista de Citas</h3>
                <table class="table table-striped table-responsive-sm">
                    <thead>
                        <tr>
                 
                            <th scope="col">Id</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Servicio</th>
                            <th scope="col">Empleado</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $objeto-> InnerCitaControlador();
                                $objeto -> BorrarCitaControlador();?>
        </tbody>
    </table>
    </div>
        </div>

        <div class="tab-pane fade" id="rCitas" role="tabpanel" aria-labelledby="profile-tab">
            <div class="container justify-content-center">
            <h3 class="text-primary" style="text-align:center; padding: 15px;">Agregar Citas</h3>
        <form method="POST">
             
          
                <div class="form-row">
                        <div class="form-group col-md-3 offset-2">
                            <label for="cliente">Clientes:</label>
                            <select id="cliente" class="form-control" name="cliente">
                            <option selected>Elegir...</option>
                                <?php $objeto -> allClienteControlador(); ?>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                            <label for="servicio">Servicio:</label>
                            <select id="servicio" class="form-control" name="servicio">
                            <option selected>Elegir...</option>
                                <?php $objeto -> allServicioControlador(); ?>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                            <label for="empleado">Empleado:</label>
                            <select id="empleado" class="form-control" name="empleado">
                            <option selected>Elegir...</option>
                            <?php $objeto -> allEmpleadoControlador(); ?>
                        </select>
                    </div>
        <div class="form-group col-md-3 offset-3">
            <label>Hora:</label>
            <input type="time" class="form-control" name="hora" placeholder="hora">
        </div>
        <div class="form-group col-md-3">
                <label>Fecha:</label>
                <input type="date" class="form-control" name="fecha" placeholder="fecha">
            </div>
    </div> 

    <div class="row justify-content-center">
        <input type="submit" class="btn btn-primary" name="Registrar" value="Registrar">
        </div>
        </div>
                   
</form>
</div>  
