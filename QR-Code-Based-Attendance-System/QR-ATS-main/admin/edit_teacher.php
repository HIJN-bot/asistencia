<?php

session_start();
$con = mysqli_connect("localhost", "root", "", "qr_ats");
if(!isset($_SESSION["admin_name"])){
  header("location:index.php");
}

$id = $_GET['id'];

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
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #4b0d3a, #b91372);
            margin: 0;
            padding: 0;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        main {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 3rem;
            width: 400px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
            text-align: center;
        }

        h2 {
            margin-bottom: 1.5rem;
            font-size: 1.8rem;
            font-weight: bold;
            color: white;
        }

        .input_area {
            margin-bottom: 1.2rem;
        }

        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 0.8rem;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            outline: none;
            transition: 0.3s;
        }

        input[type="text"]:focus, input[type="email"]:focus {
            background-color: #f5e1f5;
            color: #4b0d3a;
        }

        .button_submit {
            background-color: #b91372;
            border: none;
            border-radius: 10px;
            color: white;
            padding: 0.8rem 1.5rem;
            font-size: 1rem;
            cursor: pointer;
            transition: 0.3s;
            width: 100%;
        }

        .button_submit:hover {
            background-color: #4b0d3a;
        }

        .present {
            position: absolute;
            top: 15px;
            left: 20px;
            font-weight: bold;
            font-size: 1.2rem;
            color: white;
        }
    </style>
</head>
<body>
    <div class="present">Presente</div>
    <main>
        <h2>Editar Profesor</h2>
        <form action="#" method="post" id="form">
            <div class="input_area">
                <input type="text" placeholder="Ingrese Nombre" name="name" value="<?php echo $_GET['name'];?>" required>
            </div>
            <div class="input_area">
                <input type="email" placeholder="Ingrese Correo" name="email" value="<?php echo $_GET['email'];?>" required>
            </div>
            <div class="input_area">
                <input type="text" placeholder="Ingrese Nombre de la Asignatura" name="subject" value="<?php echo $_GET['subject'];?>" required>
            </div>
            <input type="submit" value="Guardar Cambios" class="button_submit" name="update">
        </form>
    </main>
</body>
</html>

<?php

if(isset($_POST['update'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];

    $query = "update teacher set name='$name',email='$email',subject='$subject' where id='$id'";
    $result = mysqli_query($con,$query);

    if($result){
        header("location:teacher.php");
    }
}

?>
