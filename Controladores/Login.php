<?php

include_once '../Modelo/Conexion.php';

session_start();
$login = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE username='$login' AND clave='$password'";

//print_r($sql);die;

if ($result = mysqli_query($mysqli, $sql)) {

    if (mysqli_num_rows($result) > 0) {

        session_regenerate_id();
        $member = mysqli_fetch_assoc($result);
        $_SESSION['SESS_MEMBER_ID'] = $member['idUsuarios'];
        $_SESSION['SESS_FIRST_NAME'] = $member['nombre'];

        //$_SESSION['celular'] = $member['celular'];
        
        session_write_close();

        header("location: ../Dashboard.php");
        exit();
    } else {
        $_SESSION['SESS_MEMBER_ID'] = '';
        $_SESSION['SESS_FIRST_NAME'] = '';

        //Login failed
        header("location: ../index.php");
        exit();
    }
} else {
    die("No existe la consulta");
}

