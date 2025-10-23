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
      background: linear-gradient(135deg, #4b0d3a, #b91372);
      margin: 0;
      padding: 0;
      height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    .container {
      max-width: 600px;
      margin: 50px auto;
      padding: 40px;
      background: #ffffff;
      border-radius: 20px;
      box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.25);
      text-align: center;
      animation: fadeIn 0.8s ease-in-out;
    }

    .msg {
      color: #6a0dad;
      font-size: 26px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    p {
      color: #333;
      font-size: 18px;
      margin-bottom: 30px;
    }

    a.button {
      display: inline-block;
      padding: 12px 25px;
      background: #6a0dad;
      color: white;
      border-radius: 10px;
      text-decoration: none;
      font-weight: bold;
      transition: 0.3s;
      box-shadow: 0px 3px 10px rgba(106, 13, 173, 0.3);
    }

    a.button:hover {
      background: #53108e;
      box-shadow: 0px 4px 15px rgba(106, 13, 173, 0.4);
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(10px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
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
      <h1 class="msg">Asistencia registrada con éxito</h1>
      <p>Hola <strong><?php echo htmlspecialchars($username); ?></strong>, tu asistencia se ha guardado correctamente.</p>
      <a href="student_dashboard.php" class="button">Volver al Panel</a>
    </div>
  </main>
</body>

</html>

