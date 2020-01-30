<?php
    class controlador {
        
        public function plantilla(){
            include 'vistas/plantilla.php';
		}
		
		public function paginaController(){
			if (isset($_GET["action"])) {
				$enlaceController = $_GET["action"];
			}else{
				$enlaceController = 'login';
			}

			$respuesta = EnlacesModel::paginaModel($enlaceController);
			include $respuesta;
        }
        /****CRUD CLIENTES****/
        //CREAR CLIENTES
        public function CrearClienteControlador(){
                    if (isset($_POST["Registrar"])){
                        
                        $datosController = array(
                                            "nombre"       => $_POST["nombre"],
                                            "apellido"     => $_POST["apellido"],
                                            "direccion"    => $_POST["direccion"],
                                            "telefono"     => $_POST["telefono"],
                                            "correo"       => $_POST["correo"]);

                        $respuesta = Clientes::CrearClienteModelo($datosController, "clientes");
                        //echo $respuesta;
                        
                        if($respuesta == "success"){
                            //header("Location:index.php?action=ok");
                            echo "<script type='text/javascript'>
                                    alert('Cliente Registrado');
                                    window.location.assign('index.php?action=clientes');
                                    </script>";
                        }else{
                            echo $respuesta;
                        }
                    }
                }
        //VER CLIENTES     
        public function VerClienteControlador(){

            $respuesta = Clientes::VerClienteModelo("clientes");

            foreach ($respuesta as $row => $item) {
                echo '<tr>
                        <td>'.$item[0].'</td>
                        <td>'.$item[1].'</td>
                        <td>'.$item[2].'</td>
                        <td>'.$item[3].'</td>
                        <td>'.$item[4].'</td>
                        <td>'.$item[5].'</td>
                        <td><a href="index.php?action=updateClientes&id='.$item[0].'"><i class="material-icons">edit</i></a><a
                            href="index.php?action=clientes&id_borrar='.$item[0].'"><i class="material-icons red-text accent-4">delete</i></a></td>
                        </tr>';
            }
        }
        //DETALLE DE CLIENTES
        public function DetalleClienteControlador(){
            $id = $_GET["id"];
            $respuesta = Clientes::DetalleClienteModelo($id, "clientes");

            echo '
            <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nombre</label>
                    <input type="text" class="form-control" name="nombre"  value="'.$respuesta['nombreC'].'"> 
                </div>
        
                <div class="form-group  col-md-6">      
                    <label>Apellido</label>
                    <input type="text" class="form-control" name="apellido" value="'.$respuesta['apellidos'].'"  required>
                </div>
            </div>
        
            <div class="form-row">
        
                <div class="form-group  col-md-4">      
                    <label>Direccion</label>
                    <input type="text" class="form-control" name="direccion" value="'.$respuesta['direccion'].'"  required>
                </div>
                <div class="form-group col-md-4">
                    <label>Telefono</label>
                    <input type="tel" class="form-control" name="telefono" value="'.$respuesta['telefono'].'"  required>
                </div>
        
                <div class="form-group  col-md-4">      
                    <label>Correo</label>
                    <input type="text" class="form-control" name="correo" value="'.$respuesta['correo'].'" required>
                </div>
            </div> 
            <div class="row justify-content-center">
                <input type="submit" class="btn btn-primary" name="Cambios" value="Guardar Cambios">
            </div>
            </form>
                 ';
        }
        //ACTUALIZAR CLIENTES
        public function ActualizarClienteControlador(){
            if (isset($_POST["Cambios"])&&isset($_GET["id"])){

                $datosController = array(
                                            "id"                    => $_GET["id"],
                                            "nombre"                => $_POST["nombre"],
                                            "apellido"              => $_POST["apellido"],
                                            "direccion"             => $_POST["direccion"],
                                            "telefono"              => $_POST["telefono"],
                                            "correo"                => $_POST["correo"]);
                $respuesta = Clientes::ActualizarClienteModelo($datosController, "clientes");
                if($respuesta == "success"){
                    echo '<script type="text/javascript">
                    alert ("Usuario actualizado");
                    window.location.assign("index.php?action=clientes");
                </script>';
                }else{
                    echo '<script type="text/javascript">
                    alert ("Hay un error revisa los datos");
                </script>';
                }
            }
        }
        //ELIMINAR CLIENTES
        public function BorrarClienteControlador(){
            if (isset($_GET["id_borrar"])){
                $datosController = $_GET["id_borrar"];

                $respuesta = Clientes::BorrarClienteModelo($datosController, "clientes");
                if($respuesta == "success"){
                    echo '<script type="text/javascript">
                    alert ("Usuario Eliminado");
                    window.location.assign("index.php?action=clientes");
                  </script>';
                }else{
                    echo "Ocurrio un error";
                }
            }
        }
        //DESPLIEGUE DE TODOS LOS CLIENTES
        public function allClienteControlador(){
            $respuesta = Clientes::allClienteModelo("clientes");
            foreach ($respuesta as $row => $item) {
			 	echo '<option value="'.$item[0].'">'.$item[1].'</option>';
            }
		}

        /***CRUD DE PRODUCTOS***/
        
        //CREAR PRODUCTOS
        public function CrearProductoControlador(){
            if(isset($_POST["Registrar"])){

            $datosController = array(
                                        "nombre"           => $_POST["nombre"],
                                        "costo"            => $_POST["costo"],
                                        "marca"            => $_POST["marca"],
                                        "fabricante"       => $_POST["fabricante"],
                                        "precioVenta"      => $_POST["precioVenta"]);
                                        
            $respuesta = Productos::CrearProductoModelo($datosController, "productos");
                if($respuesta == "success"){
                    echo "<script type='text/javascript'>
                                alert('Producto Registrado');
                                window.location.assign('index.php?action=productos');
                                </script>";
                }else{
                    echo $respuesta;
                }
            }
        }
        //VER PRODUCTOS
        public function VerProductoControlador(){
            $respuesta = Productos::VerProductoModelo("productos");

            foreach($respuesta as $row => $item) {
                echo '
                        <tr>
                            <td>'.$item[0].'</td>
                            <td>'.$item[1].'</td>
                            <td>'.$item[2].'</td>
                            <td>'.$item[3].'</td>
                            <td>'.$item[4].'</td>
                            <td>'.$item[5].'</td>
                            <td><a href="index.php?action=updateProductos&id='.$item[0].'"><i class="material-icons">edit</i></a><a
                            href="index.php?action=productos&id_borrar='.$item[0].'"><i class="material-icons red-text accent-4">delete</i></a></td>
                        </tr> ';
            }
        }
        public function DetalleProductoControlador(){
            $id = $_GET["id"];
            $respuesta = Productos::DetalleProductoModelo($id, "productos");

            echo '
                <form>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="'.$respuesta['nombre_del_producto'].'" required>
                    </div>
                    <div class="form-group  col-md-4">
                        <label>Costo</label>
                        <input type="text" class="form-control" name="costo"  value="'.$respuesta['costo'].'" required>
                    </div>
                    <div class="form-group  col-md-4">
                        <label>Marca</label>
                        <input type="text" class="form-control" name="marca"  value="'.$respuesta['marca'].'" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Fabricante</label>
                        <input type="text" class="form-control" name="fabricante"  value="'.$respuesta['fabricante'].'" required>
                    </div>
                    <div class="form-group  col-md-6">
                        <label>Precio de venta</label>
                        <input type="text" class="form-control" name="precioVenta" value="'.$respuesta['precio_de_venta'].'" required>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <input type="submit" class="btn btn-primary" name="Cambios" value="Guardar Cambios">
                </div>
            </form>
                    ';
        }
        public function ActualizarProductoControlador(){
            if(isset($_POST["Cambios"])&&isset($_GET["id"])){

                $datosController = array(
                                            "id"                    => $_GET["id"],
                                            "nombre"                => $_POST["nombre"],
                                            "costo"                 => $_POST["costo"],
                                            "marca"                 => $_POST["marca"],
                                            "fabricante"            => $_POST["fabricante"],
                                            "precioVenta"                => $_POST["precioVenta"]);

                $respuesta = Productos::ActualizarProductoModelo($datosController, "productos");
                if($respuesta == "success"){
                    echo '<script type="text/javascript">
                    alert ("Prodcuto Actualizado");
                    window.location.assign("index.php?action=productos");
                      </script>';
                }else{
                    echo '<script type="text/javascript">
                    alert ("Hay un error revisa los datos");
                      </script>';
                }
            }
        }
        public function BorrarProductoControlador(){
            if(isset($_GET["id_borrar"])){
                $datosController = $_GET["id_borrar"];

                $respuesta = Productos::BorrarProductoModelo($datosController, "productos");
                if($respuesta == "success"){
                    echo '<script type="text/javascript">
                    alert ("Producto Eliminado");
                    window.location.assign("index.php?action=productos");
                  </script>';
                }else{
                    echo "ocurrio un error";
                }
            }
        }

        /***CRUD DE USUARIOS***/

        //CREAR USUARIOS
        public function CrearUsuarioControlador(){
            if (isset($_POST["Registrar"])){

                $datosController = array(
                                            "nombre"          => $_POST ["nombre"],
                                            "username"        => $_POST ["username"],
                                            "password"        => $_POST["password"],
                                            "email"           => $_POST ["email"],
                                            "tipo"            => $_POST["tipo"]);
                                            
                $respuesta = Usuarios::CrearUsuarioModelo($datosController, "usuarios2");
                if($respuesta == "success"){
                    //header("Location:index.php?action=ok");
                    echo "<script type='text/javascript'>
                    alert('Usuario Registrado');
                    window.location.assign('index.php?action=usuarios');
                    </script>";
                }else{
                    //var_dump($respuesta);
                    echo $respuesta;
                }   
            }
        }
        //VER USUARIOS
        public function VerUsuarioControlador(){

            $respuesta = Usuarios::VerUsuarioModelo("usuarios2");

            foreach ($respuesta as $row => $item) {
                echo '<tr>
                        <td>'.$item[0].'</td>
                        <td>'.$item[1].'</td>
                        <td>'.$item[2].'</td>
                        <td>'.$item[3].'</td>
                        <td>'.$item[4].'</td>
                        <td>'.$item[5].'</td>
                        <td><a href="index.php?action=updateUsuarios&id='.$item[0].'"><i class="material-icons">edit</i></a><a
                         href="index.php?action=usuarios&id_borrar='.$item[0].'"><i class="material-icons red-text accent-4">delete</i></a></a></td>
                     </tr>';
            }
        }
        public function DetalleUsuarioControlador(){
            $id = $_GET["id"];
            $respuesta = Usuarios::DetalleUsuarioModelo($id, "usuarios2");
           
            echo '
            <div class="form-row">
                <div class="form-group col-md-3 offset-2">
                    <label>Nombre:</label>
                    <input type="text" class="form-control" name="nombre" value="'.$respuesta['nombre'].'">
                </div>
                <div class="form-group col-md-3">
                    <label>Username:</label>
                    <input type="text" class="form-control" name="username"  value="'.$respuesta['username'].'">
                </div>
                <div class="form-group col-md-2">
                    <label>Password:</label>
                    <input type="text" class="form-control" name="password"  value="'.$respuesta['password'].'">
                </div>
            </div> 
            <div class="form-row">
                <div class="form-group col-md-4 offset-3">
                    <label>Correo:</label>
                    <input type="email" class="form-control" name="email"  value="'.$respuesta['email'].'">
                </div>
                <div class="form-group col-md-2">
                <label>Tipo de usuario:</label>
                <input type="text" class="form-control" value="'.$respuesta['tipo'].'" name="tipo" value="">
              </div>
            </div>
            <div class="row justify-content-center">
                <input type="submit" class="btn btn-primary" name="Cambios" value="Guardar Cambios">
            </div>
          
                    ';
        }
        public function ActualizarUsuarioControlador(){
            if (isset($_POST["Cambios"])&&isset($_GET["id"])){

                $datosController = array(
                                            "id"                    => $_GET["id"],
                                            "nombre"                  => $_POST["nombre"],
                                            "username"                  => $_POST["username"],
                                            "password"              => $_POST["password"],
                                            "email"                  => $_POST["email"],
                                            "tipo"                  => $_POST["tipo"]);
            
                $respuesta = Usuarios::ActualizarUsuarioModelo($datosController, "usuarios2");
                if($respuesta == "success"){
                    echo '<script type="text/javascript">
			      alert ("Usuario actualizado");
			      window.location.assign("index.php?action=usuarios");
			    </script>';
                }else{
                    echo '<script type="text/javascript">
			      alert ("Hay un error revisa los datos");
			    </script>';
                }
            }
        }
        public function BorrarUsuarioControlador(){
            if (isset($_GET["id_borrar"])){
                $datosController = $_GET["id_borrar"];

                $respuesta = Usuarios::BorrarUsuarioModelo($datosController, "usuarios2");
                if($respuesta == "success"){
                    echo '<script type="text/javascript">
			      alert ("Usuario Eliminado");
			      window.location.assign("index.php?action=usuarios");
			    </script>';
                }else{
                    echo "Ocurrio un error";
                }
            }
        }

        /***CRUD SERVICIOS***/
        
        //CREAR SERVICIOS
        public function CrearServicioControlador(){
            if (isset($_POST["Registrar"])){
               
                $datosController = array(
                                            "nombre"                    => $_POST["nombre"],
                                            "costo"                     => $_POST["costo"],
                                            "descripcion"               => $_POST["descripcion"]);
                $respuesta = Servicios::CrearServicioModelo($datosController, "servicios");
                if($respuesta == "success"){
                    echo "<script type='text/javascript'>
                    alert('Servicio Registrado');
                    window.location.assign('index.php?action=servicios');
                    </script>";
                }else{
                    echo $respuesta;
                }
            }
        }
        //VER LOS SERVICIOS
        public function VerServicioControlador(){

            $respuesta = Servicios::VerServicioModelo("servicios");

            foreach ($respuesta as $row => $item) {
                echo '<tr>
                            <td>'.$item[0].'</td>
                            <td>'.$item[1].'</td>
                            <td>'.$item[2].'</td>
                            <td>'.$item[3].'</td>
                            <td><a href="index.php?action=updateServicios&id='.$item[0].'"><i class="material-icons">edit</i></a><a
                            href="index.php?action=servicios&id_borrar='.$item[0].'"><i class="material-icons red-text accent-4">delete</i></a></a></td>
                        </tr>';
            }
        }
        //DETALLES DE LOS SERVICIOS
        public function DetalleServicioControlador(){
            $id = $_GET["id"];
            $respuesta = Servicios::DetalleServicioModelo($id, "servicios");

            echo '
            <form>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="'.$respuesta['nombre_del_servicio'].'"  required>
                </div>
                <div class="form-group  col-md-4">
                    <label>Costo</label>
                    <input type="text" class="form-control" name="costo" value="'.$respuesta['costo'].'"  required>
                </div>
                <div class="form-group col-md-4">
                    <label>Descripcion</label>
                    <input type="text" class="form-control" name="descripcion" value="'.$respuesta['descripcion'].'"  required>
                </div>
            </div>
            <div class="row justify-content-center">
             <input type="submit" class="btn btn-primary" name="Cambios" value="Guardar Cambios">
            </div>
            </form>     
            ';         
        }
        //ACTUALIZAR SERVICIOS
        public function ActualizarServicioControlador(){
            if (isset($_POST["Cambios"])&&isset($_GET["id"])){

                $datosController = array(
                                            "id"                    => $_GET["id"],
                                            "nombre"                => $_POST["nombre"],
                                            "costo"                 => $_POST["costo"],
                                            "descripcion"           => $_POST["descripcion"]);
                $respuesta = Servicios::ActualizarServicioModelo($datosController, "servicios");
                if($respuesta == "success"){
                    echo '<script type="text/javascript">
                    alert ("Usuario actualizado");
                    window.location.assign("index.php?action=servicios");
                      </script>';
                }else{
                    echo '<script type="text/javascript">
                    alert ("Hay un error revisa los datos");
                      </script>';
                }
            }
        }
        //ELIMINAR SERVICIOS
        public function BorrarServicioControlador(){
            if (isset($_GET["id_borrar"])){
                $datosController = $_GET["id_borrar"];

                $respuesta = Servicios::BorrarServicioModelo($datosController, "servicios");
                if($respuesta == "success"){
                    echo '<script type="text/javascript">
                    alert ("Usuario Eliminado");
                    window.location.assign("index.php?action=servicios");
                  </script>';
                }else{
                    echo "ocurrio un error";
                }
            }
        }
        public function allServicioControlador(){
            $respuesta = Servicios::allServicioModelo("servicios");
            foreach ($respuesta as $row => $item) {
                echo '<option value="'.$item[0].'">'.$item[1].'</option>';
            }
        }

        //CRUD EMPLEADOS

        public function CrearEmpleadoControlador(){
            if(isset($_POST["Registrar"])){

                $datosController = array(
                                            "nombre"                    => $_POST["nombre"],
                                            "apellido"                  => $_POST["apellido"],
                                            "telefono"                  => $_POST["telefono"],
                                            "correo"                    => $_POST["correo"],
                                            "puesto"                    => $_POST["puesto"]);

                $respuesta = Empleados::CrearEmpleadoModelo($datosController, "empleados");
                if($respuesta == "success"){
                    echo "<script type='text/javascript'>
                            alert('Empleado Registrado');
                            window.location.assign('index.php?action=empleados');
                            </script>";
                }else{
                    echo $respuesta;
                }
            }
        }
        public function VerEmpleadoControlador(){
            $respuesta = Empleados::VerEmpleadoModelo("empleados");

            foreach ($respuesta as $row => $item) {
                echo '<tr>
                            <td>'.$item[0].'</td>
                            <td>'.$item[1].'</td>
                            <td>'.$item[2].'</td>
                            <td>'.$item[3].'</td>
                            <td>'.$item[4].'</td>
                            <td>'.$item[5].'</td>
                            <td><a href="index.php?action=updateEmpleados&id='.$item[0].'"><i class="material-icons">edit</i></a><a
                            href="index.php?action=empleados&id_borrar='.$item[0].'"><i class="material-icons red-text accent-4">delete</i></a></a></td>
                        </tr>';
            }
        }
        public function DetalleEmpleadoControlador(){
            $id = $_GET["id"];
            $respuesta = Empleados::DetalleEmpleadoModelo($id, "empleados");

            echo '
            <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="'.$respuesta['nombre'].'" required>
                </div>
                <div class="form-group  col-md-6">
                    <label>Apellido</label>
                    <input type="text" class="form-control" name="apellido" value="'.$respuesta['apellido'].'" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Telefono</label>
                    <input type="tel" class="form-control" name="telefono" value="'.$respuesta['telefono'].'" required>
                </div>
                <div class="form-group  col-md-4">
                    <label>Correo</label>
                    <input type="text" class="form-control" name="correo" value="'.$respuesta['correo'].'" required>
                </div>
                <div class="form-group  col-md-4">
                    <label>Puesto</label>
                    <input type="text" class="form-control" name="puesto" value="'.$respuesta['puesto'].'" required>
                </div>
            </div>
            <div class="row justify-content-center">
                <input type="submit" class="btn btn-primary" name="Cambios" value="Cambios">
            </div>
            
            </form>
                    ';
        }
        public function ActualizarEmpleadoControlador(){
            if(isset($_POST["Cambios"])&&isset($_GET["id"])){

                $datosController = array(
                                            "id"                    => $_GET["id"],
                                            "nombre"                => $_POST["nombre"],
                                            "apellido"              => $_POST["apellido"],
                                            "telefono"              => $_POST["telefono"],
                                            "correo"                => $_POST["correo"],
                                            "puesto"                => $_POST["puesto"]);
                
                $respuesta = Empleados::ActualizarEmpleadoModelo($datosController, "empleados");
                if($respuesta == "success"){
                    echo '<script type="text/javascript">
                    alert ("Usuario actualizado");
                    window.location.assign("index.php?action=empleados");
                      </script>';
                }else{
                    echo '<script type="text/javascript">
                    alert ("Hay un error revisa los datos");
                      </script>';
                }
            }
        }
        public function BorrarEmpleadoControlador(){
            if(isset($_GET["id_borrar"])){
                $datosController = $_GET["id_borrar"];

                $respuesta = Empleados::BorrarEmpleadoModelo($datosController, "empleados");
                if($respuesta == "success"){
                    echo '<script type="text/javascript">
                    alert ("Empleado Eliminado");
                    window.location.assign("index.php?action=empleados");
                  </script>';
                }else{
                    echo "ocurrio un error";
                }
            }
        }
        public function allEmpleadoControlador(){
            $respuesta = Empleados::allEmpleadoModelo("empleados");
            foreach ($respuesta as $row => $item) {
                echo '<option value="'.$item[0].'">'.$item[1].'</option>';
            }
        }
        /**CRUD VENTAS */

        public function CrearVentaControlador(){
            if (isset($_POST["Registrar"])){

                $datosController = array(
                                            "fecha"         => $_POST["fecha"],
                                            "cantidad"      => $_POST["cantidad"],
                                            "precio_de_venta"   => $_POST["precio_de_venta"],
                                            "total"         => $_POST["total"],
                                            "producto"    => $_POST["producto"]);

                $respuesta = Ventas::CrearVentaModelo($datosController, "ventas");
                if($respuesta == "success"){
                    echo "<script type='text/javascript'>
                                    alert('Venta Registrada');
                                    window.location.assign('index.php?action=ventas');
                                    </script>";
                }else{
                    echo $respuesta;
                }
            }
        }
        /*Controlador no utilizado */
        public function VerVentaControlador(){

            $respuesta = Ventas::VerVentaModelo("ventas");

            foreach ($respuesta as $row => $item) {
                echo '
                        <tr>
                            <td>'.$item[0].'</td>
                            <td>'.$item[1].'</td>
                            <td>'.$item[2].'</td>
                            <td>'.$item[3].'</td>
                            <td>'.$item[4].'</td>
                            <td>'.$item[5].'</td>
                            <td><a href="index.php?action=updateVentas&id='.$item[0].'"><i class="material-icons">edit</i></a><a
                            href="index.php?action=ventas&id_borrar='.$item[0].'"><i class="material-icons red-text accent-4">delete</i></a></td>
                        </tr>';
            }
        }
        public function InnerVentaControlador(){

            $respuesta = Ventas::InnerVentaModel("VistaVenta");

            foreach ($respuesta as $row => $item) {
                echo '
                        <tr>
                            <td>'.$item[0].'</td>
                            <td>'.$item[1].'</td>
                            <td>'.$item[2].'</td>
                            <td>'.$item[3].'</td>
                            <td>'.$item[4].'</td>
                            <td>'.$item[5].'</td>
                            <td><a href="index.php?action=updateVentas&id='.$item[0].'"><i class="material-icons">edit</i></a><a
                            href="index.php?action=ventas&id_borrar='.$item[0].'"><i class="material-icons red-text accent-4">delete</i></a></td>
                        </tr>';
            }
        }
        public function DetalleVentaControlador(){
            $id = $_GET["id"];
            $respuesta = Ventas::DetalleVentaModelo($id, "ventas");

                echo '

                <form action="">

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Producto:</label>
                        <input type="text" class="form-control" name="producto" value="'.$respuesta['id_producto'].'">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Fecha:</label>
                        <input type="date" class="form-control" name="fecha" value="'.$respuesta['fecha'].'">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Cantidad:</label>
                        <input type="int" class="form-control" name="cantidad" value="'.$respuesta['cantidad'].'">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Precio de venta:</label>
                        <input type="float" class="form-control" name="precio" value="'.$respuesta['precio_de_venta'].'">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Total</label>
                        <input type="float" class="form-control" name="total" value="'.$respuesta['total'].'">
                    </div>
                </div>
                <div class="row justify-content-center">
                        <input type="submit" name="Cambios" value ="Guardar Cambios" class="btn btn-primary">
                    </div>
            </form>';
        }
        public function ActualizarVentaControlador(){
            if (isset($_POST["Cambios"])&&isset($_GET["id"])){

                $datosController = array(
                                            "id"                => $_GET["id"],
                                            "fecha"             => $_POST["fecha"],
                                            "cantidad"          => $_POST["cantidad"],
                                            "precio"            => $_POST["precio"],
                                            "total"             => $_POST["total"],
                                            "producto"        => $_POST["producto"]);
                $respuesta = Ventas::ActualizarVentaModelo($datosController, "ventas");
                if($respuesta == "success"){
                    echo '<script type="text/javascript">
                    alert ("Venta actualizada");
                    window.location.assign("index.php?action=ventas");
                </script>';
                }else{
                    echo '<script type="text/javascript">
                    alert ("Hay un error revisa los datos");
                </script>';
                }
            }
        }
        public function BorrarVentaControlador(){
            if (isset($_GET["id_borrar"])){
                $datosController = $_GET["id_borrar"];

                $respuesta = Ventas::BorrarVentaModelo($datosController, "ventas");
                if($respuesta == "success"){
                    echo '<script type="text/javascript">
                    alert ("Venta Eliminada");
                    window.location.assign("index.php?action=ventas");
                  </script>';
                }else{
                    echo "Ocurrio un error";
                }
            }
        }
        public function allProductoControlador(){
            $respuesta = Productos::allProductoModelo("productos");
            foreach ($respuesta as $row => $item) {
                echo '<option value="'.$item[0].'">'.$item[1].'</option>';
            }
        }
        

        //CRUD MASCOTAS

        public function CrearMascotaControlador(){
            if (isset($_POST["Registrar"])){

                $datosController = array(
                                            "nombre"                    => $_POST["nombre"],
                                            "especie"                   => $_POST["especie"],
                                            "raza"                      => $_POST["raza"],
                                            "sexo"                      => $_POST["sexo"],
                                            "edad"                      => $_POST["edad"],
                                            "tamano"                    => $_POST["tamano"],
                                            "peso"                      => $_POST["peso"],
                                            "enfermedad"                => $_POST["enfermedad"],
                                            "observaciones"             => $_POST["observaciones"],
                                            "cliente"                   => $_POST["cliente"]);
                $respuesta = Mascotas::CrearMascotaModelo($datosController, "mascotas");
                if($respuesta == "success"){
                    echo "<script type='text/javascript'>
                                    alert('Mascota Registrado');
                                    window.location.assign('index.php?action=mascotas');
                                    </script>";
                        }else{
                            echo $respuesta;
                }
            }
        }
        /*Controlador no utilizado */
        public function VerMascotaControlador(){

            $respuesta = Mascotas::VerMascotaModelo("mascotas");

            foreach ($respuesta as $row => $item) {
                 echo '<tr>
                            <td>'.$item[0].'</td>
                            <td>'.$item[1].'</td>
                            <td>'.$item[2].'</td>
                            <td>'.$item[3].'</td>
                            <td>'.$item[4].'</td>
                            <td>'.$item[5].'</td>
                            <td>'.$item[6].'</td>
                            <td>'.$item[7].'</td>
                            <td>'.$item[8].'</td>
                            <td>'.$item[9].'</td>
                            <td>'.$item[10].'</td>
                            <td><a href="index.php?action=updateMascotas&id='.$item[0].'"><i class="material-icons">edit</i></a><a
                            href="index.php?action=mascotas&id_borrar='.$item[0].'"><i class="material-icons red-text accent-4">delete</i></a></a></td>
                        </tr>';
            }
        }
        public function InnerMascotaControlador(){

            $respuesta = Mascotas::InnerMascotaModel("VistaMas");

            foreach ($respuesta as $row => $item) {
                 echo '<tr>
                            <td>'.$item[0].'</td>
                            <td>'.$item[1].'</td>
                            <td>'.$item[2].'</td>
                            <td>'.$item[3].'</td>
                            <td>'.$item[4].'</td>
                            <td>'.$item[5].'</td>
                            <td>'.$item[6].'</td>
                            <td>'.$item[7].'</td>
                            <td>'.$item[8].'</td>
                            <td>'.$item[9].'</td>
                            <td>'.$item[10].'</td>
                            <td><a href="index.php?action=updateMascotas&id='.$item[0].'"><i class="material-icons">edit</i></a><a
                            href="index.php?action=mascotas&id_borrar='.$item[0].'"><i class="material-icons red-text accent-4">delete</i></a></a></td>
                        </tr>';
            }
        }
        public function DetalleMascotaControlador(){
            $id = $_GET["id"];
            $respuesta = Mascotas::DetalleMascotaModelo($id, "mascotas");

            echo '
            <form>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Cliente:</label>
                    <input type="text" class="form-control" name="cliente" value="'.$respuesta['id_cliente'].'" required>
                </div>
                <div class="form-group col-md-4">
                    <label>Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="'.$respuesta['nombre'].'" required>
                </div>
                <div class="form-group col-md-4">
                    <label>Especie</label>
                    <input type="text" class="form-control" name="especie" value="'.$respuesta['especie'].'" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Raza</label>
                    <input type="text" class="form-control" name="sexo" value="'.$respuesta['sexo'].'" required>
                </div>
                <div class="form-group col-md-4">
                    <label>Sexo</label>
                    <input type="text" class="form-control" name="raza" value="'.$respuesta['raza'].'" required>
                </div>
                <div class="form-group col-md-4">
                    <label>Edad</label>
                    <input type="text" class="form-control" name="edad" value="'.$respuesta['edad'].'" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label>Tamaño</label>
                    <input type="text" class="form-control" name="tamano" value="'.$respuesta['tamano'].'" required>
                </div>
                <div class="form-group col-md-2">
                    <label>Peso</label>
                    <input type="text" class="form-control" name="peso" value="'.$respuesta['peso'].'" required>
                </div>
                <div class="form-group col-md-4">
                    <label>Enfermedades</label>
                    <textarea class="form-control"  name="enfermedad" value="'.$respuesta['enfermedades'].'" required></textarea>
                </div>
                <div class="form-group col-md-4">
                    <label>Observaciones</label>
                    <textarea class="form-control"  name="observaciones" value="'.$respuesta['observaciones'].'"  required></textarea>
                </div>
            </div>
            <div class="row justify-content-center">
                <input type="submit" class="btn btn-primary" name="Cambios" value="Guardar Cambios">
            </div>
            
            </form>
                    ';
        }
        public function ActualizarMascotaControlador(){
            if (isset($_POST["Cambios"])&&isset($_GET["id"])){

                $datosController = array(
                                            "id"                    => $_GET["id"],
                                            "nombre"                => $_POST["nombre"],
                                            "especie"               => $_POST["especie"],
                                            "raza"                  => $_POST["raza"],
                                            "sexo"                  => $_POST["sexo"],
                                            "edad"                  => $_POST["edad"],
                                            "tamano"                => $_POST["tamano"],
                                            "peso"                  => $_POST["peso"],
                                            "enfermedad"            => $_POST["enfermedad"],
                                            "observaciones"         => $_POST["observaciones"],
                                            "cliente"               => $_POST["cliente"]);
                $respuesta = Mascotas::ActualizarMascotaModelo($datosController, "Mascotas");
                if($respuesta == "success"){
                    echo '<script type="text/javascript">
                    alert ("Usuario actualizado");
                    window.location.assign("index.php?action=mascotas");
                      </script>';
                }else{
                    echo '<script type="text/javascript">
                    alert ("Hay un error revisa los datos");
                      </script>';
                }
                
            }
        }
        public function BorrarMascotaControlador(){
            if (isset($_GET["id_borrar"])){
                $datosController = $_GET["id_borrar"];

                $respuesta = Mascotas::BorrarMascotaModelo($datosController, "mascotas");
                if($respuesta == "success"){
                    echo '<script type="text/javascript">
                    alert ("Mascota Eliminada");
                    window.location.assign("index.php?action=mascotas");
                  </script>';
                }else{
                    echo "Ocurrio un error";
                }
            }
        }
		//Login
		public function Login(){

			if (isset($_POST["Entrar"])){
				$datosController = array(	"correo"	=> $_POST["correo"], 
											"password"	=> $_POST["password"]);

				$respuesta = Usuarios::LoginUsuariosModelo($datosController, "usuarios2");
				if (($respuesta["email"] == $_POST["correo"]) && ($respuesta["password"] == $_POST["password"])) {				
					session_start();
					$_SESSION["validar"]=true;
					$_SESSION["username"]=$respuesta["username"];
					$_SESSION["tipo"]=$respuesta["tipo"];
                    $_SESSION["email"]=$respuesta["email"];

                    echo '<script type="text/javascript">
						      window.location.assign("index.php?action=panel-admin");
						    </script>';
                }else{
                        echo '<script type="text/javascript">
                                alert ("Contraseña o nombre de usuario invalido");
                                window.location.assign("index.php");
                                </script>';
                    }

			}
		}

        /*CRUD COMPRAS*/
        public function CrearCompraControlador(){
            if(isset($_POST["Registrar"])){

                $datosController = array(
                                            "cantidad"                  => $_POST["cantidad"],
                                            "fecha"                     => $_POST["fecha"],
                                            "total"                     => $_POST["total"],
                                            "producto"                => $_POST["producto"]);
                $respuesta = Compras::CrearCompraModelo($datosController, "compras");
                if($respuesta == "success"){
                    echo "<script type='text/javascript'>
                    alert('Compra Registrada');
                    window.location.assign('index.php?action=compras');
                    </script>";
                }else{
                    var_dump($respuesta);
                }
            }
        }
        public function VerCompraControlador(){
            $respuesta = Compras::VerCompraModelo("compras");

            foreach($respuesta as $row => $item){
            echo  '
                <tr>
                    <td>'.$item[0].'</td>
                    <td>'.$item[1].'</td>
                    <td>'.$item[2].'</td>
                    <td>'.$item[3].'</td>
                    <td>'.$item[4].'</td>
                <td><a href="index.php?action=updateCompras&id='.$item[0].'"><i class="material-icons">edit</i></a><a
                        href="index.php?action=compras&id_borrar='.$item[0].'"><i class="material-icons red-text accent-4">delete</i></a></a></td>
                </tr> ';
            }
        }
        public function InnerCompraControlador(){

            $respuesta = Compras::InnerCompraModel("VistaCompra");

            foreach($respuesta as $row => $item){
                echo  '
                    <tr>
                        <td>'.$item[0].'</td>
                        <td>'.$item[1].'</td>
                        <td>'.$item[2].'</td>
                        <td>'.$item[3].'</td>
                        <td>'.$item[4].'</td>
                    <td><a href="index.php?action=updateCompras&id='.$item[0].'"><i class="material-icons">edit</i></a><a
                            href="index.php?action=compras&id_borrar='.$item[0].'"><i class="material-icons red-text accent-4">delete</i></a></a></td>
                    </tr> ';
                }
        }
        public function DetalleCompraControlador(){
            $id = $_GET["id"];
            $respuesta = Compras::DetalleCompraModelo($id, "compras");

            echo '
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Producto:</label>
                    <input type="int" class="form-control" name="producto" value="'.$respuesta['id_producto'].'">
                </div>
                <div class="form-group col-md-3">
                    <label>Cantidad:</label>
                    <input type="int" class="form-control" name="cantidad" value="'.$respuesta['cantidad'].'">
                </div>
                <div class="form-group col-md-3">
                    <label>Fecha de Compra:</label>
                    <input type="date" class="form-control" name="fecha" value="'.$respuesta['fecha_de_compra'].'">
                </div>
                <div class="form-group col-md-3">
                    <label>Total:</label>
                    <input type="float" class="form-control" name="total" value="'.$respuesta['total'].'">
                </div>
            </div>
            <div class="row justify-content-center">
                <input type="submit" class="btn btn-primary" name="Cambios" value="Guardar Cambios">
            </div>
                 ';
        }
        public function ActualizarCompraControlador(){
            if(isset($_POST["Cambios"])&&isset($_GET["id"])){

                $datosController = array(
                                            "id"                    => $_GET["id"],
                                            "cantidad"              => $_POST["cantidad"],
                                            "fecha"                 => $_POST["fecha"],
                                            "total"                 => $_POST["total"],
                                            "producto"            => $_POST["producto"]);
                $respuesta = Compras::ActualizarCompraModelo($datosController, "compras");
                if($respuesta == "success"){
                    echo '<script type="text/javascript">
                    alert ("Usuario actualizado");
                    window.location.assign("index.php?action=compras");
                      </script>';
                }else{
                    echo '<script type="text/javascript">
                    alert ("Hay un error revisa los datos");
                      </script>';
                }
            }
        }
        public function BorrarCompraControlador(){
            if(isset($_GET["id_borrar"])){
                $datosController = $_GET["id_borrar"];

                $respuesta = Compras::BorrarCompraModelo($datosController, "compras");
                if($respuesta == "success"){
                    echo  '<script type="text/javascript">
                    alert ("Usuario Eliminado");
                    window.location.assign("index.php?action=compras");
                  </script>';
                }else{
                    echo "ocurrio un error";
                }
            }
        }
        
        /**CRUD DE CITAS */
        public function CrearCitaControlador(){
            if(isset($_POST["Registrar"])){

                $datosController = array(
                                            "fecha"                 => $_POST["fecha"],
                                            "hora"                  => $_POST["hora"],
                                            "cliente"             => $_POST["cliente"],
                                            "servicio"            => $_POST["servicio"],
                                            "empleado"            => $_POST["empleado"]);
                $respuesta = Citas::CrearCitaModelo($datosController, "citas");
                if($respuesta == "success"){
                    echo "<script type='text/javascript'>
                    alert('Cita Registrada');
                    window.location.assign('index.php?action=citas');
                    </script>";
                }else{
                    echo $respuesta;
                }
            }
        }
        public function VerCitaControlador(){
            $respuesta = Citas::VerCitaModelo("citas");

            foreach($respuesta as $row => $item) {
                echo '
                    <tr>
                        <td>'.$item[0].'</td>
                        <td>'.$item[1].'</td>
                        <td>'.$item[2].'</td>
                        <td>'.$item[3].'</td>
                        <td>'.$item[4].'</td>
                        <td>'.$item[5].'</td>
                        <td><a href="index.php?action=updateCitas&id='.$item[0].'"><i class="material-icons">edit</i></a><a
                        href="index.php?action=citas&id_borrar='.$item[0].'"><i class="material-icons red-text accent-4">delete</i></a></a></td>
                    </tr> ';
            }
        }
        public function InnerCitaControlador(){

            $respuesta = Citas::InnerCitaModelo("VistaCitas");

            foreach($respuesta as $row => $item) {
                echo '
                    <tr>
                        <td>'.$item[0].'</td>
                        <td>'.$item[1].'</td>
                        <td>'.$item[2].'</td>
                        <td>'.$item[3].'</td>
                        <td>'.$item[4].'</td>
                        <td>'.$item[5].'</td>
                        <td><a href="index.php?action=updateCitas&id='.$item[0].'"><i class="material-icons">edit</i></a><a
                        href="index.php?action=citas&id_borrar='.$item[0].'"><i class="material-icons red-text accent-4">delete</i></a></a></td>
                    </tr> ';
            }
        }

        public function DetalleCitaControlador(){
            $id = $_GET["id"];
            $respuesta = Citas::DetalleCitaModelo($id, "citas");

            echo '
            <form action="">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Cliente:</label>
                    <input type="text" class="form-control" name="cliente" value="'.$respuesta['id_cliente'].'">
                </div>
             
                <div class="form-group col-md-3">
                    <label>Servicio:</label>
                    <input type="text" class="form-control" name="servicio" value="'.$respuesta['id_servicio'].'">
                </div>
                <div class="form-group col-md-3">
                    <label>Empleado:</label>
                    <input type="text" class="form-control" name="empleado" value="'.$respuesta['id_empleado'].'">
                </div>
              <div class="form-group col-md-6">
                <label>Hora:</label>
                <input type="time" class="form-control" name="hora" value="'.$respuesta['hora'].'">
              </div>
              <div class="form-group col-md-6">
                <label>Fecha:</label>
                <input type="date" class="form-control" name="fecha" value="'.$respuesta['fecha'].'">
              </div>
            </div>
            
            <div class="row justify-content-center">
                <input type="submit" class="btn btn-primary" name="Cambios" value="Guardar Cambios">
            </div>
            </div>
            </form>
            
                    ';
        }
        public function ActualizarCitaControlador(){
            if(isset($_POST["Cambios"])&&isset($_GET["id"])){

                $datosController = array(
                                            "id"                    => $_GET["id"],
                                            "fecha"                 => $_POST["fecha"],
                                            "hora"                  => $_POST["hora"],
                                            "cliente"             => $_POST["cliente"],
                                            "servicio"            => $_POST["servicio"],
                                            "empleado"            => $_POST["empleado"]);
                $respuesta = Citas::ActualizarCitaModelo($datosController, "citas");
                if($respuesta == "success"){
                    echo '<script type="text/javascript">
                    alert ("Usuario actualizado");
                    window.location.assign("index.php?action=citas");
                      </script>';
                }else{
                    echo '<script type="text/javascript">
                    alert ("Hay un error revisa los datos");
                      </script>';
                }
            }
        }
        public function BorrarCitaControlador(){
            if(isset($_GET["id_borrar"])){
                $datosController = $_GET["id_borrar"];

                $respuesta = Citas::BorrarCitaModelo($datosController, "citas");
                if($respuesta == "success"){
                    echo '<script type="text/javascript">
                    alert ("Usuario Eliminado");
                    window.location.assign("index.php?action=citas");
                  </script>';
                }else{
                    echo "ocurrio un error";
                }
            }
        }
    }
?>