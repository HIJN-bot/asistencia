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
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #4b0d3a, #b91372);
      color: #fff;
      margin: 0;
      padding: 0;
      min-height: 100vh;
    }

    header {
      background-color: rgba(0, 0, 0, 0.3);
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 15px 40px;
      backdrop-filter: blur(10px);
    }

    header h1 {
      color: #ffb6e6;
      font-weight: 600;
      font-size: 22px;
      margin: 0;
    }

    .container {
      background-color: rgba(255, 255, 255, 0.12);
      border-radius: 16px;
      backdrop-filter: blur(8px);
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
      width: 90%;
      max-width: 900px;
      margin: 60px auto;
      padding: 30px 40px;
      text-align: center;
    }

    a {
      text-decoration: none;
      color: #fff;
    }

    .button_submit {
      background: linear-gradient(90deg, #6a0dad, #b91372);
      color: #fff;
      border: none;
      border-radius: 8px;
      padding: 12px 22px;
      font-size: 16px;
      margin: 12px 10px;
      cursor: pointer;
      transition: 0.3s ease;
    }

    .button_submit:hover {
      opacity: 0.9;
      transform: scale(1.03);
    }

    #qrcode {
      margin-top: 25px;
      padding: 15px;
      background-color: rgba(255, 255, 255, 0.1);
      display: inline-block;
      border-radius: 10px;
    }

    #box {
      position: absolute;
      top: 70px;
      right: 40px;
      overflow: hidden;
      height: 0;
      transition: height 0.3s ease;
      background-color: rgba(0, 0, 0, 0.4);
      border-radius: 8px;
      backdrop-filter: blur(10px);
      padding: 0 10px;
    }

    #box a {
      display: block;
      padding: 10px;
      text-align: center;
      color: #fff;
    }

    #box a:hover {
      background-color: rgba(255, 255, 255, 0.15);
      border-radius: 6px;
    }
  </style>
</head>

<body>
  <header>
    <h1>Presente</h1>
    <div>
      <button onclick="showBox()" class="button_submit" style="padding: 8px 16px; font-size: 14px;">☰ Menú</button>
    </div>
  </header>

  <div id="box">
    <a href="../logout.php">Cerrar sesión</a>
  </div>

  <div class="container">
    <h2>Panel del Profesor</h2>
    <p>Desde aquí puedes generar el código QR para registrar la asistencia o revisar el historial.</p>
    <button class="button_submit" id="btn1" onclick="generarQR()">Generar Código QR</button><br>
    <a href="show_attendance.php" class="button_submit">Ver Asistencia</a>
    <div id="qrcode"></div>
  </div>

  <script src="../js/qrcode.js"></script>
  <script>
    var qrGenerado = false;

    function generarQR() {
      if (qrGenerado) return; // evitar duplicados
      document.getElementById("qrcode").innerHTML = "";

      var datosQR = {
        subject: "<?php echo $_SESSION['subject']; ?>",
        date: "<?php date_default_timezone_set('America/Bogota'); echo date('Y-m-d H:i:s'); ?>"
      };

      var qrcode = new QRCode("qrcode", JSON.stringify(datosQR));
      document.getElementById("btn1").style.display = 'none';
      qrGenerado = true;
    }

    var show = 0;
    function showBox() {
      let box = document.getElementById('box');
      if (show === 0) {
        box.style.height = "60px";
        show = 1;
      } else {
        box.style.height = "0px";
        show = 0;
      }
    }
  </script>
</body>
</html>

