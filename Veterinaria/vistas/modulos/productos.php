<?php 
  $objinsert = new controlador();
  $objinsert -> CrearProductoControlador();
 ?>

<div class="container">
      <div class="col-12">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#producto" role="tab"
                aria-controls="home" aria-selected="true">Productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#Rproducto" role="tab"
                aria-controls="profile" aria-selected="false">Registrar Producto</a>
          </li>
        </ul>
      </div>
</div>

    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="producto" name="producto" role="tabpanel" aria-labelledby="home-tab">
        <div class="container justify-content-center">
                <h3 class="text-primary" style="text-align:center; padding: 15px;">Lista de Productos</h3>
                <div class= "table-responsive-sm">
                <table style="text-align:center" class="table table-striped">
                    <thead>
                        <tr>
                            <th  scope="col">ID</th>
                            <th  scope="col">Nombre</th>
                            <th  scope="col">Costo</th>
                            <th  scope="col">Marca</th>
                            <th  scope="col">Fabricante</th>
                            <th  scope="col">Precio de Venta</th>
                            <th  scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $objetVer = new controlador();
                        $objetVer -> VerProductoControlador();
                        $objetVer -> BorrarProductoControlador();
                    ?>
                    </tbody>
                </table>
                </div>
               
        </div>
      </div>




      <div class="tab-pane fade" id="Rproducto" role="tabpanel" aria-labelledby="home-tab">
            <div class="container justify-content-center">
                <h3 class="text-primary" style="text-align:center; padding: 15px;">Registrar Producto</h3>
      <form method="POST">
      <div class="form-row">
        <div class="form-group col-md-4">
            <label>Nombre</label>
            <input type="text" class="form-control" name="nombre" id="inputNombre" placeholder="Nombre" required>
        </div>

        <div class="form-group  col-md-4">      
            <label>Costo</label>
            <input type="text" class="form-control" name="costo" id="inputCosto" placeholder="Costo" required>
        </div>

        <div class="form-group  col-md-4">      
            <label>Marca</label>
            <input type="text" class="form-control" name="marca" id="inputMarca" placeholder="Marca" required>
        </div> 
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Fabricante</label>
            <input type="text" class="form-control" name="fabricante" id="inputFabricante" placeholder="Fabricante" required>
        </div>

        <div class="form-group  col-md-6">      
            <label>Precio de venta</label>
            <input type="text" class="form-control" name="precioVenta" id="inputPrecioVenta" placeholder="Precio de Venta" required>
        </div> 
    </div>


        <div class="row justify-content-center">
        <input type="submit" class="btn btn-primary" name="Registrar" value="Registrar">
        </div>
      </form>
    </div>
