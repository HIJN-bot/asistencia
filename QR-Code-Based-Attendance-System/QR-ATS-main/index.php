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
      position: relative;
      overflow: hidden;
    }

    /* ======== Texto “Presente” ======== */
    .titulo-presente {
      position: absolute;
      top: 25px;
      left: 30px;
      font-size: 1.6rem;
      font-weight: 700;
      color: #ffb6e6;
      text-shadow: 0 0 12px rgba(255, 182, 230, 0.4);
      letter-spacing: 1px;
    }

    /* ======== Caja Principal ======== */
    main {
      width: 95%;
      max-width: 420px;
      background: #1e1e1e;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
      padding: 40px 35px;
      display: flex;
      flex-direction: column;
      align-items: center;
      transition: all 0.3s ease;
    }

    main:hover {
      transform: translateY(-4px);
      box-shadow: 0 12px 35px rgba(185, 19, 114, 0.35);
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

    /* ======== Rol ======== */
    .role {
      display: flex;
      justify-content: space-evenly;
      align-items: center;
      margin-bottom: 10px;
      gap: 10px;
    }

    .role label {
      color: #ddd;
      font-weight: 500;
      cursor: pointer;
      transition: color 0.2s;
      display: flex;
      align-items: center;
    }

    .role input[type="radio"] {
      accent-color: #ff77c2;
      transform: scale(1.2);
      margin-right: 6px;
      transition: 0.3s;
    }

    .role input[type="radio"]:checked {
      filter: drop-shadow(0 0 5px #ff77c2);
    }

    .role label:hover {
      color: #ff77c2;
    }

    /* ======== Inputs ======== */
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

    /* ======== Botón ======== */
    .button_submit {
      background: linear-gradient(90deg, #a50d62, #4b0d3a);
      color: white;
      font-size: 1rem;
      font-weight: 600;
      padding: 12px;
      border: none;
      border-radius: 12px;
      cursor: pointer;
      transition: all 0.3s;
      box-shadow: 0 0 12px rgba(165, 13, 98, 0.3);
    }

    .button_submit:hover {
      background: linear-gradient(90deg, #4b0d3a, #a50d62);
      transform: scale(1.05);
      box-shadow: 0 0 16px rgba(185, 19, 114, 0.5);
    }

    /* ======== Mensaje ======== */
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
      .titulo-presente {
        font-size: 1.3rem;
        left: 20px;
      }
    }
  </style>
</head>
<body>
  <span class="titulo-presente">Presente</span>

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

      <div class="msg">
        ¿Eres nuevo estudiante? <a href="register.php">Regístrate aquí</a>
      </div>
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
