<?php 
session_start();
if(!isset($_SESSION['id'])){
    header('location:../index.php');
    exit();
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
                <div class="regreso-2" style="width: 100%; margin-bottom: 1rem;">
                    <div class="regresar">
                        <a href="perfil.php"><button><img class="img-3" src="../image/regreso.png" alt=""></button></a>
                    </div>
                </div>
                
            </div>
            <div class="titulo-1">
                <div class="content-11">
                    <h4 class="title-5">Actualizar Perfil</h4>
                    <form class="form-2" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                        <div class="div">
                        <label for="nombre">Nombre:</label></div>
                        <input class="text-box-2" type="text" id="nombre" name="nombre" value="<?php echo $_SESSION['nombre'];?>">

                        <div class="div">
                        <label for="correo">Correo electrónico:</label></div>
                        <input class="text-box-2" type="text" id="correo" name="correo" value="<?php echo $_SESSION['Correo'];?>">
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
                        <div class="div">
                        <label for="contrasena">Contraseña:</label></div>
                        <input class="text-box-2" type="password" id="contrasena" name="contrasena">
                       
                        <input class="button-5" type="submit" value="Actualizar">
                        <?php 
                            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                            include("realizar-actualizacion.php");
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