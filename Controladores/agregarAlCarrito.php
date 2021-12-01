<?php
if (!isset($_POST["codigo"])) {
    return;
}
$codigo = $_POST["codigo"];
include_once "../Modelo/base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM productos  WHERE codigo = ?  LIMIT 1;");
$sentencia->execute([$codigo]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);

$idv = $producto->id_iva;
// print_r($idv);die;
if ($idv) {
    $sentencia = $base_de_datos->prepare("SELECT * FROM iva WHERE iva.id = ?  LIMIT 1;");
    $sentencia->execute([$idv]);
    $idv = $sentencia->fetch(PDO::FETCH_OBJ);
}
// print_r($idv);die;
# Si no existe, salimos y lo indicamos
if (!$producto) {
    header("Location: ../vender.php?status=4");
    exit;
}
# Si no hay existencia...
if ($producto->existencia < 1) {
    header("Location: ../vender.php?status=5");
    exit;
}
session_start();
# Buscar producto dentro del cartito
$indice = false;
for ($i = 0; $i < count($_SESSION["carrito"]); $i++) {
    if ($_SESSION["carrito"][$i]->codigo === $codigo) {
        $indice = $i;
        break;
    }
}
# Si no existe, lo agregamos como nuevo
if ($indice === false) {
    $producto->cantidad = 1;
    $iva = $producto->precioVenta * $idv->codigo_Iva;
    $total = $iva + $producto->precioVenta;
    $producto->valor_uno = $iva + $producto->precioVenta;
    $producto->total = $iva + $producto->precioVenta;

    array_push($_SESSION["carrito"], $producto);
} else {
    # Si ya existe, se agrega la cantidad
    # Pero espera, tal vez ya no haya
    $cantidadExistente = $_SESSION["carrito"][$indice]->cantidad;
    # si al sumarle uno supera lo que existe, no se agrega
    if ($cantidadExistente + 1 > $producto->existencia) {
        header("Location: ../vender.php?status=5");
        exit;
    }
    $_SESSION["carrito"][$indice]->cantidad++;
    $_SESSION["carrito"][$indice]->total = $_SESSION["carrito"][$indice]->total + $_SESSION["carrito"][$indice]->valor_uno;
}
header("Location: ../vender.php");
