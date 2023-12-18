<?php
session_start();
if(!isset($_SESSION['id-admin'])){
    header('location:administrador.php');
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
                <div class="regresar">
                    <a href="administracion.php"><button><img class="img-3" src="../image/regreso.png" alt=""></button></a>
                </div>
                <div class="buscar"></div>
            </div>
            <div class="titulo-1">
                <h3 class="title-5">MODIFICAR PRODUCTO</h3>
            </div>
            <div class="content-5">
                <div class="content-6">
                <div class="caja">
                    <div style="margin-top: 1rem;" class="form-2">
                    <?php
                        include("../conexion.php"); 
                        $consulta="select * from productos";
                        $stmt = $conexion->prepare($consulta);
                        $stmt->execute();
                        if ($stmt->rowCount() > 0) {
                            while ($registro = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<div style='display: flex;' class='button-7'><p style='width: 50%;'><strong>$registro[Nombre]</strong><br>id: $registro[id]<br>stock:$registro[stock]</p>
                                <div style='width: 50%; display: flex; align-items: end; flex-direction: column;'>
                                    <form style='margin-bottom:1rem;' action='eliminar-producto.php' method='POST'>
                                        <input type='hidden' name='id' value='$registro[id]'>
                                        <button style='width:auto;'>Eliminar</button> 
                                    </form>
                                    <form action='actualizar-producto.php' method='POST'>
                                        <input type='hidden' name='id' value='$registro[id]'>
                                        <button>Actualizar</button>
                                    </form>
                                </div>
                            </div>";
                            }
                        } else {
                            echo '<center> <p class="error">No hay productos disponibles</p> </center>';
                        }
                        ?>
      
                    </div>                
                </div>
                </div>
            </div>            
            </div>
            
        </div>
    </main>
    <footer>Copyright © 2023 · Digital Dreams</footer>
</body>
</html>