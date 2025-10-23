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
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      background: linear-gradient(135deg, #4b0d3a, #b91372);
      color: #eee;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      padding: 15px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: rgba(30, 30, 30, 0.8);
      backdrop-filter: blur(10px);
      color: #ffb6e6;
      font-weight: 600;
      z-index: 100;
    }

    header .left {
      font-size: 1.2rem;
      font-weight: 700;
      color: #ff77c2;
    }

    header .right a {
      text-decoration: none;
      color: #eee;
      font-weight: 500;
      transition: 0.3s;
    }

    header .right a:hover {
      color: #ff77c2;
    }

    main {
      margin-top: 120px;
      width: 90%;
      max-width: 500px;
      background: #1e1e1e;
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
      text-align: center;
    }

    h1 {
      color: #ffb6e6;
      margin-bottom: 20px;
      font-size: 1.6rem;
    }

    p {
      color: #ddd;
      margin-bottom: 25px;
    }

    #my-qr-reader {
      padding: 20px;
      border: 2px solid #ff77c2;
      border-radius: 15px;
      background: #2b2b2b;
      box-shadow: 0 0 10px rgba(255, 119, 194, 0.2);
    }

    video {
      border-radius: 10px;
    }

    button {
      background: linear-gradient(135deg, #b91372, #4b0d3a);
      color: white;
      font-size: 1rem;
      font-weight: 600;
      padding: 12px 20px;
      border: none;
      border-radius: 12px;
      cursor: pointer;
      margin-top: 20px;
      transition: all 0.3s;
    }

    button:hover {
      background: linear-gradient(135deg, #4b0d3a, #b91372);
      transform: scale(1.03);
    }

    @media (max-width: 480px) {
      main {
        padding: 30px 20px;
      }

      h1 {
        font-size: 1.4rem;
      }
    }
  </style>
</head>

<body>
  <header>
    <div class="left">Presente</div>
    <div class="right"><a href="../logout.php">Cerrar sesión</a></div>
  </header>

  <main>
    <?php 
      $title = 'Sistema de Asistencia';
      $username = $_SESSION['student_name'];
      include "../componets/header.php"; 
    ?>

    <h1>Escanear Código QR</h1>
    <p>Bienvenido, <?php echo htmlspecialchars($username); ?>. Escanea el código QR para registrar tu asistencia.</p>
    <div id="my-qr-reader"></div>
  </main>

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
          alert("Código QR inválido");
        }
      }

      let htmlscanner = new Html5QrcodeScanner("my-qr-reader", { fps: 10, qrbox: 250 });
      htmlscanner.render(onScanSuccess);
    });
  </script>
</body>
</html>

