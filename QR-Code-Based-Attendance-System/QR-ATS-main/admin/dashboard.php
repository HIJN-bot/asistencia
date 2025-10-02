<?php
session_start();
if(!isset($_SESSION["admin_name"])){
  header("location:index.php");
}
$con = mysqli_connect("localhost","root","","qr_ats");
$student_query = "select * from student";
$student_result = mysqli_query($con,$student_query);

$teacher_query = "select * from teacher";
$teacher_result = mysqli_query($con,$teacher_query);

$total_teacher = mysqli_num_rows($teacher_result);
$total_student = mysqli_num_rows($student_result);
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Panel de Control</title>
    <link rel="stylesheet" href="../css/style.css" />
    <style>
      a{
        text-decoration: none;
        color: black;
      }
    </style>
  </head>
  <body>
    <main>
      <?php $title = 'Panel de Control'; $username=$_SESSION['admin_name']; include "../componets/header.php"  ?>
      <?php include "../componets/sidebar.php" ?>
      <div class="container">
        <div class="card">
            <h2 id="time"></h2>
            <img src="../resources/icons/sun.png"/>
            <h3 id="date"></h3>
        </div>
        <div class="card">
          <h1><?php echo $total_teacher; ?></h1>
          <img src="../resources/icons/Profile.svg" alt="" />
          <a href="teacher.php">
          <h4>Total de Docentes</h4>
          </a>
        </div>

        <div class="card">
          <h1><?php echo $total_student; ?></h1>
          <img src="../resources/icons/2 User.svg" alt="" />
          <a href="student.php">
            <h4>Total de Estudiantes</h4>
          </a>
        </div>
      </div>
    </main>
    <script>
        time = document.getElementById("time");
        date = document.getElementById("date");

        var mt = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

        setInterval(() => {
          var d = new Date();
          var h = d.getHours();
          var m = d.getMinutes();
          var s = d.getSeconds();

          var a = "AM";
          if(h > 12){
            a = "PM";
            h -= 12;
          }

          time.innerHTML = h + ":" + m + ":" + s + " " + a;
          date.innerHTML = "Hoy : <br>" + d.getDate() + " " + mt[d.getMonth()] + " " + d.getFullYear();
        }, 1000);
    </script>
  </body>
</html>

</html>

