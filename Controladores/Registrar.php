<?php
session_start();
require_once '../Modelo/Conexion.php';

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$tipo_doc = $_POST['tipo_doc'];
$documento = $_POST['documento'];
$pais = $_POST['pais'];
$ciudad = $_POST['ciudad'];
$email = $_POST['email'];
$contrasena = $_POST['contrasena'];
$usuario = $_POST['usuario'];
$acepte = $_POST['acepte'];
$telefono = $_POST['telefono'];
$celular = $_POST['celular'];
$ciudad_idciudad = $_POST['ciudad'];
$rol_idrol = 1;
$tipo_idtipo = $_POST['tipo'];


$sql_User = "INSERT INTO `usuarios`(`nombre`, `apellido`, `tipo_doc`, `documento`, `email`, `contrasena`, `usuario`, `terminos`, `telefono`, `celular`, `ciudad_idciudad`, `rol_idrol`, `tipo_idtipo`) VALUES('$nombre','$apellido','$tipo_doc',$documento,'$email','$contrasena','$usuario',$acepte,$telefono,$celular,$ciudad_idciudad,$rol_idrol,$tipo_idtipo)";
//print_r($sql_User);
if ($consulta_User = mysqli_query($link, $sql_User)) {
    
    echo "<script>window.location.href = '../RespuestaRegistro.php';</script>";
    //print_r($consulta_User);
} else {
    die("No existe la consulta");
}
$id = mysqli_insert_id($link);
