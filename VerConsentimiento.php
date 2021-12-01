<html id="prueba">
<!-- <link rel="icon" type="image/png" href="Recursos/Imagenes/LOGO PASION DEPORTIVA COMPLETO2.png"/> -->
<?php
include_once "Modelo/base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM dcconsentimiento;");
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
$sentencia = $base_de_datos->prepare("SELECT * FROM dcconsentimiento WHERE id = ?;");
$sentencia->execute([$id]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
if ($producto === FALSE) {
    echo "¡No existe algún producto con ese ID!";
    exit();
}
$query = "SELECT * FROM dcconsentimiento  WHERE id=$id";
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
                        <h4 style="background-color: #006666; color:#ffffff; padding:13px; text-align:center;">CONSENTIMIENTO DE: # <?php echo $producto->nombre; ?></h4>
                        <fieldset disabled>
                            <form method="post" action="Controladores/producto/Edit.php">
                                <br>
                                <p style="font-size: 25px;">
                                    Yo <input value=" <?php echo $producto->nombre ?>" style="font-size: 20px;border-radius: 15px;" name="nombre" required type="text"> como
                                    <input value=" <?php echo $producto->nombre ?>" style="font-size: 20px;border-radius: 15px;" name="cargo" required type="text">
                                    su representante legal en pleno uso de mis facultades, libre y voluntariamente, declaro que he leído la hoja de información y que he recibido información verbal del procedimiento Inyectologia Intramuscular, y se me ha permitido aclarar las dudas, Declaro no haber omitido ni alterado datos sobre mi estado de salud, como enfermedades, alergias o riesgos personales. Declaro comprender que en cualquier momento y sin necesidad de dar alguna explicación, puedo revocar el consentimiento que ahora presto, por lo anterior comprendiendo su indicación y riesgos, CONSIENTO en que se me realice el procedimiento.
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input value=" <?php echo $producto->nombre ?>" style="font-size: 20px; border-radius: 15px;" class="form-control" name="nomPaciente" required type="text">
                                        <div style="font-size: 25px;" class="form-text">Nombre del Paciente o Representante</div>
                                    </div>
                                    <div class="col-sm-6">
                                        <input value=" <?php echo $producto->nombre ?>" style="font-size: 20px; border-radius: 15px;" class="form-control" name="firmPaciente" required type="text">
                                        <div style="font-size: 25px;" class="form-text">Firma del Paciente o Representante</div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input value=" <?php echo $producto->nombre ?>" style="font-size: 20px; border-radius: 15px;" class="form-control" name="cedula" required type="text" id="precioVenta">
                                        <div style="font-size: 25px;" class="form-text">Número de Documento</div>
                                    </div>
                                    <div class="col-sm-6">
                                        <input value=" <?php echo $producto->nombre ?>" style="font-size: 20px; border-radius: 15px;" class="form-control" name="cedula" required type="text" id="precioVenta">
                                        <div style="font-size: 25px;" class="form-text">Número de Documento</div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input value=" <?php echo $producto->nombre ?>" style=" font-size: 20px; border-radius: 15px;" class="form-control" name="nombreAcargo" required type="text" id="precioVenta">
                                        <div style="font-size: 25px;" id="emailHelp" class="form-text">Nombre de quien realiza el Procedimiento</div>
                                    </div>
                                    <div class="col-sm-6">
                                        <input value=" <?php echo $producto->nombre ?>" style="font-size: 20px; border-radius: 15px;" class="form-control" name="firmaCargo" required type="text" id="precioVenta">
                                        <div style="font-size: 25px;" id="emailHelp" class="form-text">Firma</div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input value="<?php echo $producto->nombreMed ?>" style="font-size: 20px; border-radius: 15px;" class="form-control" name="nombreMed" required type="text" id="nombreMed">
                                        <div style="font-size: 25px;" id="nombreMed" class="form-text">Nombre del Medicamento</div>
                                    </div>
                                </div>
                                </p>
                            </form>
                        </fieldset>
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