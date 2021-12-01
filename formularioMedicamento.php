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
$sql = "SELECT * FROM iva";
$result3 = mysqli_query($mysqli, $sql);

// print_r($la);die;
if (!isset($_SESSION["id_usuario"])) {
    header('Location:index.php');
}
require 'Controladores//Cont_Perfil_User.php';
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
                <div style="overflow: auto; height: 70%;">
                    <div class="container-fluid">
                        <div class="col-xs-12">
                            <h4 style="background-color: #006666; color:#ffffff; padding:13px; text-align:center;">NUEVO MEDICAMENTO</h4>
                            <form method="post" action="Controladores/producto/nuevo.php">
                                <div class="form-group">
                                    <label for="codigo">Código de barras:</label>
                                    <input class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el código">
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripción:</label>
                                    <textarea required id="descripcion" name="descripcion" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="precioVenta">Precio de venta:</label>
                                    <input class="form-control" name="precioVenta" required type="number" id="precioVenta" placeholder="Precio de venta">
                                </div>
                                <div class="form-group">
                                    <label for="precioCompra">Precio de compra:</label>
                                    <input class="form-control" name="precioCompra" required type="number" id="precioCompra" placeholder="Precio de compra">
                                </div>
                                <div class="form-group">
                                    <label for="fechaVencimiento">Fecha de Vencimiento:</label>
                                    <input class="form-control" name="fechaVencimiento" required type="date" id="fechaVencimiento">
                                </div>
                                <div class="form-group">
                                    <label for="registroInvima">Registro Invima:</label>
                                    <input class="form-control" name="registroInvima" required type="text" id="registroInvima" placeholder="Registro Invima">
                                </div>

                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Iva:</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-bars" aria-hidden="true"></i></span>
                                        </div>
                                        <select name="tp_iva" id="tp_iva" class="form-control" aria-label="Default select example">
                                            <option value="0">Tipo de Iva:</option>
                                            <?php while ($row = $result3->fetch_assoc()) { ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?> =  <?php echo$row['codigo_Iva'];?>%</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="existencia">Existencia:</label>
                                    <input class="form-control" name="existencia" required type="number" id="existencia" placeholder="Cantidad o existencia">
                                </div>
                                <input class="btn btn-info btn-block " style="background-color: #006666;" type="submit" value="Guardar">
                            </form>
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

</html>