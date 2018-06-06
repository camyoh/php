<?php
    $conexion = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($conexion, 'test');
    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }
    if (isset($_POST['agregarPlato'])) {
    $nombrePlato = test_input($_POST["nombrePlato"]);
    $descripcionPlato = test_input($_POST["descripcionPlato"]);
    $precioPlato = test_input($_POST["precioPlato"]);
    mysqli_query($conexion,"INSERT INTO menu (nombre,descripcion,precio) VALUES ('$nombrePlato','$descripcionPlato','$precioPlato')");
    echo 'Plato agregado al menú'.'<h3><a href="login.php">Volver</a></h3>';
    }
?>