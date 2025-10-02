<?php
session_start();

$email = $_POST['email'];
$pass = $_POST['password'];

// Conexión a BD
$con = mysqli_connect("localhost", "root", "", "qr_ats");

// Validar conexión
if (!$con) {
    die("Error de conexión: " . mysqli_connect_error());
}

$query = "SELECT * FROM teacher WHERE email='$email' AND password='$pass'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) <= 0) {
    echo "<script>
            alert('Credenciales inválidas');
            location.href='../index.php';
          </script>";
    exit();
} else {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['teacher_name']  = $row['name'];
    $_SESSION['teacher_email'] = $row['email'];
    $_SESSION['subject']       = $row['subject'];

    // Redirigir directo al dashboard de QR
    header("location:gen_qr.php");
    exit();
}
?>
