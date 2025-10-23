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
      body {
        margin: 0;
        font-family: "Poppins", sans-serif;
        background: linear-gradient(135deg, #4b0d3a, #b91372);
        color: #fff;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
      }

      main {
        display: flex;
        flex: 1;
      }

      .container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        padding: 2rem;
        width: 100%;
      }

      .card {
        background: #fff;
        color: #4b0d3a;
        border-radius: 20px;
        text-align: center;
        padding: 2rem;
        box-shadow: 0 0 20px rgba(0,0,0,0.3);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
      }

      .card:hover {
        transform: scale(1.05);
        box-shadow: 0 0 30px rgba(0,0,0,0.4);
      }

      .card h1 {
        font-size: 3rem;
        margin: 0;
      }

      .card h4 {
        margin-top: 0.5rem;
        font-weight: 600;
      }

      a {
        text-decoration: none;
        color: #4b0d3a;
        font-weight: bold;
      }

      #time {
        font-size: 2rem;
        margin-bottom: 0.5rem;
      }

      #date {
        font-size: 1rem;
      }

      .presente {
        position: fixed;
        bottom: 15px;
        left: 25px;
        color: #fff;
        font-weight: bold;
        letter-spacing: 1px;
      }

      @media (max-width: 768px) {
        .container {
          grid-template-columns: 1fr;
        }
      }
    </style>
  </head>
  <body>
    <main>
      <?php 
        $title = 'Panel de Control'; 
        $username = $_SESSION['admin_name']; 
        include "../componets/header.php"; 
        include "../componets/sidebar.php"; 
      ?>

      <div class="container">
        <div class="card">
          <h2 id="time"></h2>
          <h3 id="date"></h3>
        </div>

        <div class="card">
          <h1><?php echo $total_teacher; ?></h1>
          <a href="teacher.php">
            <h4>Total de Docentes</h4>
          </a>
        </div>

        <div class="card">
          <h1><?php echo $total_student; ?></h1>
          <a href="student.php">
            <h4>Total de Estudiantes</h4>
          </a>
        </div>
      </div>
    </main>

    <div class="presente">Presente</div>

    <script>
      const time = document.getElementById("time");
      const date = document.getElementById("date");

      const months = [
        "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
        "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
      ];

      setInterval(() => {
        const d = new Date();
        let h = d.getHours();
        let m = d.getMinutes().toString().padStart(2, "0");
        let s = d.getSeconds().toString().padStart(2, "0");
        let a = "AM";

        if (h >= 12) {
          a = "PM";
          if (h > 12) h -= 12;
        } else if (h === 0) {
          h = 12;
        }

        time.innerHTML = `${h}:${m}:${s} ${a}`;
        date.innerHTML = `Hoy:<br>${d.getDate()} ${months[d.getMonth()]} ${d.getFullYear()}`;
      }, 1000);
    </script>
  </body>
</html>
