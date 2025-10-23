<?php
    session_start();
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
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }

        main {
            background-color: rgba(255, 255, 255, 0.12);
            border-radius: 20px;
            width: 400px;
            padding: 2.5rem;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        h2 {
            font-size: 1.6rem;
            margin-bottom: 1.5rem;
            color: white;
            font-weight: bold;
        }

        .input_area {
            margin-bottom: 1.2rem;
            position: relative;
        }

        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 0.9rem;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            outline: none;
            transition: all 0.3s ease;
        }

        input[type="email"]:focus, input[type="password"]:focus {
            background-color: #f3d9f4;
            color: #4b0d3a;
        }

        .button_submit {
            background-color: #b91372;
            border: none;
            border-radius: 10px;
            color: white;
            padding: 0.9rem 1.2rem;
            font-size: 1rem;
            cursor: pointer;
            transition: 0.3s ease;
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
        <h2>Iniciar Sesión como Administrador</h2>
        <form id="form" method="post" action="#">
            <div class="input_area">
                <input type="email" placeholder="Ingrese Correo" name="email" required>
            </div>
            <div class="input_area">
                <input type="password" placeholder="Ingrese Contraseña" name="pass" required>
            </div>
            <input type="submit" value="Iniciar Sesión" name="login" class="button_submit">
        </form>
    </main>
</body>
</html>

<?php

if(isset($_POST["login"]))
{
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $con = mysqli_connect("localhost", "root", "", "qr_ats");
    $query = "select * from admin where email='$email' and pass='$pass'";
    $result = mysqli_query($con,$query);

    $row = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) <= 0){
        echo "<script>
            alert('Ingrese credenciales válidas')
        </script>";
    }
    else{
        $_SESSION['admin_name'] = $row['name'];
        $_SESSION['admin_email'] = $row['email'];
        header('location:dashboard.php');
    }
}

?>
