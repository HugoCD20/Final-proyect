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
                <div class="regreso-2" style="width: 100%; margin-bottom: 1rem;">
                    <div class="regresar">
                        <a href="modificar-producto.php"><button><img class="img-3" src="../image/regreso.png" alt=""></button></a>
                    </div>
                </div>
                
            </div>
            <div class="titulo-1">
                <div class="content-11">
                    <h4 class="title-5">ACTUALIZAR</h4>
                    <form class="form-2" action="realizar-actualizacion-producto.php" method="POST" enctype="multipart/form-data">
                        <div class="div" style="width: 100%; display: flex;margin-left: 55%;">
                        <label for="nombre">Nombre:</label></div>
                        <input class="text-box-2" type="text" id="nombre" name="nombre">

                        <div class="div" style="width: 100%; display: flex;margin-left: 55%;">
                        <label for="descripcion">Descripción:</label></div>
                        <textarea style="width: 50%; height: 15%;" id="descripcion" name="descripcion"></textarea>

                        <div class="div" style="width: 100%; display: flex;margin-left: 55%;">
                        <label for="tipo">Tipo(laptops, audifonos, perifericos, computadoras, <br>componentes y monitores):</label></div>
                        <input class="text-box-2" type="text" id="tipo" name="tipo">

                        <div class="div" style="width: 100%; display: flex;margin-left: 55%;">
                        <label  for="stock">Stock:</label></div>
                        <input class="text-box-2" type="text" id="stock" name="stock">
                        
                        <div class="div" style="width: 100%; display: flex;margin-left: 55%;">
                            <label  for="precio">Precio:</label></div>
                            <input class="text-box-2" type="text" id="precio" name="precio">

                        <div class="div" style="width: 100%; display: flex;margin-left: 55%;">
                        <label  for="imagen">Imagen:</label></div>
                        <input class="text-box-2" type="file" id="imagen" name="imagen" accept="image/*">
                        <?php $id=$_POST['id'];?>
                        <input type='hidden' name='id' value='<?php echo $id;?>'>
                        <input class="button-5" type="submit" value="Actualizar">
                    </form>
                </div>
            </div>
           
            
        </div>
    </main>
    <footer>Copyright © 2023 · Digital Dreams</footer>
</body>
</html>