<html>
<link rel="icon" type="image/png" href="../Recursos/Imagenes/LOGO PASION DEPORTIVA COMPLETO2.png" />
<!-- Headers -->
<?php
session_start();
require '../Modelo/Conexion.php';
require '../Controladores/funcs.php';

if (!isset($_SESSION["id_usuario"])) {
    header('Location: index.php');
}
$idUsuario = $_SESSION["id_usuario"];

// print_r($idUsuario);die;
// $id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$telefono = $_POST['telefono'];
$fechaNacimiento = $_POST['fechaNacimiento'];

// print_r($fechaNacimiento);die;

$sql = "UPDATE usuario SET idUsuario='$idUsuario',nombreUsuario='$nombre',apellido='$apellido',correo='$correo',usuario='$usuario', telefono='$telefono',
                            fechaNacimiento='$fechaNacimiento' where idUsuario ='$idUsuario'";
$resultado = $mysqli->query($sql);

?>
<?php if ($resultado) {
    // echo "SI";
    echo "<script>alert('Sus Datos se han Actualizado con Éxito');window.location='../perfil.php'</script>";
} else {
    // echo "NO";
    echo "<script>alert('Error al Actualizar los datos');window.location='../perfil.php'</script>";
} ?>