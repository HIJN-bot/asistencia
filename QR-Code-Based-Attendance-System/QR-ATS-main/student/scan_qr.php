<?php
session_start();
if (!isset($_SESSION["student_name"])) {
  header("location:../index.php");
}

$con = mysqli_connect("localhost", "root", "", "qr_ats");

$s_id = $_GET['s_id'];
$s_name = $_GET['s_name'];
$subject = $_GET['subject'];
$section = $_GET['section'];
$roll_no = $_GET['rollno'];
$date = $_GET['date'];

echo $s_id . "<br>";
echo $s_name . "<br>";
echo $subject . "<br>";
echo $section . "<br>";
echo $roll_no . "<br>";
echo $date;

$query = "insert into attendance(s_id, s_name, subject, section, rollno, date) values('$s_id','$s_name','$subject','$section','$roll_no','$date')";

try{
  $result = mysqli_query($con,$query);
  header("location:success.php");
}
catch(mysqli_sql_exception $e){
  header("location:already.php");
}

?>

<!DOCTYPE html>
<html lang="es"> <!-- traducido a español -->

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Panel de Control</title> <!-- traducido -->
  <link rel="stylesheet" href="../css/style.css" />
  <style>
    a {
      text-decoration: none;
      color: black;
    }
    .msg{
      color: green;
    }
  </style>
</head>

<body>
  <main>
    <?php 
      $title = 'Sistema de Asistencia'; // traducido
      $username = $_SESSION['student_name'];
      include "../componets/header.php" 
    ?>
    <div class="container">
      <h1 class="msg">¡Asistencia Registrada con Éxito! ✅</h1> <!-- traducido -->
    </div>
  </main>
  <script>
    var show = 0;
    function showBox() {
      box = document.getElementById('box');
      if (show == 0) {
        box.style.height = "100px";
        show = 1;
      } else {
        box.style.height = "0px";
        show = 0;
      }
    }
  </script>
</body>

</html>
