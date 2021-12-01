<html>
<!-- <link rel="icon" type="image/png" href="Recursos/Imagenes/LOGO PASION DEPORTIVA COMPLETO2.png" /> -->
<!-- Headers -->
<?php
include_once './Vista/Headers.php';

require 'Modelo/Conexion.php';
require 'Controladores/funcs.php';

$errors = array();
if (!empty($_POST)) {
    $usuario = $mysqli->real_escape_string($_POST['usuario']);
    $password = $mysqli->real_escape_string($_POST['password']);

    if (isNulllogin($usuario, $password)) {
        $errors[] = "Debe diligenciar los campos";
    }

    $errors[] = login($usuario, $password);
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
                <div class="card" style="margin-top: 70px;">
                    <div class="card-header" style="background-color: #29ABE2;">
                        <div class="card-title">
                            <img src="Recursos/Imagenes/LOGO FARMA PNG.png" class="img-fluid" style="width: 15%;">
                        </div>
                        <h3 style="color: white;">INICIAR SESIÓN</h3>
                        <!-- Mensaje de Alerta -->
                        <?php echo resultBlock($errors); ?>
                        <!-- Fin alerta -->
                    </div>
                    <div class="card-body">
                        <form id="loginform" class="form-login" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
                            <div class="mb-3 text-left">
                                <label for="exampleInputEmail1" class="form-label">Usuario</label>
                                <input type="text" name="usuario" class="form-control" placeholder="Ingrese Usuario o Correo..." aria-label="Username" aria-describedby="basic-addon1" required>
                            </div>
                            <div class="mb-3 text-left">
                                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                                <input type="password" name="password" class="form-control" placeholder="Contraseña..." aria-label="password" aria-describedby="basic-addon1">
                            </div>
                            <button type="submit" class="btn" style="background-color: #E34D41;color: white;width: 100%;">Ingresar</button>
                            <br>
                            <div class="botones_regresos mt-3">
                                <a href="recupera.php" class="old text-center">
                                    ¿Olvidaste tu contraseña?
                                </a>
                            </div>
                            <div class="botones_regreso">
                                <a href="registro.php" class="form-an-account text-center">
                                    ¿No tienes una cuenta?,¡Registrate!
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