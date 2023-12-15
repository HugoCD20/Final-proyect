<?php 
session_start();
if(isset($_SESSION['id'])){
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
        <di<div class="content-4">
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
                    <h4 class="title-5">REGISTRARSE</h4>
                    <form class="form-2" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                        <div class="div" style="width: 100%; display: flex;margin-left: 55%;">
                        <label for="nombre">Nombre:</label></div>
                        <input class="text-box-2" type="text" id="nombre" name="nombre">
                        <?php 
                         if ($_SERVER["REQUEST_METHOD"] === "POST") {
                            $nombre=$_POST['nombre'];
                            if(empty($nombre)){
                                echo '<center> <p class="error">Coloca un nombre de usuario</p> </center>';
                            }
                            if(strlen($nombre)>100){
                                echo '<center> <p class="error">Nombre de usuario demasiado largo</p> </center>';
                            }
                        }
                        ?>
                        <div class="div" style="width: 100%; display: flex;margin-left: 55%;">
                        <label for="correo">Correo electrónico:</label></div>
                        <input class="text-box-2" type="text" id="correo" name="correo">
                        <?php 
                            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                                $Correo=$_POST['correo'];
                                if(strlen($Correo)>100){
                                    echo '<center> <p class="error">Correo electronico demasiado largo</p> </center>';
                                }

                                // Filtrar el correo electrónico usando filter_var
                                $correoFiltrado = filter_var($Correo, FILTER_VALIDATE_EMAIL);                        
                                if ($correoFiltrado == false) {
                                    echo '<center> <p class="error">Correo no valido</p> </center>';
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
                                }elseif(strlen($Contraseña)<3){
                                    echo '<center> <p class="error">Contraseña demasiado corta</p> </center>';
                                }
                                if(strlen($Contraseña)>100){
                                    echo '<center> <p class="error">Contraseña demasiada larga</p> </center>';
                                }
                            }
                        ?>

                        <div class="div" style="width: 100%; display: flex;margin-left: 55%;">
                        <label  for="confirmarContrasena">Confirmar contraseña:</label></div>
                        <input class="text-box-2" type="password" id="confirmarContrasena" name="confirmarContrasena">
                        <?php 
                        if ($_SERVER["REQUEST_METHOD"] === "POST") {
                            $contraseña=$_POST['contrasena'];
                            $Contra=$_POST['confirmarContrasena'];
                            if($contraseña!=$Contra){
                                echo '<center> <p class="error">Las contraseñas no coinciden</p> </center>';
                            }
                        }
                        ?>    

                        <input class="button-5" type="submit" value="Registrarse">
                        <?php 
                            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                            include("validar-registro.php");
                            }
                        ?>
                    </form>
                </div>
            </div>
           
            
        </div>
    </main>
    <footer>Copyright © 2023 · Digital Dreams</footer>
</body>
</html>