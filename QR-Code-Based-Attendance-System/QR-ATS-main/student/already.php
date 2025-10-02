<?php
session_start();
if (!isset($_SESSION["student_name"])) {
  header("location:../index.php");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Panel de Control</title>
  <link rel="stylesheet" href="../css/style.css" />
  <style>
    a {
      text-decoration: none;
      color: black;
    }
    .msg{
      color: red;
    }
  </style>
</head>

<body>
  <main>
    <?php 
    $title = 'Sistema de Asistencia';
    $username = $_SESSION['student_name'];
    include "../componets/header.php" 
    ?>
    <div class="container">
      <h1 class="msg">¡Asistencia ya registrada! 🤦‍♂️</h1>
    </div>
  </main>
  <script>
    var show = 0;
    function showBox() {
      box = document.getElementById('box');
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
