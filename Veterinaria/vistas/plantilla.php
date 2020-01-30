<!DOCTYPE html>
<html style="height:100%;
  box-sizing: border-box;">
    <head>
    <?php require_once 'modulos/head.php'?>
    </head>

    <body style="position: relative;
        margin: 0;
        padding-bottom: 20rem;
        min-height: 100%;
        font-family: 'KD2', sans-serif;">


        <!-- Navbar -->
        <header>
            <?php 
                require_once 'modulos/navbar.php';
            ?>
        </header>  
        <!-- Seccion de contenido -->
		<section>
			<?php 
				
				$objeto = new controlador();
                $objeto -> paginaController();
                ?>
		</section>
        
            <!-- Scripts -->
		<?php require_once 'modulos/scripts.php'; ?>
    </body>
</html>