<?php 
session_start();
if(!isset($_SESSION['id'])){
    header('location:../index.php');
    exit();
}else{
    $_SESSION['pagina']=7;
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
            window.location.href = '../index.php';
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
                    <a href="../Carrito/Carrito.php"><img class="CarCompra" src="../image/Carrito.png" alt="carrito"></a>
                </div>
                <?php 
                if (!isset($_SESSION['id'])){
                    echo "<a class='menu' href='login.php'><div class='menu'><h1 class='title-1'>Iniciar sesión</h1></div></a>";
                }else{
                    echo "<select id='menuDesplegable' onchange='ejecutarAccion()'> 
                    <option value='' selected disabled>$_SESSION[nombre]</option>
                    <option value='opcion2'>Inicio</option>
                    <option value='opcion3'>Cerrar Sesión</option>
                  </select>";
                }?>
            </div>
        </div>
    </header>
    <main>
        <div class="content-2">
            <div class="buscador">
            <div class="regreso-2" style="width: 100%; margin-bottom: 1rem;">
                <div class="regresar">
                    <?php
                        if(isset($_SESSION['pag'])){
                            switch($_SESSION['pag']){
                                case 2:
                                    echo '<a href="../Carrito/seleccionar-direccion.php"><button><img class="img-3" src="../image/regreso.png" alt=""></button></a>';
                                    break;
                                case 1:
                                    echo '<a href="perfil.php"><button><img class="img-3" src="../image/regreso.png" alt=""></button></a>';
                                    break;
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="titulo-1">
            <div class="content-11">
                <h5 class="title-5">Direcciones</h5>
                <div class="caja">
                    <div class="form-2">
                    <?php
                        include('../conexion.php');
                        $id=$_SESSION['id'];
                        $consulta="select * from direcciones where id_usuario=:id";
                        $stmt=$conexion->prepare($consulta);
                        $stmt -> bindParam(':id',$id);
                        $stmt->execute();
                        if ($stmt->rowCount() > 0) {
                            while ($registro = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<div class='button-7'>
                                        <p><strong>$registro[calle]</strong><br>Tel: $registro[numeroTelefonico]<br>Codigo postal:$registro[codigoPostal]</p> 
                                    </div>";
                            }
                        } else {
                            echo '<center> <p class="error">No hay direcciones agregadas</p> </center>';
                        }
                        ?>
                    </div>                
                </div>
                <h3 class="title-5">Añadir dirección:</h3>
                <form class="direccion" action="procesar-direccion.php" method="POST">
                    <div class="calle">
                        <div class="div-2" >
                            <label for="calle">Calle:</label></div>
                            <input class="text-box-2" type="text" id="calle" name="calle" placeholder="Calle" required>
                    </div>
                    <div class="caja-4">
                        <div class="div-2">
                            <label for="colonia">Colonia:</label></div>
                            <input class="text-box-2" type="text" id="colonia" name="colonia" placeholder="Colonia" required>
                    </div>
                    <div class="caja-2">
                        <div class="box" style="align-items: end;">
                            <div class="div-3">
                                <label for="numeroE">Número exterior:</label></div>
                                <input class="text-box-2" type="text" id="numeroE" name="numeroE" placeholder="Número exterior" required>
                        </div>
                        <div class="box">
                            <div class="div-4">
                                <label for="codigo-postal">Código postal:</label></div>
                                <input class="text-box-2" type="text" id="codigo-postal" name="codigo-postal" placeholder="codigo postal" required>
                        </div>
                    </div>
                    <div class="caja-2">
                        <div class="box" style="align-items: end;">
                            <div class="div-3">
                                <label for="estado">Estado:</label></div>
                                <input class="text-box-2" type="text" id="estado" name="estado" placeholder="Estado" required>
                        </div>
                        <div class="box">
                            <div class="div-4">
                                <label for="numerot">Número telefónico:</label></div>
                                <input class="text-box-2" type="text" id="numerot" name="numerot" placeholder="Número de telefono" required>
                            </div>
                        </div>
                        <div class="boton">
                            <button class="boton-6">Añadir</button>
                        </div>
                        </div>
                    </div>                  
                    
                    </div>
                </form>
        </div>
    </main>
    <footer>Copyright © 2023 · Digital Dreams</footer>
</body>
</html>