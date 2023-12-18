<?php 
session_start();
$_SESSION['pag']=1;
if(!isset($_SESSION['id'])){
    header('location:../index.php');
    exit();
}
$_SESSION['pagina']=4;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Dreams</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <header>
        <div class="content-10">
            <div class="content-4">
                <div class="imagen-2">
                   <a href="../index.php"><img class="img-2" src="../image/logo.png" alt="logo"></a> 
                </div>
                <a href="../index.php"><h4 class="title-4">Digital Dreams</h4></a> 
            </div>
            <div class="content-1">
                
            </div>
        </div>
       
    </header>
    <main>
        <div class="content-2">
            <div class="buscador">
                <div class="regreso-2" style="width: 100%; margin-bottom: 1rem;">
                    <div class="regresar">
                        <a href="../index.php"><button><img class="img-3" src="../image/regreso.png" alt=""></button></a>
                    </div>
                </div>
            </div>
            <div class="titulo-1">
                <div class="content-11">
                    <h4 class="title-5">PERFIL</h4>
                    <div class="caja">
                        <div class="form-2" action="">
                            <a class="button-6" href="modificar-perfil.php"><button>Modificar Perfil</button></a>
                            <a class="button-6" href="../Carrito/Carrito.php"><button >Carrito</button></a>
                            <a class="button-6" href="direcciones.php"><button >Direcciones</button></a> 
                            <a class="button-6" href="../Cerrar-sesion.php"><button>Cerrar sesión</button></a> 
                     </div>
                </div>
            </div>
           
            
        </div>
    </main>
    <footer>Copyright © 2023 · Digital Dreams</footer>
</body>
</html>