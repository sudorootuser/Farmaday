<?php
#Salir si alguno de los datos no está presente
if (!isset($_POST["nombre"]) || !isset($_POST["codigo_Iva"])) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "../../Modelo/base_de_datos.php";
$nombre = $_POST["nombre"];
$codigo_Iva = $_POST["codigo_Iva"];

$sentencia = $base_de_datos->prepare("INSERT INTO iva(nombre, codigo_Iva) VALUES (?, ?);");
$resultado = $sentencia->execute([$nombre, $codigo_Iva]);

if ($resultado === TRUE) {
	header("Location: ../../Iva.php");
	exit;
} else echo "Algo salió mal. Por favor verifica que la tabla exista";

?>
<?php include_once "pie.php" ?>