<?php
session_start();
if (!isset($_SESSION["student_name"])) {
  header("location:../index.php");
  exit();
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
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f6f9;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 600px;
      margin: 100px auto;
      padding: 30px;
      background: white;
      border-radius: 15px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
      text-align: center;
    }

    .msg {
      color: #d32f2f;
      font-size: 22px;
      margin-bottom: 20px;
    }

    a.button {
      display: inline-block;
      padding: 12px 25px;
      background: #1976d2;
      color: white;
      border-radius: 8px;
      text-decoration: none;
      font-weight: bold;
      transition: 0.3s;
    }

    a.button:hover {
      background: #0d47a1;
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
      <h1 class="msg">⚠️ ¡Asistencia ya registrada!</h1>
      <p>Hola <strong><?php echo htmlspecialchars($username); ?></strong>, ya registraste tu asistencia para hoy.</p>
      <a href="student_dashboard.php" class="button">Volver al Panel</a>
    </div>
  </main>
</body>

</html>
