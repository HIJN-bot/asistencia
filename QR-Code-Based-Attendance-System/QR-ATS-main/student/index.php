<?php
include '../database/connection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        echo "<script>alert('Por favor ingresa todos los campos');</script>";
    } else {
        $query = mysqli_query($conn, "SELECT * FROM student WHERE email='$email' AND password='$password'") or die(mysqli_error($conn));

        if (mysqli_num_rows($query) === 1) {
            $row = mysqli_fetch_assoc($query);
            $_SESSION['id'] = $row['id'];
            $_SESSION['student_name'] = $row['name'];
            $_SESSION['rollno'] = $row['roll_no'];
            $_SESSION['section'] = $row['section'];
            $_SESSION['student_email'] = $row['email'];
            header("Location: sc_qr.php");
            exit();
        } else {
            echo "<script>alert('Correo o contraseña incorrectos');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Estudiante</title>
  <link rel="stylesheet" href="../css/style.css" />
  <style>
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
    }

    .container {
      width: 90%;
      max-width: 400px;
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
      font-size: 1.8rem;
      margin-bottom: 10px;
    }

    p {
      color: #ccc;
      font-size: 1rem;
      margin-bottom: 25px;
    }

    label {
      display: block;
      text-align: left;
      color: #ffb6e6;
      margin-bottom: 8px;
      font-weight: 500;
    }

    input {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 10px;
      outline: none;
      font-size: 1rem;
      margin-bottom: 20px;
      background: rgba(255, 255, 255, 0.15);
      color: white;
    }

    input::placeholder {
      color: #ddd;
    }

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
      width: 100%;
    }

    button:hover {
      background: linear-gradient(135deg, #4b0d3a, #b91372);
      transform: scale(1.05);
    }

    footer {
      text-align: center;
      margin-top: 20px;
      color: #ccc;
      font-size: 0.9rem;
    }

    @media (max-width: 480px) {
      .container {
        padding: 30px 20px;
      }

      h1 {
        font-size: 1.5rem;
      }
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Ingreso Estudiante</h1>
    <p>Introduce tus datos para continuar</p>

    <form method="POST" action="">
      <label for="email">Correo electrónico:</label>
      <input type="email" id="email" name="email" placeholder="ejemplo@correo.com" required>

      <label for="password">Contraseña:</label>
      <input type="password" id="password" name="password" placeholder="••••••••" required>

      <button type="submit">Ingresar</button>
    </form>

    <footer>
      Sistema de Asistencia QR © 2025
    </footer>
  </div>
</body>
</html>
