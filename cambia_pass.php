<html>
<!-- <link rel="icon" type="image/png" href="Recursos/Imagenes/LOGO PASION DEPORTIVA COMPLETO2.png" /> -->

<!-- Headers -->
<?php
include_once './Vista/Headers.php';

require 'Modelo/Conexion.php';
require 'Controladores/funcs.php';

if (empty($_GET['user_id'])) {
    header('Location: index.php');
}

$user_id = $_GET['user_id'];
?>

<body style="background-color: #fff;overflow: hidden !important;">
    <div class="box">
        <div class="row content">
            <div class="col-3 Lateral">

            </div>
            <div class="col-6 text-center">
                <br>
                <br>
                <div class="card">
                    <div class="card-header" style="background-color: #caf406;background-image: url('Recursos/Imagenes/FondoLoguin.png')">
                        <div class="card-title">
                            <img src="Recursos/Imagenes/LOGO PASION DEPORTIVA COMPLETO.png" class="img-fluid" style="width: 20%;">
                            <h3 style="color: white;">INGRESO</h3>
                        </div>
                    </div>
                    <div class="card-body" style="border: solid #009933 0.5px;border-radius: 0px 0px 20px 20px;">
                        <form id="loginform" class="form-login" role="form" action="guarda_pass.php" method="POST" autocomplete="off">
                            <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id; ?>" />
                            <div class="input-group mb-3">
                                <span class="input-group-text" style="background-color: #009933;border: solid #009933 0.5px;border-radius: 10px 0px 0px 10px;" id="basic-addon1"><i class="fas fa-lock" style="color: white;"></i></span>
                                <input type="password" style="border: solid #009933 0.5px;" name="password" class="form-control" placeholder="Nueva Contraseña" aria-label="newpassword" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" style="background-color: #009933;border: solid #009933 0.5px;border-radius: 10px 0px 0px 10px;" id="basic-addon1"><i class="fas fa-lock" style="color: white;"></i></span>
                                <input type="password" style="border: solid #009933 0.5px;" name="con_password" class="form-control" placeholder="Confirmar Contraseña" aria-label="conpassword" aria-describedby="basic-addon1">
                            </div>
                            <input type="submit" class="btn" style="background-color: #caf406;color: #009933;width: 100%;font-weight: bold;" value="Modificar">
                            <br>
                            <div class="botones_regresos mt-3">
                                <a href="index.php" class="old">
                                    <center>Inicio!!</center>
                                </a>
                            </div>
                            <div class="botones_regreso">
                                <a href="registro.php" class="form-an-account">
                                    <center>¿No tienes una cuenta?,¡Registrate!</center>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>