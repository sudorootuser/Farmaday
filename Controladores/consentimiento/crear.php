<?php
# Validar que la información traiga datos
if (isset($_POST['addConsent'])) {

    # Si todo sale bien procedemos a hacer la insercion de datos 

    include_once '../../Modelo/base_de_datos.php';
    $no = $_POST['nombre'];
    $ca = $_POST['cargo'];
    $np = $_POST['nomPaciente'];
    $fp = $_POST['firmPaciente'];
    $td = $_POST['tpDocument'];
    $ce = $_POST['cedula'];
    $na = $_POST['nombreAcargo'];
    $fc = $_POST['firmaCargo'];
    $nm = $_POST['nombreMed'];

    // Fin información enviada por el formulario

    #Insertar información a la tabla
    $sql = "INSERT INTO dcConsentimiento (nombre,cargo,nomPaciente,firmPaciente,tpDocument,cedula,nombreAcargo,firmaCargo,nombreMed)VALUES(:no,:ca,:np,:fp,:td,:ce,:na,:fc,:nm)";

    # Se prepara la consulta
    $sql = $base_de_datos->prepare($sql);

    #Se validan los campos y se les agrega el valor de la variable

    $sql->bindParam(':no', $no, PDO::PARAM_STR, 25);
    $sql->bindParam(':ca', $ca, PDO::PARAM_STR, 25);
    $sql->bindParam(':np', $np, PDO::PARAM_STR, 25);
    $sql->bindParam(':fp', $fp, PDO::PARAM_STR, 25);
    $sql->bindParam(':td', $td, PDO::PARAM_STR, 25);
    $sql->bindParam(':ce', $ce, PDO::PARAM_INT, 25);
    $sql->bindParam(':na', $na, PDO::PARAM_STR, 25);
    $sql->bindParam(':fc', $fc, PDO::PARAM_STR, 25);
    $sql->bindParam(':nm', $nm, PDO::PARAM_STR, 25);

    #Se executa los valores asignados a los macadores a travez de las variables
    $sql->execute();

    # Validamos que se inserto los tados
    $lastInsertId = $base_de_datos->lastInsertId();

    #Lo condicionamos
    if ($lastInsertId > 0) {
        // echo "<script>alert('Se ha guardado el Formulario de Consentimiento');</script>";
        // echo "<script>window.location.href='../../consentimiento.php'</script>";
    } else {
        echo "error";
        // echo "<script>alert('Algo anda mal, Contacte al Administrador del sistema.');</script>";
        // echo "<script>window.location.href='../../consentimiento.php'</script>";
    }
}
