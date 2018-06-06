<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /login2');
  }
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /login2");
    } else {
      $message = 'Alguno de los datos no coincide. Por favor verifíquelos';
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Iniciar Sesión</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <meta http-equiv="Content-Type" content="text/html">
  </head>
  <body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Iniciar Sesión</h1>
    
    <form action="login.php" method="POST">
      <input name="email" type="text" placeholder="usuario:">
      <input name="password" type="password" placeholder="contraseña:">
      <input type="submit" value="Enviar">
    </form>
  </body>
</html>
