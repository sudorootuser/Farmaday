<html id="prueba">
<!-- <link rel="icon" type="image/png" href="Recursos/Imagenes/LOGO PASION DEPORTIVA COMPLETO2.png"/> -->
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

// print_r($la);die;
if (!isset($_SESSION["id_usuario"])) {
    header('Location:index.php');
}
require 'Controladores//Cont_Perfil_User.php';


?>
<?php
if (!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "Modelo/base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM productos WHERE id = ?;");
$sentencia->execute([$id]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
if ($producto === FALSE) {
    echo "¡No existe algún producto con ese ID!";
    exit();
}
$query = "SELECT * FROM productos INNER JOIN iva ON iva.`id`=productos.`id_iva` WHERE productos.id=$id";
$query = mysqli_query($mysqli, $query);
$iva = $query->fetch_assoc();

$query2 = "SELECT * FROM iva";
$query_r = mysqli_query($mysqli, $query2);
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
                <div class="container-fluid" style="overflow: auto; height: 80%;">
                    <div class="col-xs-12">
                        <h4 style="background-color: #006666; color:#ffffff; padding:13px; text-align:center;">PRODUCTO: # <?php echo $producto->codigo; ?></h4>
                        <form method="post" action="Controladores/producto/Edit.php">
                            <input type="hidden" name="id" value="<?php echo $producto->id; ?>">

                            <label for="codigo">Código de barras:</label>
                            <input value="<?php echo $producto->codigo ?>" class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el código">

                            <label for="descripcion">Descripción:</label>
                            <textarea required id="descripcion" name="descripcion" cols="30" rows="5" class="form-control"><?php echo $producto->descripcion ?></textarea>

                            <label for="precioVenta">Precio de venta:</label>
                            <input value="<?php echo $producto->precioVenta ?>" class="form-control" name="precioVenta" required type="number" id="precioVenta" placeholder="Precio de venta">

                            <label for="precioCompra">Precio de compra:</label>
                            <input value="<?php echo $producto->precioCompra ?>" class="form-control" name="precioCompra" required type="number" id="precioCompra" placeholder="Precio de compra">

                            <label for="fechaVencimiento">Fecha de Vencimiento:</label>
                            <input value="<?php echo $producto->fechaVencimiento ?>" class="form-control" name="fechaVencimiento" required type="date" id="fechaVencimiento">

                            <label for="registroInvima">Registro Invima:</label>
                            <input value="<?php echo $producto->registroInvima ?>" class="form-control" name="registroInvima" required type="text" id="registroInvima" placeholder="Reguistro Invima">

                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Iva:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-bars" aria-hidden="true"></i></span>
                                    </div>
                                    <select name="tp_iva" id="tp_iva" class="form-control" aria-label="Default select example">
                                        <?php if ($iva['id'] == null || $iva['id'] == 'undefined' || $iva['id'] == '') { ?>
                                            <option >Seleccione el Valor del Iva</option>
                                        <?php } else { ?>
                                            <option value="<?php echo $iva['id']; ?>"><?php echo $iva['nombre']; ?> = <?php echo $iva['codigo_Iva']; ?>%</option>
                                        <?php }; ?>

                                        <?php while ($row = $query_r->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?> = <?php echo $row['codigo_Iva']; ?>%</option>
                                        <?php } ?>
                                    </select>

                                </div>
                            </div>
                            <label for="existencia">Existencia:</label>
                            <input value="<?php echo $producto->existencia ?>" class="form-control" name="existencia" required type="number" id="existencia" placeholder="Cantidad o existencia">
                            <br><br><input class="btn btn-info" style="background-color:#006666;" type="submit" value="Guardar">
                            <a class="btn btn-dark" href="./Dashboard.php">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include 'Vista/Footer_Princ.php'; ?>
    <!-- Footer Principal -->

</body>
<script>
    //Funcion para traer el valor de los iva
    $(document).ready(function() {
        $("#tp_iva").change(function() {
            $("#tp_iva option:selected").each(function() {
                id = $(this).val();
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("#tp_iva").change(function() {
            $("#tp_iva option:selected").each(function() {
                id = $(this).val();
            });
        });
    });
</script>

</html>