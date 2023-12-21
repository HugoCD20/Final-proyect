<?php
    include('../conexion.php');
    $id_compra=$_SESSION['directa'];
    $consulta="SELECT * FROM productos where id=:id_compra";
    $stmt=$conexion->prepare($consulta);
    $stmt->bindParam(":id_compra",$id_compra);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        while ($registro2 = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $_SESSION['precio']=$registro2['Precio'];
            $_SESSION['nproductos']=1;
        }
    }
?>