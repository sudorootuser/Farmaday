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
        <!-- <?php include './Vista/MenuLateral.php'; ?> -->

        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <body style="background-color: #fff;overflow: auto;">
            <div class="col-sm">
                <div class="text-center">
                    <a class="btn btn-success btn-block" href="./Recursos/ConsentimientoPDF/descarga.php" style="text-align: center; background-color: #006666;">Descargar </a>
                </div>
            </div>
            <div class="col-10">
                <div class="container-fluid" style="overflow-x: auto!important; height: 65%!important;">
                    <div class="col-sm-12">
                        <h4 style="background-color: #006666; color:#ffffff; padding:13px; text-align:center;">DECLARACIÓN DEL CONSENTIMIENTO</h4>
                        <br>
                        <form method="post" action="Controladores/consentimiento/crear.php" enctype="multipart/form-data">
                            <p style="font-size: 25px;">
                                Yo <input style="font-size: 20px;border-radius: 15px;" name="nombre" required type="text"> como
                                <input style="font-size: 20px;border-radius: 15px;" name="cargo" required type="text">
                                su representante legal en pleno uso de mis facultades, libre y voluntariamente, declaro que he leído la hoja de información y que he recibido información verbal del procedimiento Inyectologia Intramuscular, y se me ha permitido aclarar las dudas, Declaro no haber omitido ni alterado datos sobre mi estado de salud, como enfermedades, alergias o riesgos personales. Declaro comprender que en cualquier momento y sin necesidad de dar alguna explicación, puedo revocar el consentimiento que ahora presto, por lo anterior comprendiendo su indicación y riesgos, CONSIENTO en que se me realice el procedimiento.
                            <div class="row">
                                <div class="col-sm-6">
                                    <input style="font-size: 20px; border-radius: 15px;" class="form-control" name="nomPaciente" required type="text">
                                    <div style="font-size: 25px;" class="form-text">Nombre del Paciente o Representante</div>
                                </div>
                                <div class="col-sm-6">
                                    <input style="font-size: 20px; border-radius: 15px;" class="form-control" name="firmPaciente" required type="text">
                                    <div style="font-size: 25px;" class="form-text">Firma del Paciente o Representante</div>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-sm-6">
                                    <select name="tpDocument" style="font-size: 20px;" class="form-select" aria-label="Default select example">
                                        <option selected>Tipo de Documento</option>
                                        <option value="Cédula de ciudadanía">Cédula de ciudadanía</option>
                                        <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                                        <option value="Cédula de Extrangería">Cédula de Extrangería</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <input style="font-size: 20px; border-radius: 15px;" class="form-control" name="cedula" required type="number" id="precioVenta">
                                    <div style="font-size: 25px;" class="form-text">Número de Documento</div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-6">
                                    <input style=" font-size: 20px; border-radius: 15px;" class="form-control" name="nombreAcargo" required type="text" id="precioVenta">
                                    <div style="font-size: 25px;" id="emailHelp" class="form-text">Nombre de quien realiza el Procedimiento</div>
                                </div>
                                <div class="col-sm-6">
                                    <input style="font-size: 20px; border-radius: 15px;" class="form-control" name="firmaCargo" required type="text" id="precioVenta">
                                    <div style="font-size: 25px;" id="emailHelp" class="form-text">Firma</div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-12">
                                    <input style=" font-size: 20px; border-radius: 15px;" class="form-control" name="nombreMed" required type="text" id="nombreMed">
                                    <div style="font-size: 25px;" id="nombreMed" class="form-text">Nombre del Medicamento</div>
                                </div>
                            </div>
                            <br>
                            </p>
                            <input class="btn btn btn-block " style="color:white; background-color: #006666;" name="addConsent" type="submit" value="Guardar">
                            <br><br><br>
                            <br><br><br>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-sm"></div>
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