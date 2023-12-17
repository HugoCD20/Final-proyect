<?php 
session_start();
if(!isset($_SESSION['id'])){
    header('location:../index.php');
    exit();
}
$_SESSION['pagina']=5;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        include('../conexion.php');
        $idUsuario = $_SESSION['id'];
        $consulta = "SELECT * FROM carrito where id_usuario=:idUsuario";
        $stmt = $conexion->prepare($consulta);
        $stmt->bindParam(':idUsuario', $idUsuario);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            while ($registro = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $id_producto=$registro['id_producto'];
                $consulta2="SELECT * FROM productos where id=:id_producto";
                $stmt2=$conexion->prepare($consulta2);
                $stmt2->bindParam(":id_producto",$id_producto);
                $stmt2->execute();
                if ($stmt2->rowCount() > 0) {
                    while ($registro2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                        $stock=$registro2['stock'];
                        $stock -=$registro['cantidad'];
                        $consulta3="UPDATE productos set stock=:stock where id=:id_producto";
                        $stmt3=$conexion->prepare($consulta3);
                        $stmt3->bindParam(":stock",$stock);
                        $stmt3->bindParam(":id_producto",$id_producto);
                        $stmt3->execute();
                    }
                }
                $id=$registro['id'];
                $consulta4="DELETE FROM carrito where id=:id";
                $stmt4=$conexion->prepare($consulta4);
                $stmt4->bindParam(":id",$id);
                $stmt4->execute();

            }
        } else {
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
      

}else{
header("location: Carrito.php");
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
            window.location.href = 'perfil.php';
          break;
        case 'opcion3':
          window.location.href = 'Cerrar-sesion.php';
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
                    <a href="Carrito.php"><img class="CarCompra" src="../image/Carrito.png" alt="carrito"></a>
                </div>
                <?php 
                if (!isset($_SESSION['id'])){
                    echo "<a class='menu' href='login.php'><div class='menu'><h1 class='title-1'>Iniciar sesión</h1></div></a>";
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
                </div>
                <div class="buscar">
                    
                </div>
            </div>
            <div class="content-5">
                <div class="content-6" style="width: 60%; margin-left:20%;">
                    <div class="titulo-1" style="justify-content: start; margin-left: 25%;">
                        <h3 class="title-5">¡GRACIAS POR <br> COMPRAR!</h3>
                    </div>
                    <p style="color: #164863; margin-left: 35%;">Tu compra se realizó correctamete</p>
                    <div class="boton">
                        <a class="boton-6" href="../index.php"><button style="color: #DDF2FD;">Inicio</button></a>
                    </div>
                </div>
                
            </div>
            
        </div>
    </main>
    <footer>Copyright © 2023 · Digital Dreams</footer>
</body>
</html>