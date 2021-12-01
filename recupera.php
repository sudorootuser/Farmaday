<html>
<!-- <link rel="icon" type="image/png" href="Recursos/Imagenes/LOGO PASION DEPORTIVA COMPLETO2.png"/> -->

<!-- Headers -->
<?php
include_once './Vista/Headers.php';

require 'Modelo/Conexion.php';
require 'Controladores/funcs.php';

$errors = array();

if (!empty($_POST)) {
    $email = $mysqli->real_escape_string($_POST['email']);
    if (!isEmail($email)) {
        $errors[] = "Debe ingresar un correo electronico valido";
    }
    if (emailExiste($email)) {
        $user_id = getValor('idUsuario', 'correo', $email);
        $nombre = getValor('nombreUsuario', 'correo', $email);
        header("Location:cambia_pass.php?user_id=". $user_id);
       
            echo "<script>alert('Validacion Del correo Exitosa.');window.location='inicio.php'</script>";
           
    } else {
        $errors[] = "El correo electronico no existe ";
    }
}
?>

<body style="background-color: #006666;overflow: hidden !important;">
    <div class="box">
        <div class="row content">
            <div class="col-3 Lateral">
            </div>
            <div class="col-6 text-center">
                <br>
                <br>
                <div class="card">
                    <div class="card-header" style="background-color: #29ABE2;">
                        <div class="card-title">
                            <img src="Recursos/Imagenes/LOGO FARMA PNG.png" class="img-fluid" style="width: 15%;">
                        </div>
                        <h3 style="color: white;">RECUPERAR CONTRASEÑA</h3>
                        <!-- Mensaje de Alerta -->
                        <?php echo resultBlock($errors); ?>
                        <!-- Fin alerta -->
                    </div>
                    <!-- border: solid #006666 4px;border-radius: 0px 0px 20px 20px;" -->
                    <div class="card-body">
                        <form id="loginform" class="form-login" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
                            <div class="input-group mb-3">
                                <span class="input-group-text" style="background-color: #29ABE2;border: solid #29ABE2 0.5px;border-radius: 10px 0px 0px 10px;" id="basic-addon1"><i class="fas fa-envelope" style="color: white;"></i></span>
                                <input type="text" style="border: solid #29ABE2 0.5px;" name="email" class="form-control" placeholder="Correo" aria-label="Correo" aria-describedby="basic-addon1" required>
                            </div>
                            <button type="submit" class="btn" style="background-color: #E34D41;color: #ffffff;width: 100%;font-weight: bold;">Enviar</button>
                            <br>
                            <div class="botones_regresos mt-3">
                                <a href="index.php" class="old">
                                    <center>Iniciar Sesión</center>
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