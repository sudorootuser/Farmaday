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
                <div>
                    <div class="container-fluid">
                        <div class="col-xs-12">
                            <h4 style="background-color: #006666; color:#ffffff; padding:13px; text-align:center;">PRODUCTO X IVA</h4>
                            <form method="post" action="Controladores/Iva/nuevo.php">
                                <div class="form-group">
                                    <label for="nombre">Nombre del Producto :</label>
                                    <input class="form-control" name="nombre" required type="text" id="nombre" placeholder="Escribe el nombre del Producto...">
                                </div>
                                <div class="form-group">
                                    <label for="codigo_Iva">Valor del Iva:</label>
                                    <input class="form-control" name="codigo_Iva" required type="number" id="codigo_Iva" placeholder="Escribe el código del Iva...">
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