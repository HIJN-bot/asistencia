<?php
error_reporting(0);
session_start();
if(!isset($_SESSION["admin_name"])){
  header("location:index.php");
}

$con = mysqli_connect("localhost", "root", "", "qr_ats");

$query = "select * from student";
$result = mysqli_query($con,$query);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudiantes</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #4b0d3a, #b91372);
            margin: 0;
            padding: 0;
            color: white;
        }

        main {
            padding: 2rem;
        }

        .present {
            position: absolute;
            top: 15px;
            left: 25px;
            font-weight: bold;
            font-size: 1.2rem;
        }

        .add {
            display: inline-block;
            background-color: #b91372;
            color: white;
            text-decoration: none;
            padding: 0.8rem 1.2rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            transition: 0.3s;
        }

        .add:hover {
            background-color: #4b0d3a;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            color: white;
        }

        th, td {
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            padding: 0.8rem;
            text-align: center;
        }

        th {
            background-color: rgba(0, 0, 0, 0.2);
            font-weight: bold;
        }

        tr:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        a.edit, a.delete {
            text-decoration: none;
            color: white;
            font-weight: bold;
            padding: 0.5rem 0.8rem;
            border-radius: 6px;
            transition: 0.3s;
        }

        a.edit {
            background-color: #b91372;
        }

        a.edit:hover {
            background-color: #4b0d3a;
        }

        a.delete {
            background-color: #4b0d3a;
        }

        a.delete:hover {
            background-color: #b91372;
        }

        h3 {
            text-align: center;
            color: #ffb6e1;
        }
    </style>
</head>
<body>
    <div class="present">Presente</div>
    <main>
        <?php $title = 'Estudiantes'; include "../componets/header.php"; ?>
        <?php include "../componets/sidebar.php"; ?>

        <a href="../register.html" class="add">Agregar Estudiante</a>

        <div class="container">
            <?php
                if(mysqli_num_rows($result) <= 0){
                    echo "<h3>¡Aún no hay estudiantes registrados!</h3>";
                } else {
                    echo '
                    <table>
                        <tr>
                            <th>No.</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Número de Lista</th>
                            <th>Sección</th>
                            <th>Acciones</th>
                        </tr>';
                    $srno = 0;
                    while($row = mysqli_fetch_assoc($result)) {
                        $srno++;
                        $id = $row['id'];
                        echo "
                        <tr>
                            <td>".$srno."</td>
                            <td>".$row["name"]."</td>
                            <td>".$row["email"]."</td>
                            <td>".$row["roll_no"]."</td>
                            <td>".$row["section"]."</td>
                            <td>
                                <a href='edit_student.php?id=$row[id]&name=$row[name]&email=$row[email]&roll_no=$row[roll_no]&&section=$row[section]' class='edit'>Editar</a>
                                <a href='delete_student.php?id=$row[id]' class='delete' onclick='return wantDelete()'>Eliminar</a>
                            </td>
                        </tr>";
                    }
                    echo "</table>";
                }
            ?>
        </div>
    </main>

    <script>
        function wantDelete(){
            return confirm("¿Desea eliminar este estudiante?");
        }
    </script>
</body>
</html>
