<?php
    require_once "conexion.php";

    class Usuarios extends Conexion{
        //CRUD DE USUARIOS
        public function CrearUsuarioModelo($datosModelo, $tabla){
            $sql = "INSERT INTO $tabla (nombre, username,password,email,tipo) 
                    VALUES ('$datosModelo[nombre]', 
                            '$datosModelo[username]',
                            '$datosModelo[password]',
                            '$datosModelo[email]',
                            '$datosModelo[tipo]');";	
            $sentencia = Conexion::conectar()->query($sql);
            if ($sentencia) {
                return "success";
            }else{
                return "fail";
            }
            $sentencia->close();
        }
        public function VerUsuarioModelo($tabla){
        
            $sql = "SELECT  id_usuario, nombre,username, password, email,tipo FROM $tabla;";	
            
            $sentencia = Conexion::conectar()->query($sql);
            $resultado = $sentencia->fetch_all();
            return $resultado;
            $sentencia->close();
        }
        public function DetalleUsuarioModelo($id, $tabla){
            $sql = "SELECT * FROM $tabla WHERE id_usuario = '$id';";
            $sentencia = Conexion::conectar()->query($sql);
            $resultado = $sentencia->fetch_assoc(); 
            return $resultado;
        }
        public function ActualizarUsuarioModelo($datos, $tabla){
            
            $sql = "UPDATE $tabla SET nombre = '$datos[nombre]', username = '$datos[username]', password = '$datos[password]', email = '$datos[email]', tipo = '$datos[tipo]'
            WHERE id_usuario = '$datos[id]';";
            $sentencia = Conexion::conectar()->query($sql);
            if ($sentencia) {
                return "success";
            }else{
                return "error";
            }
            $sentencia->close();
        }
        public function BorrarUsuarioModelo($datos, $tabla){
            $sql = "DELETE FROM $tabla WHERE id_usuario = '$datos';";
            $sentencia = Conexion::conectar()->query($sql);
            if ($sentencia) {
                return "success";
            }else{
                return "error";
            }
            $sentencia->close();
        }
        public function LoginUsuariosModelo($datosModel, $tabla){

            $sql = "SELECT  username, password, tipo, email FROM $tabla WHERE 

                    email = '$datosModel[correo]' AND 
                    password = '$datosModel[password]';";	

            $sentencia = Conexion::conectar()->query($sql);
            $resultado = $sentencia->fetch_assoc();

            if ($resultado>0) {
                return $resultado;
            }else{
                return "error";
            } 
            $sentencia->close();
        }
    }
    
    class Clientes extends Conexion{
        //CRUD DE CLIENTES

        //INSERTAR CLIENTES
        public function CrearClienteModelo($datosModelo, $tabla){
            $sql = "INSERT INTO $tabla (nombreC, apellidos, direccion, telefono, correo) 

                    VALUES ('$datosModelo[nombre]', 
                            '$datosModelo[apellido]', 
                            '$datosModelo[direccion]', 
                            '$datosModelo[telefono]', 
                            '$datosModelo[correo]');";	

            $sentencia = Conexion::conectar()->query($sql);
            //return $sql;
            if ($sentencia) {
                return "success";
            }else{
                return "fail";
            }
            $sentencia->close();
        }
        //VER CLIENTES
        public function VerClienteModelo($tabla){
        
            $sql = "SELECT  id_cliente, nombreC, apellidos, direccion, telefono, correo FROM $tabla;";	
            
            $sentencia = Conexion::conectar()->query($sql);
            $resultado = $sentencia->fetch_all();
            return $resultado;
            $sentencia->close();
        }
        
        //DETALLE CLIENTE
        public function DetalleClienteModelo($id, $tabla){
            $sql = "SELECT * FROM $tabla WHERE id_cliente = '$id';";
            $sentencia = Conexion::conectar()->query($sql);
            $resultado = $sentencia->fetch_assoc(); 
            return $resultado;
            $sentencia->close();
        }
        //ACTUALIZAR CLIENTE
        public function ActualizarClienteModelo($datos, $tabla){
        
            $sql = "UPDATE $tabla SET nombreC = '$datos[nombre]', apellidos = '$datos[apellido]', direccion = '$datos[direccion]', telefono = '$datos[telefono]', correo = '$datos[correo]'
            WHERE id_cliente = '$datos[id]';";
            $sentencia = Conexion::conectar()->query($sql);
            if ($sentencia) {
                return "success";
            }else{
                return "error";
            }
            $sentencia->close();
        }
        //BORRAR CLIENTE
        public function BorrarClienteModelo($datos, $tabla){
            $sql = "DELETE FROM $tabla WHERE id_cliente = '$datos';";
            $sentencia = Conexion::conectar()->query($sql);
            if ($sentencia) {
                return "success";
            }else{

                return "error";
            }
            $sentencia->close();
        }
        //CONSULTA CLIENTE
        public function allClienteModelo($tabla){
			$sql = "select id_cliente, concat(id_cliente,' - ', nombreC, ' ', apellidos) as nombre from $tabla order by nombre asc;";
			$rs = Conexion::conectar()->query($sql);
			$resultado = $rs->fetch_all();
			return $resultado;
			$rs->close();
		}
    }
    /*CRUD DE PRODUCTOS */
    class Productos extends Conexion{
        public function CrearProductoModelo($datosModelo, $tabla){
            $sql = "INSERT INTO $tabla (nombre_del_producto, costo, marca, fabricante, precio_de_venta) 
                    VALUES ('$datosModelo[nombre]', 
                            '$datosModelo[costo]', 
                            '$datosModelo[marca]', 
                            '$datosModelo[fabricante]', 
                            '$datosModelo[precioVenta]');";	
            $sentencia = Conexion::conectar()->query($sql);
            if ($sentencia) {
                return "success";
            }else{
                return "fail";
            }
            $sentencia->close();
        }
        public function VerProductoModelo($tabla){
        
            $sql = "SELECT  id_producto, nombre_del_producto, costo, marca, fabricante, precio_de_venta FROM $tabla;";	
            
            $sentencia = Conexion::conectar()->query($sql);
            $resultado = $sentencia->fetch_all();
            return $resultado;
            $sentencia->close();
        }
        public function DetalleProductoModelo($id, $tabla){
            $sql = "SELECT * FROM $tabla WHERE id_producto = '$id';";
            $sentencia = Conexion::conectar()->query($sql);
            $resultado = $sentencia->fetch_assoc(); 
            return $resultado;
        }
        public function ActualizarProductoModelo($datos, $tabla){
            
            $sql = "UPDATE $tabla SET nombre_del_producto = '$datos[nombre]', costo = '$datos[costo]', marca = '$datos[marca]', fabricante = '$datos[fabricante]', precio_de_venta = '$datos[precioVenta]'
            WHERE id_producto = '$datos[id]';";
            $sentencia = Conexion::conectar()->query($sql);
            if ($sentencia) {
                return "success";
            }else{
                return "error";
            }
            $sentencia->close();
        }
        public function BorrarProductoModelo($datos, $tabla){
            $sql = "DELETE FROM $tabla WHERE id_producto = '$datos';";
            $sentencia = Conexion::conectar()->query($sql);
            if ($sentencia) {
                return "success";
            }else{
                return "error";
            }
            $sentencia->close();
        }
        public function allProductoModelo($tabla){
            $sql = "select id_producto, concat(id_producto,' - ', nombre_del_producto) as nombre_del_producto from $tabla;";
            $rs = Conexion::conectar()->query($sql);
            $resultado = $rs->fetch_all();
            return $resultado;
            $rs->close(); 
        }
    }
    
    /**CRUD DE SERVICIOS**/
    class Servicios extends Conexion{
		
        public function CrearServicioModelo($datosModelo, $tabla){
            $sql = "INSERT INTO $tabla (nombre_del_servicio, costo, descripcion) 
                    VALUES ('$datosModelo[nombre]', 
                            '$datosModelo[costo]', 
                            '$datosModelo[descripcion]');";	
            $sentencia = Conexion::conectar()->query($sql);
            if ($sentencia) {
                return "success";
            }else{
                return "fail";
            }
            $sentencia->close();
        }
    
        public function VerServicioModelo($tabla){
            
            $sql = "SELECT  id_servicio,nombre_del_servicio, costo, descripcion FROM $tabla;";	
            
            $sentencia = Conexion::conectar()->query($sql);
            $resultado = $sentencia->fetch_all();
            return $resultado;
            $sentencia->close();
        }
        
        public function DetalleServicioModelo($id, $tabla){
            $sql = "SELECT * FROM $tabla WHERE id_servicio = '$id';";
            $sentencia = Conexion::conectar()->query($sql);
            $resultado = $sentencia->fetch_assoc(); 
            return $resultado;
        }
        public function ActualizarServicioModelo($datos, $tabla){
            
            $sql = "UPDATE $tabla SET nombre_del_servicio = '$datos[nombre]', costo = '$datos[costo]', descripcion = '$datos[descripcion]'
            WHERE id_servicio = '$datos[id]';";
            $sentencia = Conexion::conectar()->query($sql);
            if ($sentencia) {
                return "success";
            }else{
                return "error";
            }
            $sentencia->close();
        }
        public function BorrarServicioModelo($datos, $tabla){
            $sql = "DELETE FROM $tabla WHERE id_servicio = '$datos';";
            $sentencia = Conexion::conectar()->query($sql);
            if ($sentencia) {
                return "success";
            }else{
                return "error";
            }
            $sentencia->close();
        }
          //CONSULTA SERVICIO
        public function allServicioModelo($tabla){
			$sql = "select id_servicio, concat(id_servicio,' - ', nombre_del_servicio) as nombre from $tabla;";
			$rs = Conexion::conectar()->query($sql);
			$resultado = $rs->fetch_all();
			return $resultado;
			$rs->close();
		}
    }

    /**CRUD EMPLEADOS**/
    class Empleados extends Conexion{
		
        public function CrearEmpleadoModelo($datosModelo, $tabla){
            $sql = "INSERT INTO $tabla (nombre, apellido, telefono, correo, puesto) 
                    VALUES ('$datosModelo[nombre]', 
                            '$datosModelo[apellido]', 
                            '$datosModelo[telefono]', 
                            '$datosModelo[correo]', 
                            '$datosModelo[puesto]');";	
            $sentencia = Conexion::conectar()->query($sql);
            if ($sentencia) {
                return "success";
            }else{
                return "fail";
            }
            $sentencia->close();
        }
    
        public function VerEmpleadoModelo($tabla){
            
            $sql = "SELECT  id_empleado, nombre, apellido, telefono, correo, puesto FROM $tabla;";	
            
            $sentencia = Conexion::conectar()->query($sql);
            $resultado = $sentencia->fetch_all();
            return $resultado;
            $sentencia->close();
        }
        
        public function DetalleEmpleadoModelo($id, $tabla){
            $sql = "SELECT * FROM $tabla WHERE id_empleado = '$id';";
            $sentencia = Conexion::conectar()->query($sql);
            $resultado = $sentencia->fetch_assoc(); 
            return $resultado;
        }
        public function ActualizarEmpleadoModelo($datos, $tabla){
            
            $sql = "UPDATE $tabla SET nombre = '$datos[nombre]', apellido = '$datos[apellido]', telefono = '$datos[telefono]', correo = '$datos[correo]', puesto = '$datos[puesto]'
            WHERE id_empleado = '$datos[id]';";
            $sentencia = Conexion::conectar()->query($sql);
            if ($sentencia) {
                return "success";
            }else{
                return "error";
            }
            $sentencia->close();
        }
        public function BorrarEmpleadoModelo($datos, $tabla){
            $sql = "DELETE FROM $tabla WHERE id_empleado = '$datos';";
            $sentencia = Conexion::conectar()->query($sql);
            if ($sentencia) {
                return "success";
            }else{
                return "error";
            }
            $sentencia->close();
        }
        //CONSULTA EMPLEADO
        public function allEmpleadoModelo($tabla){
			$sql = "select id_empleado, concat(id_empleado,' - ', nombre) as nombre from $tabla;";
			$rs = Conexion::conectar()->query($sql);
			$resultado = $rs->fetch_all();
			return $resultado;
			$rs->close();
		}
    }

    /**CRUD MASCOTAS**/
    class Mascotas extends Conexion{
		
        public function CrearMascotaModelo($datosModelo, $tabla){
            $sql = "INSERT INTO $tabla (nombre, especie, raza, sexo, edad, tamano, peso, enfermedades, observaciones, id_cliente) 
                    VALUES ('$datosModelo[nombre]', 
                            '$datosModelo[especie]', 
                            '$datosModelo[raza]', 
                            '$datosModelo[sexo]', 
                            '$datosModelo[edad]',
                            '$datosModelo[tamano]', 
                            '$datosModelo[peso]', 
                            '$datosModelo[enfermedad]', 
                            '$datosModelo[observaciones]', 
                            '$datosModelo[cliente]');";	
            $sentencia = Conexion::conectar()->query($sql);
            if ($sentencia) {
                return "success";
            }else{
                return "fail";
            }
            $sentencia->close();
        }
        /*Modelo no utilizado*/
        public function VerMascotaModelo($tabla){
            
            $sql = "SELECT  id_mascota, nombre, especie, raza, sexo, edad, tamano, peso, enfermedades, observaciones, id_cliente FROM $tabla;";	
            
            $sentencia = Conexion::conectar()->query($sql);
            $resultado = $sentencia->fetch_all();
            return $resultado;
            $sentencia->close();
        }
        /*Modelo del inner para visualizar las mascotas con el nombre del cliente */
        public function InnerMascotaModel($View){
			$sql = "select * from $View ;";
			$rs = Conexion::conectar()->query($sql);
			$resultado = $rs->fetch_all();
			return $resultado;
			$rs->close();
		}
        
        public function DetalleMascotaModelo($id, $tabla){
            $sql = "SELECT * FROM $tabla WHERE id_mascota = '$id';";
            $sentencia = Conexion::conectar()->query($sql);
            $resultado = $sentencia->fetch_assoc(); 
            return $resultado;
        }
        public function ActualizarMascotaModelo($datos, $tabla){
            
            $sql = "UPDATE $tabla SET nombre = '$datos[nombre]', especie = '$datos[especie]', raza = '$datos[raza]', sexo = '$datos[sexo]', edad = '$datos[edad]' , tamano = '$datos[tamano]', peso = '$datos[peso]', enfermedades = '$datos[enfermedad]', observaciones = '$datos[observaciones]', id_cliente = '$datos[cliente]'
            WHERE id_mascota = '$datos[id]';";
            $sentencia = Conexion::conectar()->query($sql);
            if ($sentencia) {
                return "success";
            }else{
                return "error";
            }
            $sentencia->close();
        }
        public function BorrarMascotaModelo($datos, $tabla){
            $sql = "DELETE FROM $tabla WHERE id_mascota = '$datos';";
            $sentencia = Conexion::conectar()->query($sql);
            if ($sentencia) {
                return "success";
            }else{
                return "error";
            }
            $sentencia->close();
        }
    
    }

    /**CRUD VENTAS**/
    class Ventas extends Conexion{

        public function CrearVentaModelo($datosModelo, $tabla){
            $sql = "INSERT INTO $tabla (fecha, cantidad, precio_de_venta, total, id_producto)
                    VALUES('$datosModelo[fecha]',
                            '$datosModelo[cantidad]',
                            '$datosModelo[precio_de_venta]',
                            '$datosModelo[total]',
                            '$datosModelo[producto]');";
            $sentencia = Conexion::conectar()->query($sql);
            if ($sentencia) {
                return "success";
            }else{
                return "fail";
            }
            $sentencia->close();
        }
        public function VerVentaModelo($tabla){

            $sql = "SELECT id_venta, fecha, cantidad, precio_de_venta, total, id_producto FROM $tabla;";

            $sentencia = Conexion::conectar()->query($sql);
            $resultado = $sentencia->fetch_all();
            return $resultado;
            $sentencia->close();
        }
        public function InnerVentaModel($View){
			$sql = "select * from $View ;";
			$rs = Conexion::conectar()->query($sql);
			$resultado = $rs->fetch_all();
			return $resultado;
			$rs->close();
		}
        public function DetalleVentaModelo($id, $tabla){
            $sql = "SELECT * FROM $tabla WHERE id_venta = '$id';";
            $sentencia = Conexion::conectar()->query($sql);
            $resultado = $sentencia->fetch_assoc();
            return $resultado;
            $sentencia->close();
        }

        public function ActualizarVentaModelo($datos, $tabla){

            $sql = "UPDATE $tabla SET fecha = '$datos[fecha]', cantidad = '$datos[cantidad]', precio_de_venta = '$datos[precio]', total = '$datos[total]', id_producto ='$datos[producto]'
            WHERE id_venta = '$datos[id]';";
            $sentencia = Conexion::conectar()->query($sql);
            if ($sentencia) {
                return "success";
            }else{
                return "error";
            }
            $sentencia->close();
        }
        public function BorrarVentaModelo($datos, $tabla){
            $sql = "DELETE FROM $tabla WHERE id_venta = '$datos';";
            $sentencia = Conexion::conectar()->query($sql);
            if ($sentencia) {
                return "success";
            }else{
                return "error";
            }
            $sentencia->close();
        }
        
    }
    class Compras extends Conexion{
		
        public function CrearCompraModelo($datosModelo, $tabla){
            $sql = "INSERT INTO $tabla (cantidad, fecha_de_compra, total, id_producto) 
                    VALUES ('$datosModelo[cantidad]', 
                            '$datosModelo[fecha]', 
                            '$datosModelo[total]', 
                            '$datosModelo[producto]');";	
            $sentencia = Conexion::conectar()->query($sql);
            if ($sentencia) {
                return "success";
            }else{
                return "fail";
            }
            $sentencia->close();
        }
    
        public function VerCompraModelo($tabla){
            
            $sql = "SELECT  id_compra, cantidad, fecha_de_compra, total, id_producto FROM $tabla;";	
            
            $sentencia = Conexion::conectar()->query($sql);
            $resultado = $sentencia->fetch_all();
            return $resultado;
            $sentencia->close();
        }
        public function InnerCompraModel($View){
			$sql = "select * from $View ;";
			$rs = Conexion::conectar()->query($sql);
			$resultado = $rs->fetch_all();
			return $resultado;
			$rs->close();
		}
        public function DetalleCompraModelo($id, $tabla){
            $sql = "SELECT * FROM $tabla WHERE id_compra = '$id';";
            $sentencia = Conexion::conectar()->query($sql);
            $resultado = $sentencia->fetch_assoc(); 
            return $resultado;
        }
        public function ActualizarCompraModelo($datos, $tabla){
            
            $sql = "UPDATE $tabla SET cantidad = '$datos[cantidad]', fecha_de_compra = '$datos[fecha]', total = '$datos[total]', id_producto = '$datos[producto]'
            WHERE id_compra = '$datos[id]';";
            $sentencia = Conexion::conectar()->query($sql);
            if ($sentencia) {
                return "success";
            }else{
                return "error";
            }
            $sentencia->close();
        }
        public function BorrarCompraModelo($datos, $tabla){
            $sql = "DELETE FROM $tabla WHERE id_compra = '$datos';";
            $sentencia = Conexion::conectar()->query($sql);
            if ($sentencia) {
                return "success";
            }else{
                return "error";
            }
            $sentencia->close();
        }
    
    }
    class Citas extends Conexion{
		
        public function CrearCitaModelo($datosModelo, $tabla){
            $sql = "INSERT INTO $tabla (fecha, hora, id_cliente, id_servicio, id_empleado) 
                    VALUES ('$datosModelo[fecha]', 
                            '$datosModelo[hora]', 
                            '$datosModelo[cliente]', 
                            '$datosModelo[servicio]',
                            '$datosModelo[empleado]');";	
            $sentencia = Conexion::conectar()->query($sql);
            if ($sentencia) {
                return "success";
            }else{
                return "fail";
            }
            $sentencia->close();
        }
    
        public function VerCitaModelo($tabla){
            
            $sql = "SELECT  id_cita, fecha, hora, id_cliente, id_servicio, id_empleado FROM $tabla;";	
            
            $sentencia = Conexion::conectar()->query($sql);
            $resultado = $sentencia->fetch_all();
            return $resultado;
            $sentencia->close();
        }
        public function InnerCitaModelo($View){
			$sql = "select * from $View ;";
			$rs = Conexion::conectar()->query($sql);
			$resultado = $rs->fetch_all();
			return $resultado;
			$rs->close();
		}
        public function DetalleCitaModelo($id, $tabla){
            $sql = "SELECT * FROM $tabla WHERE id_cita = '$id';";
            $sentencia = Conexion::conectar()->query($sql);
            $resultado = $sentencia->fetch_assoc(); 
            return $resultado;
        }
        public function ActualizarCitaModelo($datos, $tabla){
            
            $sql = "UPDATE $tabla SET fecha = '$datos[fecha]', hora = '$datos[hora]', id_cliente = '$datos[cliente]', id_servicio = '$datos[servicio]' , id_empleado = '$datos[empleado]'
            WHERE id_cita = '$datos[id]';";
            $sentencia = Conexion::conectar()->query($sql);
            if ($sentencia) {
                return "success";
            }else{
                return "error";
            }
            $sentencia->close();
        }
        public function BorrarCitaModelo($datos, $tabla){
            $sql = "DELETE FROM $tabla WHERE id_cita = '$datos';";
            $sentencia = Conexion::conectar()->query($sql);
            if ($sentencia) {
                return "success";
            }else{
                return "error";
            }
            $sentencia->close();
        }
    
    }
?>