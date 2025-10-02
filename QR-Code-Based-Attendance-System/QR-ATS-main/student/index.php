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
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f6f9;
    }

    .container {
      max-width: 600px;
      margin: 50px auto;
      padding: 30px;
      background: white;
      border-radius: 10px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
      text-align: center;
    }

    #my-qr-reader {
      padding: 20px !important;
      border: 1.5px solid #b2b2b2 !important;
      border-radius: 8px;
    }

    button {
      padding: 10px 20px;
      border: none;
      border-radius: 0.25em;
      color: white;
      font-size: 15px;
      cursor: pointer;
      margin-top: 15px;
      background-color: #1976d2;
      transition: 0.3s;
    }

    button:hover {
      background-color: #0d47a1;
    }

    video {
      width: 300px !important;
      border-radius: 8px;
      margin: auto;
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
