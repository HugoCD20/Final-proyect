<?php
session_start();
    if(isset($_POST['valor'])){
        if($_POST['valor']=='agregar'){
            header('location:../Perfil/direcciones.php');
            exit;
        }else{
            if(isset($_POST['opcion'])){
                $_SESSION['direccion']=true;
                header('location:metodo-pago.php');
                 exit;
            }else{
                $_SESSION['error']='Elige una dirección.';
                header('location:seleccionar-direccion.php');
                 exit;
            }
        }
    }
?>