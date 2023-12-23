<?php
    session_start();
    include("../conexion.php");
    $id=$_POST['id'];
    $idCarrito=$_SESSION['id'];
    $consulta="select * from carrito where id_usuario=:idCarrito and id_producto=:id";
    $stmt=$conexion->prepare($consulta);
    $stmt->bindParam(":idCarrito",$idCarrito);
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        while ($registro = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $accion=$_POST["accion"];
            $id2=$registro['id'];
            $cantidad=$registro['cantidad'];
            if($accion=="sumar"){
                $cantidad+=1;
            }else{
                $cantidad-=1;
            }
            $consulta3="SELECT * from productos where id=:id";
            $stmt3=$conexion->prepare($consulta3);
            $stmt3->bindParam(':id',$id);
            $stmt3->execute();
            if($stmt3->rowCount()>0){
                while($registro3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
                    $stock=$registro3['stock'];
                }
            }
            //---------------------------------------------------------

            if($cantidad<=$stock && $cantidad>0){
                $consulta2="UPDATE carrito SET cantidad=:cantidad where id=:id2";
                $stmt2=$conexion->prepare($consulta2);
                $stmt2->bindParam(":cantidad",$cantidad);
                $stmt2->bindParam(":id2",$id2);
                $stmt2->execute();
            }
            header("location:Carrito.php");
        }
    } else {
        echo '<center> <p class="error">No hay productos disponibles</p> </center>';
    }
    ?>               