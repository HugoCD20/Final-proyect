<?php
session_start();
$calle=$_POST['calle'];
if($calle==null){
    header('location:direcciones.php');
    exit();
}
$colonia=$_POST['colonia'];
$numeroE=$_POST['numeroE'];
$codigoP=$_POST['codigo-postal'];
$estado=$_POST['estado'];
$numerot=$_POST['numerot'];

include('../conexion.php');
$id=$_SESSION['id'];
$consulta="INSERT into direcciones(id_usuario,calle,colonia,codigoPostal,estado,numeroExterior,numeroTelefonico)
values(:id,:calle,:colonia,:codigoP,:estado,:numeroE,:numerot)";
$stmt = $conexion->prepare($consulta);
$stmt -> bindParam(':id',$id);
$stmt -> bindParam(':calle',$calle);
$stmt -> bindParam(':colonia',$colonia);
$stmt -> bindParam(':codigoP',$codigoP);
$stmt -> bindParam(':estado',$estado);
$stmt -> bindParam(':numeroE',$numeroE);
$stmt -> bindParam(':numerot',$numerot);
$stmt->execute();
header('location:direcciones.php');
?>