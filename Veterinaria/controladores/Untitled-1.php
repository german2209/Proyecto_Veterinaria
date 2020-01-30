    #-----Borrar un usuario con un ID en especifico

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

       public function BorrarUsuarioControlador(){

            if(isset($_GET["id_borrar"])){

                $datosController = $_GET["id_borrar"];

               $respuesta = Usuarios::BorrarUsuarioModelo($datosController, "usuarios");

               if($respuesta == 'success'){

                   echo '<script type="text/javascript">

                   alert ("Usuario Eliminado");

                   window.location.assign("index.php?action=usuarios");

                 </script>';

               }else{

                   echo 'Ocurrio un error';

               }

            }

        }