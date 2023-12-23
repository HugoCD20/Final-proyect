<?php session_start();
$_SESSION['id-producto']=null;
$_SESSION['pagina']=2;
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
                    <a href="../Carrito/Carrito.php"><img class="CarCompra" src="../image/Carrito.png" alt="carrito"></a>
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
                    <a href="../index.php"><button><img class="img-3" src="../image/regreso.png" alt=""></button></a>
                </div>
                <form class="buscar" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                    <select class="textbox-1" id='menu' name='menu'> 
                    <option value='defauld' selected disabled></option>
                    <option value='laptops'>Laptops</option>
                    <option value='audifonos'>Audifonos</option>
                    <option value='perifericos'>Periféricos</option>
                    <option value='computadoras'>Computadoras de escritorio</option>
                    <option value='monitores'>Monitores</option>
                    <option value='componentes'>Componentes</option>
                  </select>
                  <button class="lupa"><img class="img-3" src="../image/lupa.png" alt="lupa"></button>
            </form>
            <?php
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                    if(isset($_POST['menu'])){
                        $_SESSION['tipo']=$_POST['menu'];
                    }
                
            }
            ?>
            </div>
            <div class="content-3">
                <div class="contenedores-2">
                        <?php
                            include("../conexion.php");                         
                            if($_SESSION['tipo']==null){
                                $tipo=$_POST['tipo'];   
                                $_SESSION['tipo']=$tipo;
                            }else{
                                $tipo=$_SESSION['tipo'];
                            }
                            $consulta="select * from productos where tipo=:tipo";
                            $stmt = $conexion->prepare($consulta);
                            $stmt->bindParam(":tipo",$tipo);
                            $stmt->execute();
                            $contador=0;
                            if ($stmt->rowCount() > 0) {
                                while ($registro = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    if($registro['stock']>0){
                                        echo "<div class='cont-2'>
                                            <form class='imagen-1' action='producto.php' method='POST'>
                                                <input type='hidden' name='id' value='$registro[id]'>
                                                    <button>
                                                        <img class='img-1' src='../$registro[imagen]' alt='laptop'>
                                                    </button>
                                                </form>
                                            <div class='titulo-3' style='text-align:center;'><h2>$registro[Nombre]</h2></div>
                                        </div>";
                                        $contador+=1;
                                    }
                                }
                            } else {
                                echo '<center> <p class="error">No hay productos disponibles</p> </center>';
                            }
                            if($contador==0){
                                echo '<center> <p class="error">No hay productos disponibles</p> </center>';
                            }
                        ?>                    
                </div>                
            </div>
        </div>
    </main>
    <footer>Copyright © 2023 · Digital Dreams</footer>
</body>
</html>