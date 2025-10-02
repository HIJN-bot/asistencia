<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Asistencia con QR</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .right{
            margin-top: -2rem;
        }
        body {
            font-family: Arial, sans-serif;
        }
        .msg {
            margin-top: 10px;
            font-size: 14px;
        }
        .msg a {
            color: #007bff;
            text-decoration: none;
        }
        .msg a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <main>
        <!-- Sección izquierda con logo e imagen -->
        <section class="left">
            <div class="logo">
                <h2>Sistema de Asistencia</h2>
            </div>
            <img src="resources/img/img1.jpg" alt="Imagen asistencia">
        </section>

        <!-- Sección derecha con el formulario -->
        <section class="right">
            <form action="backend/student_data.php" method="post" id="form" onsubmit="return validateForm()">
                
                <div class="input_area">
                    <input type="text" placeholder="Ingrese su nombre" name="name" required>
                </div>

                <div class="input_area">
                    <input type="email" placeholder="Ingrese su correo electrónico" name="email" required>
                </div>

                <div class="input_area">
                    <input type="text" placeholder="Ingrese su número de matrícula" name="roll_no" required>
                </div>

                <div class="input_area">
                    <select name="section" id="section" required>
                        <option value="" disabled selected>Seleccione su sección</option>
                        <option value="A">Sección A</option>
                        <option value="B">Sección B</option>
                        <option value="C">Sección C</option>
                    </select>
                </div>

                <div class="input_area">
                    <input type="password" placeholder="Cree una contraseña" name="password" id="pass" required>
                </div>

                <div class="input_area">
                    <input type="password" placeholder="Confirme su contraseña" id="cpass" required>
                </div>

                <button class="button_submit" name="register">Registrarse</button>

                <div class="msg">
                    ¿Ya tienes cuenta? <a href="index.php">Inicia sesión aquí</a>
                </div>
            </form>
        </section>
    </main>

    <script>
        function validateForm() {
            let pass = document.getElementById("pass").value;
            let cpass = document.getElementById("cpass").value;

            if (pass !== cpass) {
                alert("⚠️ Las contraseñas no coinciden. Inténtalo de nuevo.");
                return false;
            }

            let email = document.querySelector('input[name="email"]').value;
            let emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
            if (!email.match(emailPattern)) {
                alert("⚠️ Ingrese un correo electrónico válido.");
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
