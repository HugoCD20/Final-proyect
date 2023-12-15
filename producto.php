<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Dreams</title>
    <link rel="stylesheet" href="style.css">
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
                   <a href="index.php"><img class="img-2" src="image/logo.png" alt="logo"></a> 
                </div>
                <a href="index.php"><h4 class="title-4">Digital Dreams</h4></a> 
            </div>
            <div class="content-1">
                <div class="carrito">
                    <a href="Carrito.php"><img class="CarCompra" src="image/Carrito.png" alt="carrito"></a>
                </div>
                <?php 
                session_start();
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
                    <a href="vista-productos.php"><button><img class="img-3" src="image/regreso.png" alt=""></button></a>
                </div>
                <div class="buscar"></div>
            </div>
            <div class="content-5">
                <?php
                    include("conexion.php");
                    if($_SESSION['id-producto']==null){
                        $id=$_POST['id'];
                        $_SESSION['id-producto']=$id;
                    }else{
                        $id=$_SESSION['id-producto'];
                    }
                    $consulta="select * from productos where id=:id";
                    $stmt = $conexion->prepare($consulta);
                    $stmt->bindParam(":id",$id);
                    $stmt->execute();
                    if ($stmt->rowCount() > 0) {
                        while ($registro = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "
                            <div class='imagen-3'>
                                <div class='imagen-4'>
                                    <img class='img-3' src='$registro[imagen]' alt=''>
                             </div>
                            </div>
                            <div class='texto'>
                            <div class='title-5'><h2>$registro[Nombre]</h2></div>
                            <div class='precio'><p>$$registro[Precio]</p></div>
                            <div class='descripcion'>$registro[Descripcion]</div>
                            <div class='botones'>
                                <div class='stock'>
                                    <p>$registro[stock] unidades.</p>
                                </div>
                                <div class='carro'>";
                                    if (!isset($_SESSION['id'])){
                                        echo " <div>
                                        <a href='login.php'><button class='boton-1'>Añadir al carrito.</button></a>
                                    </div>
                                </div>";
                                    }else{
                                        echo "<form action='validar-carrito.php' method='POST'>
                                        <input type='hidden' name='id' value='$registro[id]'>
                                        <button class='boton-1'>Añadir al carrito.</button>
                                    </form>
                                </div>";
                                    }
                                    if (!isset($_SESSION['id'])){
                                        echo "<div class='comprar'>
                                      <a class='boton-2' href='login.php'><button class='boton-2'>Comprar ahora.</button></a>
                                    </div>";
                                    }else{
                                        echo "<form class='comprar' action='selecccionar-direccion.html' method='POST'>
                                        <input type='hidden' name='id' value='$registro[id]'>
                                      <button class='boton-2'>Comprar ahora.</button>
                                    </form>";
                                    }
                        echo"</div>
                        </div>";
                        }
                    } else {
                        echo '<center> <p class="error">No hay productos disponibles</p> </center>';
                    }
                ?>
            </div>
        </div>
    </main>
    <footer>Copyright © 2023 · Digital Dreams</footer>
</body>
</html>