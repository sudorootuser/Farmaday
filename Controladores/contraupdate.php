<?php
include '../Modelo/Conexion.php';
include 'funcs.php';

extract($_POST);

$user_id = $mysqli->real_escape_string($_POST['idSend']);
$password_old = $mysqli->real_escape_string($_POST['oldSend']);
$password = $mysqli->real_escape_string($_POST['newSend']);
$con_password = $mysqli->real_escape_string($_POST['new2Send']);
$stmt = $mysqli->prepare("SELECT password FROM usuario WHERE idUsuario = $user_id  LIMIT 1");
$stmt->execute();
$stmt->store_result();
$rows = $stmt->num_rows;
if ($rows > 0) {
    $stmt->bind_result($passwd);
    $stmt->fetch();

    $validaPassw = password_verify($password_old, $passwd);
    echo json_encode($validaPassw);

    if ($validaPassw) {
        if (validaPassword($password, $con_password)) {
            $pass_hash = hashPassword($password);
            if (cambiarPassword($pass_hash, $user_id)) {
                echo "<script>alert('Su contraseña ha sido modificada');window.location='index.php'</script>";
            } else {
                echo "<script>alert('Error al modificar password');window.location='index.php?id=$user_id'</script>";
            }
        } else {
            echo "<script>alert('Las contraseñas no coinciden');window.location='index.php?id=$user_id'</script>";
        }
    } else {
        echo "<script>alert('Contraseña actual incorrrecta');window.location='index.php?id=$user_id'</script>";
    }
}
?>
?>