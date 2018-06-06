<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<?php
    $conexion = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($conexion, 'restaurante');
    $consulta = "SELECT * FROM deldia";
    $datos = $conexion->query($consulta);
    while($fila=$datos->fetch_assoc()){
        if ($fila['id']==date("w",time()-18000)){
            $textoimagen = $fila['nombreimagen'].'<br>';
        }
    }
    function dia($dia){
        $dias = array("domingo","lunes","martes","mi&eacute;rcoles","jueves","viernes","s&aacute;bado");
        return $dias[$dia];
    }
?>
<style>
    .foto{
        width: 300px;
        height: 300px;
        background: blue;
    }
    .foto img{
        width: 100%;
    }
</style>
<body>
    <div class="caja">
        <div class="foto" >
            <img src="<?php echo strip_tags($textoimagen) ?>" alt="">
        </div>
        <div class="dia">
            <p>Hoy es <?php echo dia(date("w",time()-18000))?> de </p>
        </div>
    </div>
</body>
</html>