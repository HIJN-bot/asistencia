<?php
    session_start();
    if(!isset($_SESSION["admin_name"])){
      header("location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Asistencia con Código QR</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .right{
            margin-top: -2rem;
        }
    </style>
</head>
<body>
    <main>
        <section class="left">
            <div class="logo">
                <img src="../resources/img/Attendance System.png" alt="">
                <h2>Sistema de Asistencia</h2>
            </div>
            <img src="../resources/img/img1.jpg" alt="">
        </section>
        <section class="right">
            <form action="../backend/teacher_data.php" method="post" id="form" onsubmit="return validateForm()">
                <div class="input_area">
                    <input type="text" placeholder="Ingrese Nombre" name="name" required>
                </div>
                <div class="input_area">
                    <input type="email" placeholder="Ingrese Correo Electrónico" name="email" required>
                </div>
                <div class="input_area">
                    <input type="text" placeholder="Ingrese Nombre de la Asignatura" name="subject" required>
                </div>
                <div class="input_area">
                    <input type="password" placeholder="Establecer Contraseña" name="password" id="pass" required>
                </div>
                <div class="input_area">
                    <input type="password" placeholder="Confirmar Contraseña" id="cpass" required>
                </div>
                <button class="button_submit" name="register">Registrar como Docente</button>
            </form>
        </section>
    </main>
    <script>
        function validateForm()
        {
            pass = document.getElementById("pass").value;
            cpass = document.getElementById("cpass").value;

            if(pass == cpass){
                return true;
            } else {
                alert("La contraseña y la confirmación deben coincidir");
                return false;
            }
        }
    </script>
</body>
</html>
