<?php

#Salir si alguno de los datos no está presente
if (
	!isset($_POST["nombre"]) ||
	!isset($_POST["codigo_Iva"]) ||
	!isset($_POST["id"])

	// tp_iva
) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "../../Modelo/base_de_datos.php";
$id = $_POST["id"];
$nombre = $_POST["nombre"];
$codigo_Iva = $_POST["codigo_Iva"];


// print_r($tp_iva);die;

$sentencia = $base_de_datos->prepare("UPDATE iva SET nombre = ?, codigo_Iva = ? WHERE id = ?;");
$resultado = $sentencia->execute([$nombre, $codigo_Iva, $id]);

if ($resultado === TRUE) {
	header("Location: ../../Iva.php");
	exit;
} else echo "Algo salió mal. Por favor verifica que la tabla Exista, así como el ID del producto";
