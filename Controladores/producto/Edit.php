<?php

#Salir si alguno de los datos no está presente
if (
	!isset($_POST["codigo"]) ||
	!isset($_POST["descripcion"]) ||
	!isset($_POST["precioCompra"]) ||
	!isset($_POST["precioVenta"]) ||
	!isset($_POST['fechaVencimiento']) ||
	!isset($_POST['registroInvima']) ||
	!isset($_POST["existencia"]) ||
	!isset($_POST['tp_iva']) ||
	!isset($_POST["id"])

	// tp_iva
) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "../../Modelo/base_de_datos.php";
$id = $_POST["id"];
$codigo = $_POST["codigo"];
$descripcion = $_POST["descripcion"];
$precioCompra = $_POST["precioCompra"];
$precioVenta = $_POST["precioVenta"];
$fechaVencimiento = $_POST['fechaVencimiento'];
$registroInvima = $_POST['registroInvima'];
$existencia = $_POST["existencia"];
$tp_iva = $_POST['tp_iva'];


// print_r($tp_iva);die;
if ($tp_iva == '' || $tp_iva == null || $tp_iva == 'undefined') {
	$sentencia = $base_de_datos->prepare("UPDATE productos SET codigo = ?, descripcion = ?, precioCompra = ?, precioVenta = ?, fechaVencimiento = ?, registroInvima = ?, existencia = ?, id_iva= ? WHERE id = ?;");
	$resultado = $sentencia->execute([$codigo, $descripcion, $precioCompra, $precioVenta, $fechaVencimiento, $registroInvima, $existencia, $tp_iva, $id]);
} else {
	$sentencia = $base_de_datos->prepare("UPDATE productos SET codigo = ?, descripcion = ?, precioCompra = ?, precioVenta = ?, fechaVencimiento = ?, registroInvima = ?, existencia = ? WHERE id = ?;");
	$resultado = $sentencia->execute([$codigo, $descripcion, $precioCompra, $precioVenta, $fechaVencimiento, $registroInvima, $existencia, $id]);
}
if ($resultado === TRUE) {
	header("Location: ../../Dashboard.php");
	exit;
} else echo "Algo salió mal. Por favor verifica que la tabla Exista, así como el ID del producto";
