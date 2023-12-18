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
                <div class="regresar">
                    <a href="modificar-producto.php"><button><img class="img-3" src="../image/regreso.png" alt=""></button></a>
                </div>
                <div class="buscar">
                </div>
            </div>
            <div class="content-5">
                <div class="content-6" style="width: 60%; margin-left:20%;">
                    <div class="titulo-1" style="justify-content: start; margin-left: 25%;">
                        <h3 class="title-5">¿SEGURO QUE QUIERES ELIMIMAR </br> EL PRODUCTO?</h3>
                    </div>
                    <div class="boton">
                        <form class="boton-6" action="validar-eliminacion.php" method="POST">
                            <?php $id=$_POST['id'];?>
                            <input type='hidden' name='id' value='<?php echo $id;?>'>
                            <button style="color: #DDF2FD;">Eliminar</button>
                        </form>
                        <a class="boton-6" href="modificar-producto.php"><button style="color: #DDF2FD;">Cancelar</button></a>
                    </div>
                    
                </div>
                
            </div>
            
        </div>
    </main>
    <footer>Copyright © 2023 · Digital Dreams</footer>
</body>
</html>