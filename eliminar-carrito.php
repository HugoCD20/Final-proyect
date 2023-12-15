<?php
    session_start();
    include("conexion.php");
    $id=$_POST['id'];
    $consulta="DELETE FROM carrito where id=:id";
    $stmt=$conexion->prepare($consulta);
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    header('location:Carrito.php');
    ?>               