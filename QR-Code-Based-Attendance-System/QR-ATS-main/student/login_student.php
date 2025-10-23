<?php
include '../database/connection.php';
session_start();

if (isset($_POST['login'])) {
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = mysqli_query($conn, "SELECT * FROM students WHERE student_id='$student_id' AND password='$password'") or die(mysqli_error($conn));
    $row = mysqli_fetch_array($query);
    $count = mysqli_num_rows($query);

    if ($count > 0) {
        $_SESSION['student_id'] = $row['student_id'];
        header('location: scan_qr.php');
    } else {
        echo "<script>alert('ID o contraseña incorrecta'); window.location='login_student.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Estudiante</title>
</head>
<body>
    <h2>Inicio de Sesión - Estudiante</h2>
    <form method="POST">
        <label>ID del estudiante:</label><br>
        <input type="text" name="student_id" required><br><br>
        <label>Contraseña:</label><br>
        <input type="password" name="password" required><br><br>
        <button type="submit" name="login">Ingresar</button>
    </form>
</body>
</html>
