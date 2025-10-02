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
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      background: #fff;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    th, td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: center;
    }

    th {
      background: #007bff;
      color: white;
    }

    tr:nth-child(even) {
      background: #f9f9f9;
    }

    a {
      text-decoration: none;
      color: #007bff;
      font-weight: bold;
    }
    a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <?php 
    $title = 'Sistema de Asistencia';
    $username = $_SESSION['teacher_name'];
    include "../componets/header.php"; 
  ?>

  <div id="box">
    <a href="../logout.php">Cerrar Sesión</a>
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
