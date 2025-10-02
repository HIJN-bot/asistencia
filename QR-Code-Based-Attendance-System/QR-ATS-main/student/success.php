<?php
session_start();
if (!isset($_SESSION["student_name"])) {
  header("location:../index.php");
}
?>

<!DOCTYPE html>
<html lang="es"> <!-- cambiado a español -->

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Panel de Control</title> <!-- traducido -->
  <link rel="stylesheet" href="../css/style.css" />
  <style>
    a {
      text-decoration: none;
      color: black;
    }
    .msg {
      color: green;
    }
  </style>
</head>

<body>
  <main>
    <?php 
      $title = 'Sistema de Asistencia';
      $username = $_SESSION['student_name'];
      include "../componets/header.php"; 
    ?>
    <div class="container">
      <h1 class="msg">🎉 ¡Asistencia Registrada con Éxito!</h1> <!-- mensaje en español -->
      <p>Puedes regresar al panel para continuar.</p>
      <a href="dashboard.php">⬅ Volver al Panel</a>
    </div>
  </main>
  <script>
    var show = 0;
    function showBox() {
      let box = document.getElementById('box');
      if (show == 0) {
        box.style.height = "100px";
        show = 1;
      } else {
        box.style.height = "0px";
        show = 0;
      }
    }
  </script>
</body>

</html>
