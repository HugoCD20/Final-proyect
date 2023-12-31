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
            window.location.href = 'Perfil/perfil.php';
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
                    <img class="img-2" src="image/logo.png" alt="logo">
                </div>
                <h4 class="title-4">Digital Dreams</h4>
            </div>
            <div class="content-1">
                <div class="carrito">
                    <a href="Carrito/Carrito.php"><img class="CarCompra" src="image/Carrito.png" alt="carrito"></a>
                </div>
                <?php 
                session_start();
                $_SESSION['pagina']=1;
                $_SESSION['pg']=1;
                $_SESSION['tipo']=null;
                $_SESSION['id-producto']=null;
                if (!isset($_SESSION['id'])){
                    echo "<a class='menu' href='Login-register/login.php'><div class='menu'><h1 class='title-1'>Iniciar sesión</h1></div></a>";
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
            <div class="titulo-1">
                <h2 class="title-2">Digital <br>Dreams</h2>
            </div>
            <div class="titulo-1">
                <h3 class="title-3">¡Dale un vistazo a nuestros productos!</h3>
            </div>
            <div class="content-3">
                <div class="contenedores">
                    <div class="cont-1">
                        <form class="imagen-1" action="Productos/vista-productos.php" method="POST">
                            <input type="hidden" name="tipo" value="laptops">
                                <button>
                                    <img class="img-1" src="image/laptop.png" alt="laptop">
                                </button>
                            </form>
                            <div class='titulo-3'><h2 style="color:#164863;">Laptops</h2></div>
                    </div>
                    <div class="cont-1"> 
                        <form class="imagen-1" action="Productos/vista-productos.php" method="POST">
                            <input type="hidden" name="tipo" value="audifonos">
                                <button>
                                    <img class="img-1" src="image/audifonos.png" alt="laptop">
                                </button>
                            </form>
                            <div class='titulo-3'><h2 style="color:#164863;">Audifonos</h2></div>
                    </div>
                    <div class="cont-1">
                        <form class="imagen-1" action="Productos/vista-productos.php" method="POST">
                            <input type="hidden" name="tipo" value="perifericos">
                                <button>
                                    <img class="img-1" src="image/kit.png" alt="laptop">
                                </button>
                            </form>
                            <div class='titulo-3'><h2 style="color:#164863;">Perifericos</h2></div>
                    </div>
                    <div class="cont-1">
                        <form class="imagen-1" action="Productos/vista-productos.php" method="POST">
                            <input type="hidden" name="tipo" value="computadoras">
                                <button>
                                    <img class="img-1" src="image/pc.png" alt="laptop">
                                </button>
                            </form>
                            <div class='titulo-3'><h2 style="color:#164863;">Computadoras de escritorio</h2></div>
                    </div>
                    <div class="cont-1">
                        <form class="imagen-1" action="Productos/vista-productos.php" method="POST">
                            <input type="hidden" name="tipo" value="monitores">
                                <button>
                                    <img class="img-1" src="image/monitor.png" alt="laptop">
                                </button>
                            </form>
                            <div class='titulo-3'><h2 style="color:#164863;">Monitores</h2></div>
                    </div>
                    <div class="cont-1">
                        <form class="imagen-1" action="Productos/vista-productos.php" method="POST">
                            <input type="hidden" name="tipo" value="componentes">
                                <button>
                                    <img class="img-1" src="image/grafica.png" alt="laptop">
                                </button>
                            </form>
                            <div class='titulo-3'><h2 style="color:#164863;">Componentes</h2></div>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>Copyright © 2023 · Digital Dreams</footer>
</body>
</html>