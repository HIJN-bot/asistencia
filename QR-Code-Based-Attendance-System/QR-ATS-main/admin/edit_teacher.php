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
        .right{
            margin-top: 2rem;
            float: left;
        }
        .left{
            width: auto;
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
        </section>
        <section class="right">
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
        </section>
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
