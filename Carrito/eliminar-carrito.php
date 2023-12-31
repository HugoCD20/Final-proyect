<?php
    session_start();
    include("../conexion.php");
    if(isset($_POST['id'])){
        $id=$_POST['id'];
    }else{
        header('location:../index.php');
        exit();
    }
    $consulta="DELETE FROM carrito where id=:id";
    $stmt=$conexion->prepare($consulta);
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    header('location:Carrito.php');
    ?>               