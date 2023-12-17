<?php 
$id=$_SESSION['id'];
$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$contrasena=$_POST['contrasena'];
include('../conexion.php');

if(strlen($nombre)>200 or strlen($correo)>200 or strlen($contrasena)>200){
    header('location:perfil.php');
    exit();
}

if (!empty($nombre)) {
    $consulta = "UPDATE usuarios SET Nombre=:nombre WHERE id=:id";
    $stmt2 = $conexion->prepare($consulta);
    $stmt2->bindParam(':nombre', $nombre);
    $stmt2->bindParam(':id', $id);
    $stmt2->execute();
}
if(!empty($correo)){
    $correoFiltrado = filter_var($correo, FILTER_VALIDATE_EMAIL);                        
    if ($correoFiltrado == false) {
        $cor=false;
        header('location:modificar-perfil.php');
        exit();
    }else{
        $consulta = "update usuarios set Correo=:correo where id=:id";
        $stmt3 = $conexion->prepare($consulta);
        $stmt3->bindParam(':correo',$correo);
        $stmt3->bindParam(':id',$id);
        $stmt3->execute();
    }
    

}

if(!empty($contrasena)){
    $consulta = "update usuarios set Contraseña=:contrasena where id=:id";
    $stmt4 = $conexion->prepare($consulta);
    $stmt4->bindParam(':contrasena',$contrasena);
    $stmt4->bindParam(':id',$id);
    $stmt4->execute();

}

header('location:perfil.php');

?>