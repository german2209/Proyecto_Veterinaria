<?php 
	class Conexion{
		public function conectar(){
			$con = new mysqli('localhost', 'root', '', 'veterinaria');
			return $con;
		}
	}
?>
