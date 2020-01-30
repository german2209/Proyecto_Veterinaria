<?php
session_start();
?>
    <nav class="navbar shadow p-3 mb-5 navbar-light rounded" style="background-color: #e3f2fd;">
        <a class="navbar-brand" href="#">
            <img src="vistas/assets/images/logohuella.png" width="30" height="30" class="d-inline-block align-top" alt="">
            Veterinaria
        </a>
        <form class="form-inline my-2 my-lg-0">
            <?php
                if (isset($_SESSION["tipo"]) && $_SESSION["tipo"]=="0") {
                    echo '
                    <a href="index.php?action=usuarios" class="table-cell-td nav-link active">Usuarios</a>
                    <a href="index.php?action=empleados" class="table-cell-td nav-link">Empleados</a>
                    <a href="index.php?action=servicios" class="table-cell-td nav-link">Servicios</a>
                    <a href="index.php?action=compras" class="table-cell-td nav-link">Compras</a>
                    <a href="index.php?action=productos" class="table-cell-td nav-link">Productos</a>
                    <a href="index.php?action=administrador" class="table-cell-td nav-link">Administrador</a>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i>&nbsp;&nbsp;'.$_SESSION['username'].'</a>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="index.php?action=log-out">Salir</a>
                        </div>
                    </li>';
                }
                elseif (isset($_SESSION["tipo"]) && $_SESSION["tipo"]=="1") {
                    echo '
                    <a href="index.php?action=log-out" class="table-cell-td"><i class="fa fa-user"></i>&nbsp;&nbsp;'.$_SESSION['username'].'</a>';
                }
               
            ?>
        </form>
    </nav>