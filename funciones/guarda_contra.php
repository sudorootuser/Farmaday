<html>
<link rel="icon" type="image/png" href="../Recursos/Imagenes/LOGO PASION DEPORTIVA COMPLETO2.png" />
<!-- Headers -->
<?php
session_start();
require '../Modelo/Conexion.php';
require '../Controladores/funcs.php';

if (!isset($_SESSION["id_usuario"])) {
    // header('Location:index.php');
}
$idUsuario = $_SESSION["id_usuario"];

// print_r($idUsuario);die;
$user_id = $mysqli->real_escape_string($_POST['user_id']);

$password_old = $mysqli->real_escape_string($_POST['password_old']);
$password = $mysqli->real_escape_string($_POST['password']);
$con_password = $mysqli->real_escape_string($_POST['con_password']);
$stmt = $mysqli->prepare("SELECT password FROM usuario WHERE idUsuario = $user_id  LIMIT 1");
$stmt->execute();
$stmt->store_result();
$rows = $stmt->num_rows;

// print_r($user_id);die;

if ($rows > 0) {
    $stmt->bind_result($passwd);
    $stmt->fetch();

    $validaPassw = password_verify($password_old, $passwd);
    if ($validaPassw) {
        if (validaPassword($password, $con_password)) {
            $pass_hash = hashPassword($password);
            if (cambiarPassword($pass_hash, $user_id)) {
                // echo "SI";
                echo "<script>alert('Su contraseña ha sido modificada');window.location='../cambiar_Pass_User.php'</script>";
            } else {
                // echo "NO1";
                echo "<script>alert('Error al modificar password');window.location='../cambiar_Pass_User.php'</script>";
            }
        } else {
            // echo "NO2";
            echo "<script>alert('Las contraseñas no coinciden');window.location='../cambiar_Pass_User.php'</script>";
        }
    } else {
        // echo "NO3";
        echo "<script>alert('Contraseña actual incorrrecta');window.location='../cambiar_Pass_User.php'</script>";
    }
}
?>