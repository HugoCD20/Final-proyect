<?php 
$servidor = "localhost:3307";
$usuario = "root";
$password = "";
$conexion = new PDO("mysql:host=$servidor;dbname=digitaldreams", $usuario, $password);
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>