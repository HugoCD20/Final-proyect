<?php
session_start();
if(isset($_SESSION['id-admin'])){
    header('location:administracion.php');
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
                        <a href="index.php"><button><img class="img-3" src="image/regreso.png" alt=""></button></a>
                    </div>
                </div>
            </div>
            <div class="titulo-1">
                <div class="content-11">
                    <h4 class="title-5">INGRESAR</h4>
                    <div class="caja">
                        <form class="form-2" action="<?php echo $_SERVER['PHP_SELF'];?>" method='POST'>
                            <div class="div" style="width: 100%; display: flex;margin-left: 55%;">
                            <label for="correo">Nombre:</label></div>
                            <input class="text-box-2" type="text" id="correo" name="correo">                            
                            <?php 
                                if ($_SERVER["REQUEST_METHOD"] === "POST") {
                                    $nombre=$_POST['correo'];
                                    if(empty($nombre)){
                                        echo '<center> <p class="error">Coloca un nombre</p> </center>';
                                    }
                                    if(strlen($nombre)>200){
                                        echo '<center> <p class="error">Nombre demasiado largo</p> </center>';
                                    }
                                   
                                }
                            ?>     
                            <div class="div" style="width: 100%; display: flex;margin-left: 55%;">
                            <label for="contrasena">Contraseña:</label></div>
                            <input class="text-box-2" type="password" id="contrasena" name="contrasena">
                            <?php 
                            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                                $Contraseña=$_POST['contrasena'];
                                if(empty($Contraseña)){
                                    echo '<center> <p class="error">Coloca una contraseña</p> </center>';
                                }
                                if(strlen($Contraseña)>200){
                                    echo '<center> <p class="error">Contraseña demasiada larga</p> </center>';
                                }
                            }
                            ?>
                            <input class="button-5" type="submit" value="Ingresar">
                            <?php
                                if ($_SERVER["REQUEST_METHOD"] === "POST") {
                                    include("validar-login-admin.php");
                                }
                            ?>
                        </form>
                     </div>
                </div>
            </div>
           
            
        </div>
    </main>
    <footer>Copyright © 2023 · Digital Dreams</footer>
</body>
</html>