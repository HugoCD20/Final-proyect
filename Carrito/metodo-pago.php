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
    </header>
    <main>
        <div class="content-2">
            <div class="buscador">
                <div class="regresar">
                    <a href="seleccionar-direccion.php"><button><img class="img-3" src="../image/regreso.png" alt=""></button></a>
                </div>
                <div class="buscar">
                </div>
            </div>
            <div class="content-5">
                <div class="content-6">
                    <div class="titulo-1">
                        <h3 class="title-5">MÉTODO DE PAGO</h3>
                    </div>
                    <form class="direccion" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                        <div class="calle">
                            <div class="div" style="width: 100%; display: flex;margin-left: 55%;">
                                <label for="Ntarjeta">Número de tarjeta:</label></div>
                                <input class="text-box-2" type="text" id="NTarjeta" name="NTarjeta" placeholder='XXXX-XXXX-XXXX-XXXX'>
                                <?php 
                                    if ($_SERVER["REQUEST_METHOD"] === "POST") {
                                        if(isset($_POST['NTarjeta'])){
                                            $tarjeta=$_POST['NTarjeta'];
                                            if(empty($tarjeta)){
                                                echo '<center> <p class="error">Ingresa una tarjeta</p> </center>';
                                                $error=false;
                                            }else{
                                                $error=true;
                                            }
                                            $cantidad=strlen($tarjeta);
                                            if($error){
                                                if($cantidad<16 or $cantidad>16){
                                                    echo '<center> <p class="error">No es una tarjeta valida</p> </center>';
                                                    $error=false;
                                                }else{
                                                    $error=true;
                                                }
                                            }
                                            
                                        }
                                        
                                    }
                                ?>
                        </div>
                        
                        <div class="caja-2">
                            <div class="boxx" style="align-items: end;">
                                <div class="div" style="width: 100%; display: flex;justify-content:end; margin-right: 3.5rem;">
                                    <label for="Fecha">Fecha de vencimiento:</label></div>
                                    <div style='display:flex; flex-direction:row background-color:blue;width:50%'>
                                    <input style='margin-right:0.4rem;' class="text-box-2" type="text" id="Fecha" name="mes" placeholder='Mes'>
                                    <input class="text-box-2" type="text" id="Fecha" name="año" placeholder='Año'>
                                    </div>
                                    <?php 
                                        if ($_SERVER["REQUEST_METHOD"] === "POST") {
                                           if(isset($_POST['mes'])){
                                            $mes=$_POST['mes'];
                                            if(empty($mes)){
                                                echo '<center> <p class="error">Ingresa un mes de vencimiento</p> </center>';
                                                $error2=false;
                                            }else{
                                                $error2=true;
                                                if(strlen($_POST['mes'])<2 || strlen($_POST['mes'])>2){
                                                    echo '<center> <p class="error">No es un mes valido ejemplo: 01</p> </center>';
                                                    $error2=false;
                                                }else{
                                                    $error2=true;
                                                }
                                            }
                                           }
                                           if($error2){
                                                if(isset($_POST['año'])){
                                                    $año=$_POST['año'];
                                                    if(empty($año)){
                                                        echo '<center> <p class="error">Ingresa un año de vencimiento</p> </center>';
                                                        $error2=false;
                                                    }else{
                                                        $error2=true;
                                                        if(strlen($_POST['año'])<2 || strlen($_POST['año'])>2){
                                                            echo '<center> <p class="error">No es un año valido ejemplo: 23</p> </center>';
                                                            $error2=false;
                                                        }else{
                                                            $error2=true;
                                                        }
                                                    }
                                                   
                                                }
                                            }
                                           
                                            
                                        }
                                    ?>
                                    

                            </div>
                            <div class="box">
                                <div class="div" style="width: 100%; display: flex;justify-content:start;">
                                    <label for="codigo-seguridad">CVV:</label></div>
                                    <input class="text-box-2" type="text" id="codigo-seguridad" name="codigo-seguridad" placeholder='CVV'>
                                    <?php 
                                        if ($_SERVER["REQUEST_METHOD"] === "POST") {
                                            if(isset($_POST['codigo-seguridad'])){
                                                $codigo=$_POST['codigo-seguridad'];
                                                if(empty($codigo)){
                                                    echo '<center> <p class="error">coloca el codigo de seguridad</p> </center>';
                                                    $error3=false;
                                                }else{
                                                    $error3=true;
                                                }
                                                $tamano=strlen($codigo);
                                                if($error3){
                                                    if($tamano<3 or $tamano>4){
                                                        echo '<center> <p class="error">El codigo de seguridad no es valido</center>';
                                                        $error3=false;
                                                    }else{
                                                        $error3=true;
                                                    }
                                                }
                                                
                                            }
                                            
                                        }
                                    ?>
                            </div>
                        </div>
                        <div class="boton">
                            <button class="boton-6">Añadir</button>
                        </div>
                            <?php 
                                 if ($_SERVER["REQUEST_METHOD"] === "POST") {
                                    if(isset($error)){
                                        if($error && $error2 && $error3){
                                            $_SESSION['metodo']=true;
                                            header('location: compra-realizada.php');
                                            exit();
                                        }
                                    }
                                 }
                            ?>
                        
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
                        <div class="con-4"><p><strong>Total:     $<?php  if($_SESSION['precio']+100!=100){echo $_SESSION['precio']+100;}else{echo "00.00";}?></strong></p></div>
                    </div>
                </div>
            
            </div>
            
        </div>
    </main>
    <footer>Copyright © 2023 · Digital Dreams</footer>
</body>
</html>