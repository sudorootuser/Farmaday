<?php
$idUsuario = $_SESSION["id_usuario"];
?>
<link rel="icon" type="image/png" href="Recursos/Imagenes/farma.png" />
<nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #006666 !important;font-family: 'Josefin Sans Bold' !important;">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <h1 class="text-warning"><img src="Recursos/Imagenes/LOGO FARMA PNG.png" style="width: 250px;"></h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- <div>Bienvenido</div> -->
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto" style="font-family: Roboto Medium;">

                <li class="nav-item" id="log">
                    <a class="nav-link text-white" style="padding: 32px;font-family: 'Josefin Sans Bold' !important;" href="./Dashboard.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" style="padding: 32px;font-family: 'Josefin Sans Bold' !important;" href="./vender.php">Vender</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" style="padding: 32px;font-family: 'Josefin Sans Bold' !important;" href="./ventas.php">Ventas Realizadas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" style="padding: 32px;font-family: 'Josefin Sans Bold' !important;" href="./consentimiento.php">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" style="padding: 32px;font-family: 'Josefin Sans Bold' !important;" href="Iva.php">Producto X Iva</a>
                </li>
            </ul>

            <div class="dropdown">
                <a class=" btn btn-light nav-link   dropdown-toggle" style="color:#006666;" data-bs-toggle="dropdown" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Ajustes
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="#" style="color:#006666;">Usuario: <br><?php echo $rowUser['nombreUsuario']; ?></a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li> <a class="dropdown-item" href="./perfil.php" style="color:#006666;">Mi Perfil</a></li>
                    <!-- <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#updatePerfil" onclick="GetPerfil(<?php echo $idUsuario; ?>)">Mi perfil</a></li> -->
                    <li> <a class="dropdown-item" href="Controladores/Salir.php" style="color:#006666;">Salir</a></li>
                </ul>
            </div>
        </div>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </div>
</nav>