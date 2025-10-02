<?php
session_start();

// Verificar sesión activa
if (!isset($_SESSION["teacher_name"])) {
    header("location:../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Panel del Profesor</title>
  <link rel="stylesheet" href="../css/style.css" />
  <style>
    a {
      text-decoration: none;
      color: black;
    }

    .button_submit {
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
      padding: 12px 20px;
      font-size: 16px;
      margin: 10px 0;
      display: inline-block;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .button_submit:hover {
      background-color: #0056b3;
    }

    #qrcode {
      margin-top: 20px;
    }
  </style>
</head>

<body>
  <main>
    <?php 
      $titulo = 'Sistema de Asistencia';
      $usuario = $_SESSION['teacher_name'];
      include "../componets/header.php"; 
    ?>

    <div id="box">
      <a href="../logout.php">Cerrar sesión</a>
    </div>

    <div class="container">
      <main>
        <button class="button_submit" id="btn1" onclick="generarQR()">Generar Código QR para Asistencia</button><br>
        <a href="show_attendance.php" class="button_submit">Ver Asistencia</a>
        <div id="qrcode"></div>
      </main>
    </div>
  </main>

  <script src="../js/qrcode.js"></script>
  <script>
    var qrGenerado = false;

    function generarQR() {
      if (qrGenerado) return; // evitar duplicados

      // Limpiar contenedor antes de generar
      document.getElementById("qrcode").innerHTML = "";

      var datosQR = {
        subject: "<?php echo $_SESSION['subject']; ?>",
        date: "<?php date_default_timezone_set('America/Bogota'); echo date('Y-m-d H:i:s'); ?>"
      };

      var qrcode = new QRCode("qrcode", JSON.stringify(datosQR));
      document.getElementById("btn1").style.display = 'none';

      qrGenerado = true;
    }

    // Función para desplegar/cerrar menú lateral
    var show = 0;
    function showBox() {
      let box = document.getElementById('box');
      if (show === 0) {
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
