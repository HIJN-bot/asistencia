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
        body {
            margin: 0;
            font-family: "Poppins", sans-serif;
            background: linear-gradient(135deg, #4b0d3a, #b91372);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        main {
            display: flex;
            width: 80%;
            max-width: 1100px;
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0,0,0,0.3);
            color: #333;
        }

        section.left {
            flex: 1;
            background: #f8f5f9;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            padding: 2rem;
        }

        section.left .logo {
            text-align: center;
        }

        section.left .logo img {
            width: 100px;
            height: auto;
        }

        section.left h2 {
            margin-top: 1rem;
            font-size: 1.5rem;
            color: #4b0d3a;
        }

        section.left img {
            width: 100%;
            border-radius: 10px;
            margin-top: 1rem;
        }

        section.right {
            flex: 1;
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .input_area input {
            width: 100%;
            padding: 0.9rem;
            border-radius: 10px;
            border: 1px solid #ccc;
            font-size: 1rem;
            outline: none;
            transition: border 0.3s;
        }

        .input_area input:focus {
            border-color: #b91372;
        }

        .button_submit {
            background: linear-gradient(135deg, #4b0d3a, #b91372);
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 1rem;
            font-size: 1rem;
            cursor: pointer;
            transition: 0.3s;
        }

        .button_submit:hover {
            opacity: 0.9;
            transform: scale(1.02);
        }

        .presente {
            position: absolute;
            bottom: 10px;
            left: 20px;
            font-size: 0.9rem;
            color: #4b0d3a;
            font-weight: bold;
        }

        @media (max-width: 900px) {
            main {
                flex-direction: column;
                width: 90%;
            }

            section.left {
                display: none;
            }

            section.right {
                padding: 2rem;
            }
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
            <div class="presente">Presente</div>
        </section>
    </main>
    <script>
        function validateForm() {
            const pass = document.getElementById("pass").value;
            const cpass = document.getElementById("cpass").value;

            if(pass === cpass){
                return true;
            } else {
                alert("La contraseña y la confirmación deben coincidir");
                return false;
            }
        }
    </script>
</body>
</html>
