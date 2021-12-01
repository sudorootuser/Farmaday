<html id="prueba">
<!-- <link rel="icon" type="image/png" href="Recursos/Imagenes/LOGO PASION DEPORTIVA COMPLETO2.png"/> -->
<?php
include_once "Modelo/base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM iva;");
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
$sentencia = $base_de_datos->prepare("SELECT * FROM iva WHERE id = ?;");
$sentencia->execute([$id]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
if ($producto === FALSE) {
    echo "¡No existe algún producto con ese ID!";
    exit();
}

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
                        <h4 style="background-color: #006666; color:#ffffff; padding:13px; text-align:center;">PRODUCTO: # <?php echo $producto->nombre; ?></h4>
                        <form method="post" action="Controladores/Iva/Edit.php">
                            <input type="hidden" name="id" value="<?php echo $producto->id; ?>">

                            <label for="nombre">Nombre del Producto o Servicio:</label>
                            <input value="<?php echo $producto->nombre ?>" class="form-control" name="nombre" required type="text" id="nombre" placeholder="Nombre...">

                            <label for="codigo_Iva">Precio del Iva:</label>
                            <input value="<?php echo $producto->codigo_Iva ?>" class="form-control" name="codigo_Iva" required type="text" id="codigo_Iva" placeholder="Escribe el valor del iva...">

                            <br>
                            <input class="btn btn-info" style="background-color:#006666;" type="submit" value="Guardar">
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
</html>