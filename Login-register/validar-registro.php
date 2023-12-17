<?php 
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $Correo = $_POST['correo'];
    $Contraseña = $_POST['contrasena'];
    $Contra = $_POST['confirmarContrasena'];
    $Nusuario = $_POST['nombre'];
    $valida = true;
    if ($Contraseña != $Contra) {
        $valida = false;
    }
    if(strlen($Nusuario)>200 && strlen($Correo)>200 && strlen($Contraseña)>200){
        $largo=false;
    }else{
        $largo=true;
    }
    $correoFiltrado = filter_var($Correo, FILTER_VALIDATE_EMAIL);                        
    if ($correoFiltrado == false) {
        $cor=false;
    }else{
        $cor=true;
    }

    if(!empty($Correo) && !empty($Contraseña) && !empty($Contra) && !empty($Nusuario) && $valida && $cor && $largo){
        try {
            include('../conexion.php');
            $nombreU = $_POST['nombre'];
            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];
            $consulta = "INSERT INTO usuarios(Nombre, Correo, Contraseña) 
                         VALUES (:nombreU, :correo, :contrasena)";
            $stmt = $conexion->prepare($consulta);
            $stmt->bindParam(':nombreU', $nombreU);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':contrasena', $contrasena);
            $stmt->execute();
            header("location: login.php");
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        
            
        
    } 
}else{
    header("location: ../index.php");
}
    
?>