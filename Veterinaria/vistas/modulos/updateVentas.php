<div class="container">
<form method="POST">
<?php 
  $objUpdate = new controlador();
  $objUpdate -> DetalleVentaControlador();
  $objUpdate -> ActualizarVentaControlador();
 ?>
 </form>
</div>