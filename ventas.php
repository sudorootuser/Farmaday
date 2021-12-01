<html id="prueba">
<?php
include_once "Modelo/base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM productos;");
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<?php
// <!-- Headers -->
include_once './Vista/HeadersDashboard.php';

require 'Modelo/Conexion.php';
require 'Controladores/funcs.php';

// $sql = "SELECT * FROM `reservas` WHERE  estado_reserva=0 ORDER BY fecha_Reserva DESC LIMIT 4";
// $result3 = mysqli_query($mysqli, $sql);

// print_r($la);die;
if (!isset($_SESSION["id_usuario"])) {
	header('Location:index.php');
}
require 'Controladores/Cont_Perfil_User.php';
?>
<?php
include_once "Modelo/base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT ventas.total, ventas.fecha, ventas.id, GROUP_CONCAT(	productos.codigo, '..',  productos.descripcion, '..', productos_vendidos.cantidad SEPARATOR '__') AS productos FROM ventas INNER JOIN productos_vendidos ON productos_vendidos.id_venta = ventas.id INNER JOIN productos ON productos.id = productos_vendidos.id_producto GROUP BY ventas.id ORDER BY ventas.id;");
$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<body style="background-color: #fff;overflow: hidden !important;">
	<?php
	include_once './Vista/MenuNav.php';
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col">
				<br>
			</div>
		</div>
		<div class="row">
			<?php include './Vista/MenuLateral.php'; ?>
			<div class="col-8">
				<div class="container-fluid">

					<div class="col-xs-12">
						<h4 style="background-color: #006666; color:#ffffff; padding:13px; text-align:center;">VENTAS REALIZADAS</h4>
						<br>
						<table class="table">
							<thead class="thead-dark">
								<tr>
									<th>Número</th>
									<th>Fecha</th>
									<th>Productos vendidos</th>
									<th>Total</th>
									<th>Descargar</th>
									<th>Eliminar</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($ventas as $venta) { ?>
									<tr>
										<td><?php echo $venta->id ?></td>
										<td><?php echo $venta->fecha ?></td>
										<td>
											<table class="table ">
												<thead class="thead-dark">
													<tr>
														<th>Código</th>
														<th>Descripción</th>
														<th>Cantidad</th>
													</tr>
												</thead>
												<tbody>
													<?php foreach (explode("__", $venta->productos) as $productosConcatenados) {
														$producto = explode("..", $productosConcatenados)
													?>
														<tr>
															<td><?php echo $producto[0] ?></td>
															<td><?php echo $producto[1] ?></td>
															<td><?php echo $producto[2] ?></td>
														</tr>
													<?php } ?>
												</tbody>
											</table>
										</td>
										<td><?php echo $venta->total ?></td>
										<td><a class="btn btn-primary" href="<?php echo "pdf/index.php?id=" . $venta->id ?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></td>
										<td><a class="btn btn-danger" href="<?php echo "Controladores/producto/eliminarVenta.php?id=" . $venta->id ?>"><i class="fa fa-trash"></i></a></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
						<div>
							<a class="btn btn-success   btn-block" href="./vender.php" style="background-color: #006666;">NUEVO </a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer -->
	<?php include 'Vista/Footer_Princ.php'; ?>
	<!-- Footer Principal -->

</body>

</html>