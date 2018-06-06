<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html">
    <title>Las Acacias Restaurante</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($user)): ?>
      <br> Bienvenido. <?= $user['email']; ?>
      <br>Ha ingresado a modificar los platos del menú.
      <br>No olvide cerrar sesión al finalizar.<br>
      <a href="logout.php">Cerrar Sesión</a><br>

    <?php
      $conexion = mysqli_connect('localhost', 'root', '');
      mysqli_select_db($conexion, 'test');
      $consulta = "SELECT * FROM deldia";
      $datos = $conexion->query($consulta);
      echo 'Estos son los platos que en el momento están en la base de datos:<br>';
      while($fila=$datos->fetch_assoc()){
        echo 'ID del plato: '.$fila['id'].'<br>Nombre: '.$fila['nombre'].'<br>Descripción: '.$fila['descripcion'].'<br>Precio: '.$fila['precio'].'<br><br>';
      }
    ?>
      <form action="" method="post">
      Nombre: <input type="text" name="nombrePlato">
      Descripción: <input type="text" name="descripcionPlato">
      Precio: <input type="number" name="precioPlato">
      <input type="submit" name="agregarPlato" value="Agregar Plato al menú">
      </form>
      
    <?php
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
        header('Location: /php/Modificar, insertar, leer datos');
      }
    ?>
      <p>Formulario para modificar un plato del menú</p>
      <form action="" method="post">
      Id: <input type="number" name="idModificar" required>
      Nombre: <input type="text" name="nombreModificar">
      Descripción: <input type="text" name="descripcionModificar">
      Precio: <input type="number" name="precioModificar">
      Nombre de la imagen: <input type="text" name="nombreImagenModificar">
      <input type="submit" name="modificarPlato" value="Modificar Plato">
      </form>
    <?php
      if (isset($_POST['modificarPlato'])) {
        $idModificar = test_input($_POST["idModificar"]);
        $nombreModificar = test_input($_POST["nombreModificar"]);
        $descripcionModificar = test_input($_POST["descripcionModificar"]);
        $precioModificar = test_input($_POST["precioModificar"]);
        $nombreImagenModificar = test_input($_POST["nombreImagenModificar"]);
        mysqli_query($conexion,"UPDATE deldia SET nombre='$nombreModificar',descripcion='$descripcionModificar',precio='$precioModificar',nombreimagen='$nombreImagenModificar' WHERE id=$idModificar");
        header('Location: /php/Modificar, insertar, leer datos');
      }
    ?>

    <?php else: ?>
      <h2>Esta sección es del administrador del restaurante</h2>

      <a href="login.php">Iniciar Sesión</a>
      <!-- <a href="signup.php">SignUp</a> -->
    <?php endif; ?>
  </body>
</html>
