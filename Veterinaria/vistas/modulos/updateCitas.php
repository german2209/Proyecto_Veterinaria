
<div class="container">
<form method="POST">
<?php 
  $objUpdate = new controlador();
  $objUpdate -> DetalleCitaControlador();
  $objUpdate -> ActualizarCitaControlador();
 ?>
 </form>
</div>
