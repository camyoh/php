<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html">
    <title>Document</title>
    <style>
        .error {
            color: red;
        }
    </style>
    <?php
        $nombreErr = $apellidoErr = $correoErr = $contrasenaErr = $colorErr = $lenguajeErr = $generoErr = $correo2Err =  "";
        $nombre = $apellido = $correo = $contrasena = $color = $lenguaje = $genero = $correo2 = "";

        if (isset($_POST['Submit1'])) {
            $nombre = test_input($_POST["nombre"]);
            $apellido = test_input($_POST["apellido"]);
            $correo = test_input($_POST["correo"]);
            if (empty($_POST["nombre"])) {
                $nombreErr = "Se requiere un nombre";
            } 
            else if (empty($_POST["apellido"])) {
                $apellidoErr = "Se requiere un apellido";
            }
            else if (empty($_POST["correo"])) {
                $correoErr = "Se requiere un correo";
                
            } 
            else if (empty($_POST["contrasena"])) {
                $contrasenaErr = "Se requiere una contraseña";
            } 
            else if (empty($_POST["colorfav"])) {
                $colorErr = "Se requiere un color";
            }
            else if (empty($_POST["leng"])) {
                $lenguajeErr = "Se requiere un lenguaje";
            } 
            else if (empty($_POST["genero"])) {
                $generoErr = "Se requiere un género";
            }
            else if (!filter_var($correo, FILTER_VALIDATE_EMAIL)){
                    $correoErr = "Esto no es un correo";
                }
            else {
            $conexion = mysqli_connect('localhost', 'id3168482_camyoh', 'php_3008');
            mysqli_select_db($conexion, 'id3168482_usuarios');
            $nombre = test_input($_POST["nombre"]);
            $apellido = test_input($_POST["apellido"]);
            $correo = test_input($_POST["correo"]);
            $contrasena = test_input($_POST["contrasena"]);
            $color = test_input($_POST["colorfav"]);
            $lenguaje = test_input($_POST["leng"]);
            $genero = test_input($_POST["genero"]);
        mysqli_query($conexion,"INSERT INTO user (nombre,apellido,correo,contrasena,color,lenguaje,genero) VALUES ('$nombre','$apellido','$correo','$contrasena','$color','$lenguaje','$genero')");
        echo 'Datos insertados';
            }
        }
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>
</head>

<body>
    <form id="form1" name="form1" method="post" action="index.php">
        Nombre: <input type="text" name="nombre" value="<?php if(isset($nombre)) echo $nombre; ?>">
        <span class="error"> <?php echo $nombreErr;?></span><br> Apellido: <input type="text" name="apellido" value="<?php if(isset($nombre)) echo $apellido; ?>">
        <span class="error"> <?php echo $apellidoErr;?></span><br> Correo: <input type="text" name="correo" value="<?php if(isset($nombre)) echo $correo; ?>">
        <span class="error"> <?php echo $correoErr;?></span><br> Contraseña: <input type="password" name="contrasena" value="<?php if(isset($nombre)) echo $contrasena; ?>">
        <span class="error"> <?php echo $contrasenaErr;?></span><br> Color favorito:
        <select name="colorfav">
                <option value="" selected disabled hidden>Escoja uno</option><br>
                <option value="Amarillo"> Amarillo <br>
                <option value="Azul"> Azul <br>
                <option value="Verde"> Verde <br>
                <option value="Morado"> Morado <br>
                <option value="Rosado"> Rosado <br>
                <option value="Negro"> Negro <br> 
            </select> <span class="error"> <?php echo $colorErr;?></span><br> Lenguajes que habla:
        <select name="leng">
                <option value="" selected disabled hidden>Escoja uno</option><br>
                <option value="Inglés"> Inglés <br>
                <option value="Español"> Español <br>
                <option value="Francés"> Francés <br>
                <option value="Aleman"> Aleman <br>
            </select> <span class="error"><?php echo $lenguajeErr;?></span><br> Género:
        <input type="radio" name="genero" value="Femenino">Femenino
        <input type="radio" name="genero" value="Masculino">Masculino
        <span class="error"> <?php echo $generoErr;?></span>
        <br>
        <input name="Submit1" type="submit" value="Enviar" />

    </form>

    <form id="form2" name="form2" method="post" action="lecturadatos.php">
        <input name="Submit2" type="submit" value="Leer" />
    </form>

</body>

</html>
