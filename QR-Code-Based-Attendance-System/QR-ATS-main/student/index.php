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
  <title>Escanear Código QR</title>
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
      overflow-x: hidden;
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

    /* ======== Contenedor principal ======== */
    .container {
      width: 90%;
      max-width: 500px;
      background: rgba(30, 30, 30, 0.9);
      padding: 40px 30px;
      border-radius: 20px;
      text-align: center;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .container:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 35px rgba(255, 119, 194, 0.25);
    }

    h1 {
      color: #ffb6e6;
      font-size: 1.6rem;
      margin-bottom: 10px;
    }

    p {
      color: #ddd;
      font-size: 1rem;
      margin-bottom: 25px;
    }

    /* ======== Lector QR ======== */
    #my-qr-reader {
      padding: 20px !important;
      border: 2px solid #ff77c2 !important;
      border-radius: 12px;
      background: rgba(75, 13, 58, 0.4);
      backdrop-filter: blur(4px);
    }

    video {
      width: 100% !important;
      border-radius: 12px;
      margin: auto;
    }

    /* ======== Botón ======== */
    button {
      padding: 12px 30px;
      border: none;
      border-radius: 12px;
      background: linear-gradient(135deg, #b91372, #4b0d3a);
      color: white;
      font-weight: 600;
      font-size: 1rem;
      cursor: pointer;
      transition: all 0.3s ease;
      margin-top: 20px;
    }

    button:hover {
      background: linear-gradient(135deg, #4b0d3a, #b91372);
      transform: scale(1.05);
    }

    /* ======== Responsivo ======== */
    @media (max-width: 480px) {
      .container {
        padding: 30px 20px;
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
      <h1>Bienvenido, <?php echo htmlspecialchars($username); ?> 👋</h1>
      <p>Escanea el código QR para registrar tu asistencia.</p>
      <div id="my-qr-reader"></div>
    </div>
  </main>

  <!-- Librería de escaneo QR -->
  <script src="https://unpkg.com/html5-qrcode"></script>
  <script>
    function domReady(fn) {
      if (document.readyState === "complete" || document.readyState === "interactive") {
        setTimeout(fn, 1000);
      } else {
        document.addEventListener("DOMContentLoaded", fn);
      }
    }

    domReady(function () {
      function onScanSuccess(decodeText, decodeResult) {
        try {
          let qr_info = JSON.parse(decodeText);

          let current_date = new Date();
          let qr_date = new Date(qr_info.date);

          let diff_minutes = (current_date.getTime() - qr_date.getTime()) / (1000 * 60);

          if (diff_minutes < 5) {
            window.location.href = "scan_qr.php?s_id=<?php echo $_SESSION['id'];?>&s_name=<?php echo urlencode($_SESSION['student_name']);?>&rollno=<?php echo $_SESSION['rollno'];?>&section=<?php echo $_SESSION['section'];?>&subject=" + encodeURIComponent(qr_info.subject) + "&date=" + encodeURIComponent(qr_info.date);
          } else {
            window.location.href = "expired.php";
          }
        } catch (e) {
          alert("QR inválido");
        }
      }

      let htmlscanner = new Html5QrcodeScanner("my-qr-reader", { fps: 10, qrbox: 250 });
      htmlscanner.render(onScanSuccess);
    });
  </script>
</body>
</html>
