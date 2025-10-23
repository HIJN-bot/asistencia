<?php
session_start();

// Verificar sesión del profesor
if (!isset($_SESSION["teacher_name"])) {
  header("location:../index.php");
  exit();
}

// Conexión a BD
$con = mysqli_connect("localhost", "root", "", "qr_ats");

// Materia del profesor
$subject = $_SESSION['subject'];

// Consulta: total de asistencias por estudiante
$query = "
  SELECT rollno, s_name, section, subject, COUNT(*) AS total
  FROM attendance 
  WHERE subject='$subject' 
  GROUP BY rollno, s_name, section, subject
";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Asistencias - <?php echo $_SESSION['subject']; ?></title>
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
      max-width: 1000px;
      margin: 60px auto;
      padding: 30px 40px;
      text-align: center;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 25px;
      background: rgba(255, 255, 255, 0.15);
      color: #fff;
      border-radius: 12px;
      overflow: hidden;
    }

    th, td {
      border: 1px solid rgba(255, 255, 255, 0.2);
      padding: 12px;
      text-align: center;
    }

    th {
      background: #6a0dad;
      color: #fff;
    }

    tr:nth-child(even) {
      background: rgba(255, 255, 255, 0.08);
    }

    a {
      text-decoration: none;
      color: #ffb6e6;
      font-weight: 600;
    }

    a:hover {
      color: #ffffff;
      text-decoration: underline;
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

    .menu-btn {
      background: linear-gradient(90deg, #6a0dad, #b91372);
      border: none;
      border-radius: 8px;
      color: white;
      padding: 8px 16px;
      cursor: pointer;
      font-size: 14px;
      transition: 0.3s ease;
    }

    .menu-btn:hover {
      opacity: 0.9;
      transform: scale(1.05);
    }
  </style>
</head>

<body>
  <header>
    <h1>Presente</h1>
    <div>
      <button onclick="showBox()" class="menu-btn">☰ Menú</button>
    </div>
  </header>

  <div id="box">
    <a href="../logout.php">Cerrar sesión</a>
  </div>

  <div class="container">
    <h2>Resumen de Asistencias - <?php echo $subject; ?></h2>
    <table>
      <tr>
        <th>No. Lista</th>
        <th>Nombre</th>
        <th>Sección</th>
        <th>Número de Clases Asistidas</th>
        <th>Materia</th>
        <th>Detalles</th>
      </tr>
      <?php
        while($row = mysqli_fetch_assoc($result)){
          echo "<tr>
                  <td>".$row["rollno"]."</td>
                  <td>".$row["s_name"]."</td>
                  <td>".$row["section"]."</td>
                  <td>".$row["total"]."</td>
                  <td>".$row["subject"]."</td>
                  <td><a href='details.php?sub=".$row["subject"]."&roll=".$row["rollno"]."'>Ver Detalles</a></td>
                </tr>";
        }
      ?>
    </table>
  </div>

  <script>
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
