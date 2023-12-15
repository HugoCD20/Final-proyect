<?php 
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    session_start();
    $Contraseña = $_POST['contrasena'];
    $Correo = $_POST['correo'];
    if(strlen($Contraseña)>200 && strlen($Correo)>200){
        $largo=false;
    }else{
        $largo=true;
    }
    if(!empty($Contraseña) && !empty($Correo) && $largo){
        try {
            include("conexion.php");
            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];
            $conexion->exec("SET CHARACTER SET utf8");
            $consulta = "SELECT * FROM administrador WHERE Nombre=? AND Contraseña=?";
            $stmt = $conexion->prepare($consulta);
            $stmt->execute(array($correo, $contrasena));
            if ($stmt->rowCount() > 0) {
                while ($registro = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $_SESSION['id-admin']=$registro['id'];
                    header("location:administracion.php");
                }
            } else {
                echo '<center> <p class="error">Contraseña o nombre incorrectos</p> </center>';
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

}else{
    header("location:administrador.php");
}
?>