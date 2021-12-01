<?php
include '../Modelo/Conexion.php';

if (isset($_POST['updateid'])) {

    $perfil_id = $_POST['updateid'];

    $sql = "SELECT * FROM `usuario` WHERE idUsuario=$perfil_id";
    $result = mysqli_query($mysqli, $sql);
    $response = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $response = $row;
    }
    echo json_encode($response);
} else {
    $response['status'] = 200;
    $response['message'] = "Invalid or data not found";
}
//Update Details
if (isset($_POST['hiddenperfil'])) {
    $uniqueid = $_POST['hiddenperfil'];
    $name = $_POST['updatename'];
    $ape = $_POST['updateapell'];
    $date = $_POST['updatedate'];
    $phone = $_POST['updatephone'];
    $user = $_POST['updateuser'];
    $mail = $_POST['updateemail'];
    $pass = $_POST['updatepass'];
    $sql = "UPDATE `usuario` SET nombreUsuario='$name',apellido='$ape',fechaNacimiento='$date',telefono='$phone',usuario='$user',correo='$mail',password='$pass' WHERE idUsuario=$uniqueid";

    $result = mysqli_query($mysqli, $sql);
}
