<?php 
$id=$_POST['id'];
$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];
$tipo2=$_POST['tipo'];
$stock=$_POST['stock'];
$precio=$_POST['precio'];
include('conexion.php');
$ima = true;
$imagen = '';

if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK){
$file = $_FILES['imagen'];
$nombreF = $file["name"];
$tipo = $file["type"];
$size = $file["size"];
$ruta_provisional = $file["tmp_name"];

if ($nombreF != '') {
$dimension = getimagesize($ruta_provisional);
$with = $dimension[0];
$height = $dimension[1];
$carpeta = "Fotos/";
$src = $carpeta . $nombreF;

if ($tipo != "image/jpg" && $tipo != "image/png" && $tipo != "image/JPG" && $tipo != "image/jpeg") {
    echo "La imagen no es compatible";
    $ima = false;
} elseif ($size > 3 * 1024 * 1024) {
    echo "La imagen es demasiado pesada";
    $ima = false;
} /*elseif($with != 800 && $height != 800){
    echo "-La imagen no cumple con el tamaño-";
    $ima=false;
}*/ else {
    move_uploaded_file($ruta_provisional, $src);
    $imagen = "Fotos/" . $nombreF;
}
} else {
$imagen = 'sin-imagen';
}
} else {
// No se envió ninguna foto
$imagen = 'sin-imagen';
$ima = false;
}
if(strlen($nombre)>200 or strlen($descripcion)>800 or strlen($tipo2)>100){
    header('location:actualizar-producto.php');
    exit();
}

if ($ima) {
    $consulta = "UPDATE productos SET imagen=:imagen WHERE id=:id";
    $stmt2 = $conexion->prepare($consulta);
    $stmt2->bindParam(':imagen', $imagen);
    $stmt2->bindParam(':id', $id);

    if ($stmt2->execute()) {
        echo "La foto se ha actualizado correctamente.";
    } else {
        echo "Error al actualizar la foto.";
    }
}
if(!empty($nombre)){
    $consulta = "update productos set Nombre=:nombre where id=:id";
    $stmt3 = $conexion->prepare($consulta);
    $stmt3->bindParam(':nombre',$nombre);
    $stmt3->bindParam(':id',$id);
    $stmt3->execute();

}

if(!empty($descripcion)){
    $consulta = "update productos set Descripcion=:descripcion where id=:id";
    $stmt4 = $conexion->prepare($consulta);
    $stmt4->bindParam(':descripcion',$descripcion);
    $stmt4->bindParam(':id',$id);
    $stmt4->execute();

}
if(!empty($tipo2)){
    $consulta = "update productos set tipo=:tipo2 where id=:id";
    $stmt5 = $conexion->prepare($consulta);
    $stmt5->bindParam(':tipo2',$tipo2);
    $stmt5->bindParam(':id',$id);
    $stmt5->execute();
}
if(!empty($stock)){
    $consulta = "update productos set stock=:stock where id=:id";
    $stmt6 = $conexion->prepare($consulta);
    $stmt6->bindParam(':stock',$stock);
    $stmt6->bindParam(':id',$id);
    $stmt6->execute();
}
if(!empty($precio)){
    $consulta = "update productos set Precio=:precio where id=:id";
    $stmt7 = $conexion->prepare($consulta);
    $stmt7->bindParam(':precio',$precio);
    $stmt7->bindParam(':id',$id);
    $stmt7->execute();
}
header('location:modificar-producto.php');

?>