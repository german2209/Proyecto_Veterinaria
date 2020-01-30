<div class="container">
<form method="POST">
<?php 
  $objUpdate = new controlador();
  $objUpdate -> DetalleProductoControlador();
  $objUpdate -> ActualizarProductoControlador();
 ?>
 </form>
</div>
