<?php 
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        session_start();
        try {
            include('conexion.php');
            $id = $_POST['id'];
            $idUsuario = $_SESSION['id'];
            $consulta = "SELECT * FROM carrito where id_usuario=:idUsuario AND id_producto=:id";
            $stmt = $conexion->prepare($consulta);
            $stmt->bindParam(':idUsuario', $idUsuario);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                while ($registro = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $incremento=$registro['cantidad'];
                    $id2=$registro['id'];
                    $incremento+=1;
                    $consulta3="UPDATE carrito SET cantidad=:incremento where id=:id2";
                    $stmt3=$conexion->prepare($consulta3);
                    $stmt3->bindParam(":incremento",$incremento);
                    $stmt3->bindParam(":id2",$id2);
                    $stmt3->execute();
                    header("location: Carrito.php");
                }
            } else {
                $id = $_POST['id'];
                $idUsuario = $_SESSION['id'];
                $consulta2 = "INSERT INTO carrito(id_usuario, id_producto) 
                            VALUES (:idUsuario, :id)";
                $stmt2 = $conexion->prepare($consulta2);
                $stmt2->bindParam(':idUsuario', $idUsuario);
                $stmt2->bindParam(':id', $id);
                $stmt2->execute();
                header("location: Carrito.php");
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
          
    
}else{
    header("location: Carrito.php");
}
    
?>