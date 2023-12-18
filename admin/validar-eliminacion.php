<?php
include('../conexion.php');
$id=$_POST['id'];
if($id==null){
    header('location:modificar-producto.php');
    exit();
}
$consulta="delete from productos where id=:id";
$stmt=$conexion->prepare($consulta);
$stmt->bindParam(":id",$id);
$stmt->execute();
header('location:modificar-producto.php');
?>