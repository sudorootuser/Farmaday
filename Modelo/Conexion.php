<?php
$mysqli = new mysqli("localhost", "root", "", "farmaday");
if (mysqli_connect_errno()) {
    die('Conexion Fallida ' . mysqli_connect_errno());
}
