<?php
session_start();

// Si no hay sesión activa, redirigir al login
if (!isset($_SESSION["teacher_name"])) {
    header("Location: ../index.php");
    exit();
}

// Conexión a la base de datos
$con = mysqli_connect("localhost", "root", "", "qr_ats");

// Validación de conexión
if (!$con) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

// Sanitizar datos de entrada
$subject = mysqli_real_escape_string($con, $_GET['sub']);
$rollno  = mysqli_real_escape_string($con, $_GET['roll']);

// Consulta de asistencia
$query = "SELECT * FROM attendance WHERE subject='$subject' AND rollno='$rollno'";
$result = mysqli_query($con, $query);

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Panel de Asistencia</title>
  <link rel="stylesheet" href="../css/style.css" />
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
      margin-top: 20px;
    }
    th, td {
      border: 1px solid #444;
      padding: 8px;
      text-align: center;
    }
    th {
      background-color: #007bff;
      color: white;
    }
    .logout {
      margin: 15px 0;
    }
  </style>
</head>

<body>
  <?php 
    $titulo = 'Sistema de Asistencia';
    $usuario = $_SESSION['teacher_name'];
    include "../componets/header.php"; 
  ?>

  <div class="logout">
    <a href="../logout.php">Cerrar sesión</a>
  </div>

  <div class="container">
    <h2>Historial de asistencia</h2>
    <table>
        <tr>
            <th>Número de matrícula</th>
            <th>Nombre</th>
            <th>Sección</th>
            <th>Asignatura</th>
            <th>Fecha</th>
        </tr>
        <?php
          if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)){
                  echo "<tr>
                      <td>".$row["rollno"]."</td>
                      <td>".$row["s_name"]."</td>
                      <td>".$row["section"]."</td>
                      <td>".$row["subject"]."</td>
                      <td>".$row["date"]."</td>
                  </tr>";
              }
          } else {
              echo "<tr><td colspan='5'>No se encontraron registros de asistencia.</td></tr>";
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
