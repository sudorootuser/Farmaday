<html id="prueba">
<!-- <link rel="icon" type="image/png" href="Recursos/Imagenes/LOGO PASION DEPORTIVA COMPLETO2.png"/> -->
<?php
//  <!-- Headers -->
include_once './Vista/HeadersDashboard.php';

require './Modelo/Conexion.php';
require './Controladores/funcs.php';

if (!isset($_SESSION["id_usuario"])) {
    header('Location:index.php');
}
include './Controladores/Cont_Perfil_User.php';
include './Vista/MenuNav.php';
require './Modelo/Conexion.php';
require './Modelo/Conexion2.php';


// Cosulta datos
include_once "Modelo/base_de_datos.php";

$conn = mysqli_connect('localhost', 'root', '');
if (!$conn) {
    die("Connection failed" . mysqli_connect_error());
} else {
    mysqli_select_db($conn, 'farmaday');
}
// Import the file where we defined the connection to Database.     
// require_once "connection.php";

$per_page_record = 4;  // Number of entries to show in a page.   
// Look for a GET variable page if not found default is 1.        
if (isset($_GET["page"])) {
    $page  = $_GET["page"];
} else {
    $page = 1;
}

$start_from = ($page - 1) * $per_page_record;

$query = "SELECT * FROM productos LIMIT $start_from, $per_page_record ";
$rs_result = mysqli_query($conn, $query);
?>

<body style="background-color: #fff;overflow: auto !important;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm">
                <br>
            </div>
        </div>
        <div class="row">
            <?php include './Vista/MenuLateral.php'; ?>
            <div class="col-sm-8">
                <div class="container-fluid">
                    <div class="col-sm-12 col-xs-12">
                        <h4 style="background-color: #006666; color:#ffffff; padding:13px; text-align:center;">PRODUCTOS</h4>
                        <form class="d-flex" name="form1" method="post">
                            <input class="form-control me-2" name="PalabraClave" type="search" placeholder="Search..." aria-label="Search">
                            <input name="buscar" type="hidden" class="form-control mb-2" id="inlineFormInput" value="v">
                            <button class="btn btn-outline" style="color:white; background-color:#006666;" type="submit">Buscar</button>
                        </form>
                        <!-- BUSQUEDA -->
                        <div class="data-table" style="overflow: auto; width: 100%;">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Código</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Precio de compra</th>
                                        <th scope="col">Precio de venta</th>
                                        <th scope="col">Existencia</th>
                                        <th scope="col">Editar</th>
                                        <th scope="col">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($_POST)) {
                                        $aKeyword = explode(" ", $_POST['PalabraClave']);
                                        $query = "SELECT * FROM productos WHERE codigo like '%" . $aKeyword[0] . "%' OR codigo like '%" . $aKeyword[0] . "%' OR codigo like '%" . $aKeyword[0] . "%'OR codigo like '%" . $aKeyword[0] . "%'";

                                        for ($i = 1; $i < count($aKeyword); $i++) {
                                            if (!empty($aKeyword[$i])) {
                                                $query .= " OR codigo like '%" . $aKeyword[$i] . "%'";
                                            }
                                        }
                                        $result = $conn->query($query);
                                        echo "<br>Has buscado la palabra clave:<b> " . $_POST['PalabraClave'] . "</b>";
                                        if (mysqli_num_rows($result) > 0) {
                                            $row_count = 0;
                                            while ($row = $result->fetch_assoc()) {
                                                $row_count = $row_count++;
                                    ?>
                                                <tr>
                                                    <td><?php echo $row['codigo']; ?></td>
                                                    <td><?php echo $row['descripcion']; ?></td>
                                                    <td><?php echo $row['precioCompra']; ?></td>
                                                    <td><?php echo $row['precioVenta']; ?></td>
                                                    <td><?php echo $row['existencia']; ?></td>
                                                    <td><a class="btn btn" style="Background-color:#006666;color:#ffffff;" href="Editar.php?id=<?php echo $row['id']; ?>"><i class="fa fa-edit"></i></a></td>
                                                    <td><a class="btn btn-danger" href="Controladores/producto/eliminar.php?id=<?php echo $row['id']; ?>"><i class="fa fa-trash"></i></a></td>
                                                </tr>
                                            <?php }
                                        } else {
                                            echo "<br>Resultados encontrados: Ninguno";
                                        }
                                    } else {
                                        if ($query !== false) {
                                            while ($row = $rs_result->fetch_assoc()) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $row['codigo']; ?></td>
                                                    <td><?php echo $row['descripcion']; ?></td>
                                                    <td><?php echo $row['precioCompra']; ?></td>
                                                    <td><?php echo $row['precioVenta']; ?></td>
                                                    <td><?php echo $row['existencia']; ?></td>
                                                    <td><a class="btn btn" style="Background-color:#006666;color:#ffffff;" href="Editar.php?id=<?php echo $row['id']; ?>"><i class="fa fa-edit"></i></a></td>
                                                    <td><a class="btn btn-danger" href="Controladores/producto/eliminar.php?id=<?php echo $row['id']; ?>"><i class="fa fa-trash"></i></a></td>
                                                </tr>
                                    <?php }
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <nav aria-label="Page navigation example" style="left: 30%;">
                            <div class="pagination" style="overflow: auto; width: 100%;
                        height: 100px;">
                                <?php

                                $query = "SELECT COUNT(*) FROM productos";
                                $rs_result = mysqli_query($conn, $query);
                                $row = mysqli_fetch_row($rs_result);
                                $total_records = $row[0];

                                echo "</br>";
                                // Number of pages required.
                                $total_pages = ceil($total_records / $per_page_record);
                                $pagLink = "";

                                if ($page >= 2) {
                                    echo "<li class='page-item'><a class='page-link' style='color:white; background-color:#006666;' href='Dashboard.php?page=" . ($page - 1) . "'> Anterior </a></li>";
                                }

                                for ($i = 1; $i <= $total_pages; $i++) {
                                    if ($i == $page) {
                                        $pagLink .= "<li class='page-item'><a style='color:white; background-color:#006666;' class = 'page-link active' href='Dashboard.php?page=" . $i . "'>" . $i . " </a></li>";
                                    } else {
                                        $pagLink .= "<li class='page-item'><a style='color:white; background-color:#006666;' class='page-link'href='Dashboard.php?page=" . $i . "'>   
                                                " . $i . " </a></li>";
                                    }
                                };
                                echo $pagLink;
                                if ($page < $total_pages) {
                                    echo "<li class='page-item'><a  class='page-link' href='Dashboard.php?page=" . ($page + 1) . "'>  Siguiente </a></li>";
                                } ?>
                            </div>
                        </nav>
                        <div class="inline">
                            <input id="page" type="number" min="1" max="<?php echo $total_pages ?>" placeholder="<?php echo $page . "/" . $total_pages; ?>" required>
                            <button class="btn btn" style="color:white; background-color:#006666;" onClick="go2Page();">Go</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include 'Vista/Footer_Princ.php'; ?>
    <!-- Footer Principal -->
    <script>
        function go2Page() {
            var page = document.getElementById("page").value;
            page = ((page > <?php echo $total_pages; ?>) ? <?php echo $total_pages; ?> : ((page < 1) ? 1 : page));
            window.location.href = 'Dashboard.php?page=' + page;
        }
    </script>
</body>

</html>