<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema de Asistencia con Código QR</title>
  <link rel="shortcut icon" href="resources/img/Attendance System.png" type="image/x-icon">
  <style>
    /* ======== Estilos Generales ======== */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      background: linear-gradient(135deg, #4b0d3a, #b91372);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      color: #eee;
    }

    main {
      width: 95%;
      max-width: 420px;
      background: #1e1e1e;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
      padding: 40px 35px;
      display: flex;
      flex-direction: column;
      align-items: center;
      transition: 0.3s ease;
    }

    main:hover {
      transform: translateY(-4px);
      box-shadow: 0 12px 35px rgba(185, 19, 114, 0.3);
    }

    h2 {
      color: #ffb6e6;
      margin-bottom: 25px;
      text-align: center;
      font-size: 1.6rem;
    }

    /* ======== Inputs y Botones ======== */
    form {
      width: 100%;
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .role {
      display: flex;
      justify-content: space-evenly;
      align-items: center;
      margin-bottom: 10px;
    }

    .role label {
      color: #ddd;
      font-weight: 500;
      cursor: pointer;
      transition: color 0.2s;
    }

    .role label:hover {
      color: #ff77c2;
    }

    .role input[type="radio"] {
      accent-color: #ff77c2;
      transform: scale(1.2);
      margin-right: 6px;
    }

    .input_area {
      position: relative;
    }

    .input_area input {
      width: 100%;
      padding: 12px 15px;
      background: #2b2b2b;
      border: 2px solid #444;
      color: #fff;
      border-radius: 10px;
      font-size: 0.95rem;
      transition: all 0.3s;
    }

    .input_area input:focus {
      border-color: #ff77c2;
      outline: none;
      box-shadow: 0 0 8px rgba(255, 119, 194, 0.4);
    }

    .button_submit {
      background: linear-gradient(135deg, #b91372, #4b0d3a);
      color: white;
      font-size: 1rem;
      font-weight: 600;
      padding: 12px;
      border: none;
      border-radius: 12px;
      cursor: pointer;
      transition: all 0.3s;
    }

    .button_submit:hover {
      background: linear-gradient(135deg, #4b0d3a, #b91372);
      transform: scale(1.03);
    }

    .msg {
      text-align: center;
      font-size: 0.9rem;
      margin-top: 10px;
      color: #ccc;
    }

    .msg a {
      color: #ff77c2;
      text-decoration: none;
      font-weight: 600;
      transition: 0.2s;
    }

    .msg a:hover {
      text-decoration: underline;
    }

    /* ======== Adaptación móvil ======== */
    @media (max-width: 450px) {
      main {
        padding: 30px 25px;
      }
      h2 {
        font-size: 1.4rem;
      }
    }
  </style>
</head>
<body>
  <main>
    <h2>Bienvenido al Sistema de Asistencia</h2>

    <form id="form" method="post">
      <div class="role">
        <label><input type="radio" name="role" id="teacher_radio" value="teacher" onchange="checkRadio()" required> Profesor</label>
        <label><input type="radio" name="role" id="student_radio" value="student" onchange="checkRadio()" required> Estudiante</label>
      </div>

      <div class="input_area">
        <input type="email" placeholder="Ingresa tu correo" name="email" required>
      </div>

      <div class="input_area">
        <input type="password" placeholder="Ingresa tu contraseña" name="password" required>
      </div>

      <button class="button_submit">Iniciar Sesión</button>

      <div class="msg">¿Eres nuevo estudiante? <a href="register.php">Regístrate aquí</a></div>
    </form>
  </main>

  <script>
    function checkRadio() {
      let form = document.getElementById("form");

      if (document.getElementById("teacher_radio").checked) {
        form.setAttribute("action", "teacher/index.php");
      }

      if (document.getElementById("student_radio").checked) {
        form.setAttribute("action", "student/index.php");
      }
    }
  </script>
</body>
</html>
