<?php 
session_start();
if(!isset($_SESSION['id'])){
    header('location: ../Login-register/login.php');
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
    <script>
    function ejecutarAccion() {
      var select = document.getElementById("menuDesplegable");
      var opcionSeleccionada = select.value;
      switch (opcionSeleccionada) {
        case 'opcion1':
          break;
        case 'opcion2':
            window.location.href = '../Perfil/perfil.php';
          break;
        case 'opcion3':
          window.location.href = '../Cerrar-sesion.php';
          break;
        default:
          break;
      }
    }
    </script>
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
                <div class="carrito">
                </div>
                <?php 
                if (!isset($_SESSION['id'])){
                    echo "<a class='menu' href='../Login-register/login.php'><div class='menu'><h1 class='title-1'>Iniciar sesión</h1></div></a>";
                }else{
                    echo "<select id='menuDesplegable' onchange='ejecutarAccion()'> 
                    <option value='' selected disabled>$_SESSION[nombre]</option>
                    <option value='opcion2'>Perfil</option>
                    <option value='opcion3'>Cerrar Sesión</option>
                  </select>";
                }?>
            </div>
        </div>
    </header>
    <main>
        <div class="content-2">
            <div class="buscador">
                <div class="regresar">
                    <?php
                        if(isset($_SESSION['pagina'])){
                            switch($_SESSION['pagina']){
                                case 1:
                                    echo '<a href="../index.php"><button><img class="img-3" src="../image/regreso.png" alt=""></button></a>';
                                    break;
                                case 2:
                                    echo '<a href="../Productos/vista-productos.php"><button><img class="img-3" src="../image/regreso.png" alt=""></button></a>';
                                    break;
                                case 3:
                                    echo '<a href="../Productos/Producto.php"><button><img class="img-3" src="../image/regreso.png" alt=""></button></a>';
                                    break;
                                case 4:
                                    echo '<a href="../Perfil/perfil.php"><button><img class="img-3" src="../image/regreso.png" alt=""></button></a>';
                                    break;
                                case 7: 
                                    echo '<a href="../Perfil/direcciones.php"><button><img class="img-3" src="../image/regreso.png" alt=""></button></a>';
                                    break;
                                default:
                                    echo '<a href="../index.php"><button><img class="img-3" src="../image/regreso.png" alt=""></button></a>';
                                    break;
                            }
                            $_SESSION['page']=6;
                            $_SESSION['pg']=4;
                        }
                    ?>
                </div>
                <div class="buscar"></div>
            </div>
            <div class="titulo-1">
                <h3 class="title-5">CARRITO DE COMPRA</h3>
            </div>
            <div class="content-5">
                <div class="content-6">
                <?php
                    include("../conexion.php");
                    $_SESSION['nproductos']=0;
                    $_SESSION['precio']=0;
                    $id=$_SESSION['id'];
                    $consulta="select * from carrito where id_usuario=:id";
                    $stmt = $conexion->prepare($consulta);
                    $stmt->bindParam(":id",$id);
                    $stmt->execute();
                    if ($stmt->rowCount() > 0) {
                        while ($registro = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $id_producto=$registro['id_producto'];
                            $consulta2="select * from  productos where id=:id_producto";
                            $stmt2 = $conexion->prepare($consulta2);
                            $stmt2->bindParam(":id_producto",$id_producto);
                            $stmt2->execute();
                            if ($stmt2->rowCount() > 0) {
                                while ($registro2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                                    if($registro2['stock']>0){
                                    
                                            echo" <div class='lista'>
                                        <div class='con-1'>
                                            <div class='imagen-5'><img class='img-3' src='../$registro2[imagen]' alt='producto'></div>
                                        </div>
                                        <div class='con-2' style='flex-direction:column; align-items:start;'><p class='prod-1'><strong>$registro2[Nombre]</strong>
                                            <br>$registro2[stock] existencias</p>
                                            <form action='eliminar-carrito.php' method='POST'>
                                                <input type='hidden' name='id' value='$registro[id]'>
                                                <button class='eliminar' style='text-align:start;'>Eliminar</button>
                                            </form>
                                        </div>
                                        <div class='con-3'>                                    
                                        <form style='display: flex; aline-items:center;' action='sumar-producto.php' method='POST'>
                                            <input type='hidden' name='id' value='$registro2[id]'>
                                        <div style='display:flex;  align-items: center;'>
                                        <button class='boton-4'  name='accion' value='restar'>-</button>
                                        <p class='texto-2'>". $registro['cantidad']."</p>
                                        <button class='boton-5' name='accion' value='sumar'>+</button>
                                        </div>
                                        <p class='texto-2'>$". $registro['cantidad']*$registro2['Precio']
                                        ."</p></form></div>
                                    </div>";
                                    $_SESSION['nproductos']+=$registro['cantidad'];
                                    $_SESSION['precio']+=($registro['cantidad']*$registro2['Precio']);
                                    $_SESSION['carro']=true;
                                    }else{
                                        $consulta3="DELETE from carrito where id=:id";
                                        $stmt3=$conexion->prepare($consulta3);
                                        $stmt3->bindParam(':id',$registro['id']);
                                        $stmt3->execute();
                                        echo '<center> <p class="error">No hay productos disponibles</p> </center>';
                                    }
                                }
                            } else {
                                echo '<center> <p class="error">No hay productos disponibles</p> </center>';
                            }
                        }
                    } else {
                        $_SESSION['carro']=false;
                        echo '<center> <p class="error">No hay productos disponibles</p> </center>';
                    }
                ?>               
                    
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
                    <div class="comprar-2">
                        <a class="boton-3" href="seleccionar-direccion.php"><button class="bot">Continuar compra</button></a>
                    </div>
                </div>
            
            </div>
            
        </div>
    </main>
    <footer>Copyright © 2023 · Digital Dreams</footer>
</body>
</html>