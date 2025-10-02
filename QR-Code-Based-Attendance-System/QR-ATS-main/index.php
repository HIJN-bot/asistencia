<!DOCTYPE html>
<html lang="es"> <!-- cambiado a español -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Asistencia con Código QR</title> <!-- traducido -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="resources/img/Attendance System.png" type="image/x-icon">
</head>
<body>
    <main>
        <section class="left">
            <div class="logo">
                <h2>Sistema de Asistencia</h2> <!-- traducido -->
            </div>
            <img src="resources/img/img1.png" alt="Imagen asistencia">
        </section>
        <section class="right">
            <form id="form" method="post">
                <h2>Selecciona tu Rol</h2> <!-- traducido -->
                <input type="radio" name="role" id="teacher_radio" onchange="checkRadio()" value="teacher" required>
                <label for="teacher_radio">Profesor</label> <!-- traducido -->

                <input type="radio" name="role" id="student_radio" onchange="checkRadio()" value="student" required>
                <label for="student_radio">Estudiante</label> <!-- traducido -->

                <div class="input_area">
                    <input type="email" placeholder="Ingresa tu correo" name="email" required> <!-- traducido -->
                    <img src="resources/img/mail.png" alt="icono correo">
                </div>
                <div class="input_area">
                    <input type="password" placeholder="Ingresa tu contraseña" name="password" required> <!-- traducido -->
                    <img src="resources/img/padlock.png" alt="icono contraseña">
                </div>
                <button class="button_submit">Iniciar Sesión</button> <!-- traducido -->
                <div class="msg">¿Eres nuevo estudiante? <a href="register.php">Regístrate aquí</a></div> <!-- traducido -->
            </form>
        </section>
    </main>
    <script>
        function checkRadio(){
            let form = document.getElementById("form");

            if(document.getElementById("teacher_radio").checked){
                form.setAttribute("action", "teacher/index.php");
            }

            if(document.getElementById("student_radio").checked){
                form.setAttribute("action", "student/index.php");
            }
        }
    </script>
</body>
</html>

