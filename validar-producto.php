<?php 
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $tipos = $_POST['tipo'];
        $stock = $_POST['stock'];
        $precio = $_POST['precio'];
   
        if(strlen($nombre)>200 && strlen($descripcion)>800 && strlen($tipo)>100){
            $largo=false;
        }else{
            $largo=true;
        }

        $ima = true;
        $imagen = '';

        if (isset($_FILES['imagen'])) {
            $file = $_FILES['imagen'];
            $nombreF = $file["name"];
            $tipo = $file["type"];
            $size = $file["size"];
            $ruta_provisional = $file["tmp_name"];

            if ($nombreF != '') {
                $dimension = getimagesize($ruta_provisional);

                if ($dimension !== false) {
                    $with = $dimension[0];
                    $height = $dimension[1];

                    $carpeta = "Fotos/";
                    $src = $carpeta . $nombreF;

                    if ($tipo != "image/jpg" && $tipo != "image/png" && $tipo != "image/jpeg") {
                        echo "<br>La imagen no es compatible";
                        $ima = false;
                    } elseif ($size > 3 * 1024 * 1024) {
                        echo "<br>La imagen es demasiado pesada";
                        $ima = false;
                    } else {
                        move_uploaded_file($ruta_provisional, $src);
                        $imagen = "Fotos/" . $nombreF;
                    }
                } else {
                    echo "<br>El archivo no es una imagen válida";
                    $ima = false;
                }
            } else {
                $imagen = 'img/default.jpg';
            }
        } else {
            $ima = true;
        }

        if (!$ima) {
            $ima=false;
        }

        if(!empty($nombre) && !empty($descripcion) && !empty($tipo) && !empty($stock) && !empty($precio) && $ima && $largo){
        
            try {
                include('conexion.php');
                $consulta = "INSERT INTO productos (Nombre, Descripcion, tipo,stock,imagen,Precio) 
                            VALUES (:nombre, :descripcion, :tipos, :stock,:imagen,:precio)";
                $stmt = $conexion->prepare($consulta);
                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':descripcion', $descripcion);
                $stmt->bindParam(':tipos', $tipos);
                $stmt->bindParam(':stock', $stock);
                $stmt->bindParam(':imagen', $imagen);
                $stmt->bindParam(':precio', $precio);
                $stmt->execute();
                header("location: administracion.php");
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            
                
            
        } 
}else{
    header("location: administracion.php");
}
    
?>