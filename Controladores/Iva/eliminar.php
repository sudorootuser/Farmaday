<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "../../Modelo/base_de_datos.php";
$sentencia = $base_de_datos->prepare("DELETE FROM iva WHERE id = ?;");
$resultado = $sentencia->execute([$id]);
if($resultado === TRUE){
	header("Location: ../../Iva.php");
	exit;
}
else echo "Algo salió mal";
?>