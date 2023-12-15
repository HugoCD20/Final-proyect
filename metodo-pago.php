<?php 
session_start();
if(!isset($_SESSION['id'])){
    header('location:index.php');
    exit();
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
    </header>
    <main>
        <div class="content-2">
            <div class="buscador">
                <div class="regresar">
                    <a href="seleccionar-direccion.php"><button><img class="img-3" src="image/regreso.png" alt=""></button></a>
                </div>
                <div class="buscar">
                </div>
            </div>
            <div class="content-5">
                <div class="content-6">
                    <div class="titulo-1">
                        <h3 class="title-5">MÉTODO DE PAGO</h3>
                    </div>
                    <form class="direccion" action="compra-realizada.php" method="POST">
                        <div class="calle">
                            <div class="div" style="width: 100%; display: flex;margin-left: 55%;">
                                <label for="Ntarjeta">Número de tarjeta:</label></div>
                                <input class="text-box-2" type="text" id="NTarjeta" name="NTarjeta" required>
                        </div>
                        
                        <div class="caja-2">
                            <div class="box" style="align-items: end;">
                                <div class="div" style="width: 100%; display: flex;justify-content:end; margin-right: 3.5rem;">
                                    <label for="Fecha">Fecha de vencimineto:</label></div>
                                    <input class="text-box-2" type="text" id="Fecha" name="Fecha" required>
                            </div>
                            <div class="box">
                                <div class="div" style="width: 100%; display: flex;justify-content:start;">
                                    <label for="codigo-seguridad">CVV:</label></div>
                                    <input class="text-box-2" type="text" id="codigo-seguridad" name="codigo-seguridad" required>
                            </div>
                        </div>
                        <div class="boton">
                            <button class="boton-6">Añadir</button>
                        </div>
                        
                    </form>
                </div>
            </div>
            <div class="content-7">
                <div class="content-8">
                    <div class="con-5"><h4 style="margin-bottom: 0%;">Resumen de compra</h4></div>                    
                    <div class="lista-2">
                        <div class="con-4">
                            <p>Producto(<?php echo $_SESSION['nproductos'];?>):      $<?php echo $_SESSION['precio'];?></p>
                        </div>
                        <div class="con-4"><p>Envio:    $100.00</p></div>
                        <div class="con-4"><p><strong>Total:     $<?php echo $_SESSION['precio']+100;?></strong></p></div>
                    </div>
                </div>
            
            </div>
            
        </div>
    </main>
    <footer>Copyright © 2023 · Digital Dreams</footer>
</body>
</html>