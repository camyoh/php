<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <style>
        .nombrePlato, .parrafoPlato{padding: 0; margin: 0; display:inline-block;}
        .menuPhp{display: block; width:100%; margin: auto;}
        .plato{display: block; text-align: left; width:100%; margin: 10px auto;}
    </style>
    <?php
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $conexion = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($conexion, 'test');
        $consulta = "SELECT * FROM menu";
        $datos = $conexion->query($consulta);
        ?>
        <div class="menuPhp">
            <?php
            while($fila=$datos->fetch_assoc()){
            ?>
            <div class="plato">
                <h3 class="nombrePlato"><?php echo $fila['nombre'].' $'.$fila['precio']?></h3><br>
                <p class="parrafoPlato"><?php echo $fila['descripcion']?></p>   
            </div>
            <?php
            }?>
        </div>
</body>
</html>
