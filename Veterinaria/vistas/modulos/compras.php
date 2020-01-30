<?php
    $objeto = new controlador();
    $objeto -> CrearCompraControlador();
?>
<div class="container">
    <div class="col-12">
        <ul class="nav nav-tabs" id="myTab" role="tablist" name="">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#Compras" role="tab"
                    aria-controls="home" aria-selected="true">Compras</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#rCompras" role="tab"
                    aria-controls="profile" aria-selected="false">Registrar Compras</a>
            </li>
        </ul>
    </div>
        
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="Compras" role="tabpanel" aria-labelledby="home-tab">
            <div class="container justify-content-center">
            <h3 class="text-primary" style="text-align:center; padding: 15px;">Lista de Compras</h3>
                <table class="table table-striped table-responsive-sm">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Precio</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                            $objeto -> InnerCompraControlador();
                            $objeto -> BorrarCompraControlador();
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="rCompras" role="tabpanel" aria-labelledby="profile-tab">
            <div class="container justify-content-center">
            <h3 class="text-primary" style="text-align:center; padding: 15px;">Agregar Compras</h3>
            <form method="POST">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="producto">Productos:</label>
                        <select id="producto" class="form-control" name="producto">
                            <?php $objeto -> allProductoControlador();?>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Cantidad:</label>
                        <input type="int" class="form-control" name="cantidad" placeholder="cantidad">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Fecha de compra:</label>
                        <input type="date" class="form-control" name="fecha" placeholder="fecha">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Total:</label>
                        <input type="float" class="form-control" name="total" placeholder="total">
                    </div>  
                </div>
                <div class="row justify-content-center">
                    <input type="submit" class="btn btn-primary" name="Registrar" value="Registrar">
                </div>
            </form>  
        </div>
    </div>
</div>