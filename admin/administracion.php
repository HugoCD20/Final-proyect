<?php
session_start();
if(!isset($_SESSION['id-admin'])){
    header('location:administrador.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Dreams</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="content-10">
            <div class="content-4">
                <div class="imagen-2">
                   <a href="index.php"><img class="img-2" src="image/logo.png" alt="logo"></a> 
                </div>
                <a href="index.php"><h4 class="title-4">Digital Dreams</h4></a> 
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
                        <a href="administrador.php"><button><img class="img-3" src="image/regreso.png" alt=""></button></a>
                    </div>
                </div>
            </div>
            <div class="titulo-1">
                <div class="content-11">
                    <h4 class="title-5">PERFIL</h4>
                    <div class="caja">
                        <div class="form-2">
                            <a class="button-6" href="Agregar-producto.php"><button>Agregar producto</button></a>
                            <a class="button-6" href="modificar-producto.php"><button>Modificar producto</button></a>
                            <a class="button-6" href="Cerrar-sesion.php"><button >Cerrar Sesión</button></a> 
                     </div>
                </div>
            </div>
           
            
        </div>
    </main>
    <footer>Copyright © 2023 · Digital Dreams</footer>
</body>
</html>