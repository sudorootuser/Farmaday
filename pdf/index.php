<?php
include 'plantilla.php';
require 'conexion.php';

$id = $_GET['id'];
$fechaActual = date('d-m-Y H:i:s');
// print_r($fechaActual);
// die;
$query = "SELECT * FROM `productos_vendidos` INNER JOIN ventas ON productos_vendidos.`id_venta`=ventas.`id` INNER JOIN productos ON productos_vendidos.`id_producto`=productos.`id` WHERE id_venta='$id'";
$resultado = $mysqli->query($query);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(40, 6, 'Codigo', 1, 0, 'C', 1);
$pdf->Cell(40, 6, 'Descripcion', 1, 0, 'C', 1);
$pdf->Cell(40, 6, 'Cantidad', 1, 0, 'C', 1);
$pdf->Cell(45, 6, 'Fecha Vencimiento', 1, 0, 'C', 1);
$pdf->Cell(45, 6, 'Fecha Actual', 1, 0, 'C', 1);
$pdf->Cell(50, 6, 'Valor del Producto', 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 10);

while ($row = $resultado->fetch_assoc()) {
	$pdf->Cell(40, 6, utf8_decode($row['codigo']), 1, 0, 'C');
	$pdf->Cell(40, 6, $row['descripcion'], 1, 0, 'C');
	$pdf->Cell(40, 6, utf8_decode($row['cantidad']), 1, 0, 'C');
	$pdf->Cell(45, 6, utf8_decode($row['fechaVencimiento']), 1, 0, 'C');
	$pdf->Cell(45, 6, utf8_decode($fechaActual), 1, 0, 'C');
	$pdf->Cell(50, 6, utf8_decode($row['total']), 1, 1, 'C');
}
$pdf->Output();
?>
