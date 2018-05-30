<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html">
	<title>Document</title>

</head>

<body>
	<form id="form1" name="form1" method="post" action="pruebadeconexion.php">
		<input type="text" name="nombre" id="texto" />
		<input name="Submit" type="submit" value="Submit" />
	</form>

</body>

</html>

<?php
    if (isset($_POST['Submit'])) {
        $conexion = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($conexion, 'local');
        $nombre = $_POST['nombre'];
        $nombre = utf8_decode($nombre);
        mysqli_query($conexion,"INSERT INTO nombre (nombre) VALUES ('$nombre')");
        echo 'Datos insertados';
    }
?>