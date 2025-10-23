<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro - Sistema de Asistencia con QR</title>
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

    /* ======== Inputs ======== */
    form {
      width: 100%;
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .input_area {
      position: relative;
    }

    input, select {
      width: 100%;
      padding: 12px 15px;
      background: #2b2b2b;
      border: 2px solid #444;
      color: #fff;
      border-radius: 10px;
      font-size: 0.95rem;
      transition: all 0.3s;
    }

    input::placeholder {
      color: #bbb;
    }

    input:focus, select:focus {
      border-color: #ff77c2;
      outline: none;
      box-shadow: 0 0 8px rgba(255, 119, 194, 0.4);
    }

    select {
      appearance: none;
      cursor: pointer;
    }

    /* ======== Botón ======== */
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
    }
  </style>
</head>
<body>
  <main>
    <h2>Registro de Estudiante</h2>

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
  </main>

  <script>
    function validateForm() {
      let pass = document.getElementById("pass").value;
      let cpass = document.getElementById("cpass").value;

      if (pass !== cpass) {
        alert(" Las contraseñas no coinciden. Inténtalo de nuevo.");
        return false;
      }

      let email = document.querySelector('input[name="email"]').value;
      let emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
      if (!email.match(emailPattern)) {
        alert(" Ingrese un correo electrónico válido.");
        return false;
      }

      return true;
    }
  </script>
</body>
</html>
