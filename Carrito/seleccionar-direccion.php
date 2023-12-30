<?php //validar la estadia de la pagina. verifica si inicio sesion y si estuvo en el carrito
session_start();
$_SESSION['pag']=2;
if(!isset($_SESSION['id'])){
    header('location:../index.php');
    exit();
}
if(isset($_SESSION['page'])){//valida de que pagina viene
    switch($_SESSION['page']){
        case 6:
            if(isset($_SESSION['carro'])){//valida si visito antes el carrito
                if(!$_SESSION['carro']){//valida si el carrito está vacio
                    header('location:Carrito.php');
                }
            }else{
                header('location:Carrito.php');
            }
            break;
        default:
            if(isset($_POST['id'])){
                $_SESSION['directa']=$_POST['id'];
            }            
            include('consulta.php');
            break;
    }
   
}else{
    header('location:index.php');
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
            <div class="content-1"></div>
        </div>
    </header>
    <main>
        <div class="content-2">
            <div class="buscador">
                <div class="regresar">
                    <?php
                        switch($_SESSION['page']){
                            case 6:
                                echo '<a href="Carrito.php"><button><img class="img-3" src="../image/regreso.png" alt=""></button></a>';
                                break;
                            default:
                                echo '<a href="../Productos/producto.php"><button><img class="img-3" src="../image/regreso.png" alt=""></button></a>';
                                 break;
                        }
                    ?>
                </div>
                <div class="buscar">
                </div>
            </div>
            <form action="verificar-direccion.php" method="POST">
            <div class="content-5">
                <div class="content-6">
                <div class="titulo-1">
                <h3 class="title-5">SELECCIONA UNA DIRECCIÓN</h3>
            </div>
                <div class="caja">
                    <div style="margin-top: 1rem;" class="form-2">
                    <?php
                        include('../conexion.php');
                        $id=$_SESSION['id'];
                        $consulta="select * from direcciones where id_usuario=:id";
                        $stmt=$conexion->prepare($consulta);
                        $stmt -> bindParam(':id',$id);
                        $stmt->execute();
                        if ($stmt->rowCount() > 0) {
                            while ($registro = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<div style='display: flex;flex-direction: row;width: 100%;align-items: center;color: #164863;justify-content:center;'>
                                    <input style='transform: scale(1.3);margin-right:1rem;' type='radio' name='opcion' id='opcion1' value='opcion1'>
                                    <label class='button-7' for='opcion1'><div>
                                      <p><strong>$registro[calle]</strong><br>Tel:$registro[numeroTelefonico]<br>Codigo postal: $registro[codigoPostal]</p></div>
                                    </label> </div>";
                            }
                        } else {
                            echo '<center> <p class="error">No hay direcciones agregadas</p> </center>';
                        }
                        ?>
                        <div class="comprar-2" style="color:red;">
                            <?php 
                                if(isset($_SESSION['error'])){
                                    echo $_SESSION['error'];
                                    $_SESSION['error']=null;
                                }
                            ?>
                        </div>
                        <div class="comprar-2">
                           <button class="boton-3" name ="valor" value="agregar" >Agregar dirección</button>
                        </div>
                    </div>                
                </div>
                </div>
            </div>
            <div class="content-7">
                <div class="content-8">
                    <div class="con-5"><h4 style="margin-bottom: 0%;">Resumen de compra</h4></div>                    
                    <div class="lista-2">
                        <div class="con-4">
                            <p>Producto(<?php echo $_SESSION['nproductos'];?>):      $<?php echo $_SESSION['precio'];?></p>
                        </div>
                        <div class="con-4"><p>Envio: $100.00</p></div>
                        <div class="con-4"><p><strong>Total: $<?php  if($_SESSION['precio']+100!=100){echo $_SESSION['precio']+100;}else{echo "00.00";}?></strong></p></div>
                    </div>
                    <div class="comprar-2">
                       <button class="boton-3" name="valor" value="continuar compra">Continuar compra</button>
                    </div>
                </div>           
            </div>
            </form>
        </div>
    </main>
    <footer>Copyright © 2023 · Digital Dreams</footer>
</body>
</html>