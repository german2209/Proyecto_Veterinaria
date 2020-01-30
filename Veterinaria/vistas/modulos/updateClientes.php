<div class="container">
<form method="POST">
<?php 
  $objUpdate = new controlador();
  $objUpdate -> DetalleClienteControlador();
  $objUpdate -> ActualizarClienteControlador();
 ?>
 </form>
</div>
