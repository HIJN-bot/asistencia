<?php
session_start();
if (!isset($_SESSION["student_name"])) {
  header("Location: ../index.php");
  exit();
}

include '../database/connection.php'; // usa tu conexión $conn

// Validar existencia de parámetros GET
$s_id    = isset($_GET['s_id']) ? mysqli_real_escape_string($conn, $_GET['s_id']) : null;
$s_name  = isset($_GET['s_name']) ? mysqli_real_escape_string($conn, $_GET['s_name']) : null;
$subject = isset($_GET['subject']) ? mysqli_real_escape_string($conn, $_GET['subject']) : null;
$section = isset($_GET['section']) ? mysqli_real_escape_string($conn, $_GET['section']) : null;
$roll_no = isset($_GET['rollno']) ? mysqli_real_escape_string($conn, $_GET['rollno']) : null;
$date    = isset($_GET['date']) ? mysqli_real_escape_string($conn, $_GET['date']) : null;

$mensaje = '';
$success = false;

if ($s_id && $s_name && $subject && $section && $roll_no && $date) {
    // Comprobar si ya existe registro exacto (por ejemplo mismo s_id, subject y date)
    $check_sql = "SELECT * FROM attendance WHERE s_id = '$s_id' AND subject = '$subject' AND date = '$date' LIMIT 1";
    $check_res = mysqli_query($conn, $check_sql);

    if ($check_res && mysqli_num_rows($check_res) > 0) {
        $mensaje = 'Asistencia ya registrada anteriormente.';
    } else {
        $ins_sql = "INSERT INTO attendance (s_id, s_name, subject, section, rollno, date) 
                    VALUES ('$s_id','$s_name','$subject','$section','$roll_no','$date')";
        if (mysqli_query($conn, $ins_sql)) {
            $mensaje = '¡Asistencia registrada con éxito!';
            $success = true;
        } else {
            $mensaje = 'Error al registrar asistencia: ' . mysqli_error($conn);
        }
    }
} else {
    $mensaje = 'Faltan datos del QR. Asegúrate de escanear un QR válido.';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Resultado Escaneo</title>
  <link rel="stylesheet" href="../css/style.css" />
  <style>
    body{ background: linear-gradient(135deg,#b91372,#4b0d3a); color:#fff; font-family:Poppins, sans-serif; min-height:100vh; display:flex; align-items:center; justify-content:center; }
    .container{ background:rgba(30,30,30,0.9); padding:30px; border-radius:12px; text-align:center; max-width:600px; width:90%; }
    .ok{ color: #b6ffb6; }
    .err{ color: #ffd1d1; }
    a.btn{ display:inline-block; margin-top:20px; padding:10px 18px; border-radius:10px; background:#fff; color:#000; text-decoration:none; }
  </style>
</head>
<body>
  <div class="container">
    <h1><?php echo $success ? '<span class="ok">✅ Éxito</span>' : '<span class="err">⚠️ Información</span>'; ?></h1>
    <p><?php echo htmlspecialchars($mensaje); ?></p>

    <?php if ($success): ?>
      <p><strong>Alumno:</strong> <?php echo htmlspecialchars($s_name); ?><br>
      <strong>Sección:</strong> <?php echo htmlspecialchars($section); ?> — <strong>Asignatura:</strong> <?php echo htmlspecialchars($subject); ?><br>
      <strong>Hora:</strong> <?php echo htmlspecialchars($date); ?></p>
    <?php endif; ?>

    <a class="btn" href="index.php">Volver al panel</a>
  </div>
</body>
</html>
