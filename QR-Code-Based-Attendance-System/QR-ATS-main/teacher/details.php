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

    .logout a {
      display: inline-block;
      background: linear-gradient(90deg, #a50d62, #4b0d3a);
      color: white;
      text-decoration: none;
      padding: 10px 18px;
      border-radius: 8px;
      font-weight: 500;
      transition: 0.3s ease;
    }

    .logout a:hover {
      opacity: 0.85;
    }

    .container {
      background-color: rgba(255, 255, 255, 0.12);
      border-radius: 16px;
      backdrop-filter: blur(8px);
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
      width: 90%;
      max-width: 900px;
      margin: 50px auto;
      padding: 25px 35px;
    }

    h2 {
      text-align: center;
      color: #ffb6e6;
      font-size: 28px;
      margin-bottom: 25px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      overflow: hidden;
      border-radius: 10px;
    }

    th, td {
      border: none;
      padding: 12px;
      text-align: center;
      color: #fff;
    }

    th {
      background-color: #6a0dad;
      color: #fff;
      font-weight: 600;
    }

    tr:nth-child(even) {
      background-color: rgba(255, 255, 255, 0.08);
    }

    tr:nth-child(odd) {
      background-color: rgba(255, 255, 255, 0.04);
    }

    tr:hover {
      background-color: rgba(255, 255, 255, 0.12);
      transition: 0.3s;
    }
  </style>
</head>

<body>
  <header>
    <h1>Presente</h1>
    <div class="logout">
      <a href="../logout.php">Cerrar sesión</a>
    </div>
  </header>

  <div class="container">
    <h2>Historial de Asistencia</h2>
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

</body>
</html>
