<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta http-equiv="Content-Type" content="text/html">
</head>
<body>
    
</body>
</html>
<?php
    $conexion = mysqli_connect('localhost', 'id3168482_camyoh', 'php_3008');
    mysqli_select_db($conexion, 'id3168482_usuarios');
    $consulta = "SELECT * FROM user";
    $datos = $conexion->query($consulta);
    while($fila=$datos->fetch_assoc()){
        echo 'Nombre: '.$fila['nombre'].' | Apellido: '.$fila['apellido'].' | Correo: '.$fila['correo'].' | Contraseña: '.$fila['contrasena'].' | Color Favorito: '.$fila['color'].' | Lenguajes: '.$fila['lenguaje'].' | Género: '.$fila['genero'].'<br>';
    }
    echo '<h3>
        <a href="index.php">Volver</a>
    </h3>';
?>
