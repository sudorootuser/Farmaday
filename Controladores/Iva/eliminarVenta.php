<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
// print_r($id);die;
include_once "../../Modelo/base_de_datos.php";
$sentencia = $base_de_datos->prepare("DELETE FROM ventas WHERE id = ?");
$resultado = $sentencia->execute([$id]);
if($resultado === TRUE){
	header("Location: ../../ventas.php");
	exit;
}
else echo "Algo salió mal";
?>