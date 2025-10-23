<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "qr_ats");
if(!isset($_SESSION["admin_name"])){
  header("location:index.php");
}

$id = $_GET['id'];
$section = $_GET['section'];
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
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    main {
      background: rgba(255, 255, 255, 0.95);
      color: #4b0d3a;
      border-radius: 20px;
      padding: 2rem 3rem;
      box-shadow: 0 0 25px rgba(0, 0, 0, 0.3);
      width: 90%;
      max-width: 450px;
      text-align: center;
      position: relative;
    }

    h2 {
      margin-bottom: 1.5rem;
      color: #4b0d3a;
    }

    .input_area {
      margin-bottom: 1.5rem;
    }

    input[type="text"],
    input[type="email"],
    select {
      width: 100%;
      padding: 10px;
      border: 2px solid #b91372;
      border-radius: 8px;
      font-size: 16px;
      outline: none;
      color: #4b0d3a;
      background: #fff;
      transition: 0.3s;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    select:focus {
      border-color: #4b0d3a;
      box-shadow: 0 0 8px rgba(75, 13, 58, 0.4);
    }

    .button_submit {
      background-color: #4b0d3a;
      color: white;
      border: none;
      border-radius: 8px;
      padding: 12px 20px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s ease, transform 0.2s;
      width: 100%;
    }

    .button_submit:hover {
      background-color: #b91372;
      transform: scale(1.05);
    }

    .presente {
      position: fixed;
      bottom: 15px;
      left: 25px;
      color: #fff;
      font-weight: bold;
      letter-spacing: 1px;
    }
  </style>
</head>

<body>
  <main>
    <h2>Editar Estudiante</h2>
    <form action="#" method="post" id="form">
      <div class="input_area">
        <input type="text" placeholder="Ingrese Nombre" name="name" value="<?php echo $_GET['name'];?>" required>
      </div>
      <div class="input_area">
        <input type="email" placeholder="Ingrese Correo" name="email" value="<?php echo $_GET['email'];?>" required>
      </div>
      <div class="input_area">
        <input type="text" placeholder="Ingrese Número de Lista" name="roll_no" value="<?php echo $_GET['roll_no'];?>" required>
      </div>
      <div class="input_area">
        <select name="section" id="section" required>
          <option value="<?php echo $section;?>" selected><?php echo $section;?></option>
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="C">C</option>
        </select>
      </div>
      <input type="submit" value="Guardar Cambios" class="button_submit" name="update">
    </form>
  </main>

  <div class="presente">Presente</div>
</body>
</html>

<?php
if(isset($_POST['update'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $roll_no = $_POST['roll_no'];
  $section = $_POST['section'];

  $query = "update student set name='$name',email='$email',roll_no='$roll_no',section='$section' where id='$id'";
  $result = mysqli_query($con,$query);

  if($result){
      header("location:student.php");
  }
}
?>
