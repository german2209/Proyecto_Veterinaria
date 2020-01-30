<?php 

	class EnlacesModel{
		public function paginaModel($enlaceModel){
	if ($enlaceModel == "login"  ||
			$enlaceModel == "panel-admin"	||
			$enlaceModel == "log-out" ||
			$enlaceModel == "citas" ||
			$enlaceModel == "clientes" ||
			$enlaceModel == "compras" ||
			$enlaceModel == "empleados"||
			$enlaceModel == "mascotas" ||
			$enlaceModel == "productos" ||
			$enlaceModel == "servicios" ||
			$enlaceModel == "usuarios"||
			$enlaceModel == "ventas"	||
			$enlaceModel == "updateCitas"	||
			$enlaceModel == "updateCompras" ||
			$enlaceModel == "updateClientes" ||
			$enlaceModel == "updateEmpleados" ||
			$enlaceModel == "updateProductos" ||
			$enlaceModel == "updateServicios" ||
			$enlaceModel == "updateMascotas"  ||
			$enlaceModel == "updateVentas"	||
			$enlaceModel == "updateUsuarios") {
				
				$seccion = "vistas/modulos/".$enlaceModel.".php";

				return $seccion;
			}else{
				$seccion = "vistas/modulos/login.php";
				return $seccion;
			}
		}


		
	}
 ?>