<?php
    $objeto = new controlador();
    $objeto -> CrearVentaControlador();
?>
<div class="container">
        <div class="col-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist" name="">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#Ventas" role="tab"
                        aria-controls="home" aria-selected="true">Ventas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#rVentas" role="tab"
                        aria-controls="profile" aria-selected="false">Registrar Ventas</a>
                </li>
            </ul>
        </div>
    
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="Ventas" role="tabpanel" aria-labelledby="home-tab">
            <div class="container justify-content-center">
            <h3 class="text-primary" style="text-align:center; padding: 15px;">Lista de Ventas</h3>
                <table class="table table-striped table-responsive-sm">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Producto</th> 
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio de venta</th>
                            <th scope="col">Total</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $objeto = new controlador();
                            $objeto -> InnerVentaControlador();
                            $objeto -> BorrarVentaControlador();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="rVentas" role="tabpanel" aria-labelledby="profile-tab">
            <div class="container justify-content-center">
            <h3 class="text-primary" style="text-align:center; padding: 15px;">Agregar Ventas</h3>
              <form method="POST">
             
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="producto">Productos:</label>
                 <select id="producto" class="form-control" name="producto">
                    <option selected>Elegir...</option>
                    <?php $objeto -> allProductoControlador()
                    ?>
            </select>
            </div>

        
        <div class="form-group col-md-3">
            <label>Fecha:</label>
            <input type="date" class="form-control" name="fecha" placeholder="fecha">
        </div>


        <div class="form-group col-md-2">
            <label>Cantidad:</label>
            <input type="int" class="form-control" name="cantidad" placeholder="cantidad">
        </div>

        <div class="form-group col-md-2">
          <label>Precio de Venta:</label>
            <input type="float" class="form-control" name="precio_de_venta" placeholder="precio de venta">
        </div>

        <div class="form-group col-md-2">
                <label>Total:</label>
                  <input type="float" class="form-control" name="total" placeholder="total">
         </div>  
        
         <div class="row justify-content-center">
            <input type="submit" class="btn btn-primary" name="Registrar" value="Registrar">
        </div>

        </div>   
   </div>
</form>       
</div>