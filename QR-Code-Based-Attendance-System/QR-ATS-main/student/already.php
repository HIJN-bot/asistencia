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
    /* ======== Estilos generales ======== */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      background: linear-gradient(135deg, #b91372, #4b0d3a);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      color: #f2f2f2;
    }

    /* ======== Encabezado “Presente” ======== */
    header {
      position: fixed;
      top: 15px;
      left: 25px;
      font-size: 1.6rem;
      font-weight: 700;
      color: #ffb6e6;
      letter-spacing: 1px;
      text-shadow: 0 0 8px rgba(255, 119, 194, 0.5);
      z-index: 10;
    }

    /* ======== Contenedor ======== */
    .container {
      width: 90%;
      max-width: 500px;
      background: rgba(30, 30, 30, 0.9);
      padding: 40px;
      border-radius: 20px;
      text-align: center;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .container:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 35px rgba(255, 119, 194, 0.25);
    }

    /* ======== Texto ======== */
    .msg {
      color: #ffb6e6;
      font-size: 1.5rem;
      margin-bottom: 15px;
      font-weight: 600;
    }

    p {
      font-size: 1rem;
      color: #ddd;
      margin-bottom: 25px;
    }

    /* ======== Botón ======== */
    a.button {
      display: inline-block;
      padding: 12px 30px;
      background: linear-gradient(135deg, #b91372, #4b0d3a);
      color: white;
      border-radius: 12px;
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    a.button:hover {
      background: linear-gradient(135deg, #4b0d3a, #b91372);
      transform: scale(1.05);
    }

    /* ======== Responsive ======== */
    @media (max-width: 480px) {
      .container {
        padding: 30px 25px;
      }
      header {
        font-size: 1.3rem;
        left: 15px;
      }
    }
  </style>
</head>

<body>
  <header>Presente</header>

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

