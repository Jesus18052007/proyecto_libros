<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="usuarios.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mas libros</title>
    <style>

    input[type="submit"],select{
    width: 100%;
    height: 40px;
    background-color: #b0a292;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    }

    input[type="text"]{
        width: 100%;
        height: 40px;
        margin-bottom: 10px;
        border-radius: 5px;

    }


    .form1{
        width: 100%;
        height: 160px;
        justify-content: center;
    }

    .form2{
        width: 100%;
        height: 300px;
        justify-content: center;

    }
    

        table{
            border-collapse: collapse;
            width: 80%;
            margin: 40px auto;
        }

        th,td{
            border: 1px solid #ddd;
            padding: 10px;
        }

        th{
            background-color: #f0f0f0;
        }

    </style>
</head>
<body>

    <header class="header">
        <h1>La biblioteca de los sueños</h1>
    </header>
    <nav>
        <ul class="nav">
            <a href="usuarios.php"><li>Usuarios</li></a>
            <a href="admin_libros.php"><li>Libros</li></a>
            <a href="sugerencias.php"><li>Sugerencias</li></a>
        </ul>
    </nav>

   <?php
$servername = "localhost";
$usernameDB = "root";
$passwordDB = "";
$dbname = "proyecto";

$conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

if ($conn->connect_error) {
die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

echo "<table border='1'>";
echo"<div style='margin:0 auto; width:50%;'>";
echo "<tr>";
$fields = $result->fetch_fields();
foreach ($fields as $field) {
echo "<th>" . $field->name . "</th>";
}
echo "</tr>";

while($row = $result->fetch_assoc()) {
echo "<tr>";
foreach ($row as $value) {
echo "<td>" . $value . "</td>";
}
echo "</tr>";
}
echo "</div>";
echo "</table>";

} else {
echo "No hay resultados";
}

if (isset($_GET["Id_Usuario"]) && isset($_GET["Tipo"])) {
$id = $_GET["Id_Usuario"];
$tipo = $_GET["Tipo"];

$sql = "UPDATE usuarios SET Tipo = '$tipo' WHERE Id_Usuario = '$id'";

if ($conn->query($sql) === TRUE) {
echo "<script>alert('Usuario modificado con éxito'); usuarios.php = '".$_SERVER["PHP_SELF"]."';</script>";
} else {
$mensaje = "Error al modificar usuario: " . $conn->error;
}
}


if ($conn->connect_error) {
die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$id = $_POST["Id_Usuario"];

$sql = "DELETE FROM usuarios WHERE Id_Usuario = '$id'";

if ($conn->query($sql) === TRUE) {
echo "<script>alert('Usuario eliminado con éxito'); usuarios.php = '".$_SERVER["PHP_SELF"]."';</script>";
} else {
echo "Error al eliminar usuario: " . $conn->error;
}
}







$conn->close();
?>
<br><br>

<div style="display: flex;">

<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post"  class="form1">
<label for="id">Ingrese el ID del usuario a eliminar:</label>
<input type="text" id="Id_Usuario" name="Id_Usuario" placeholder="Id del usuario">
<input type="submit" value="Eliminar">
</form>


<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="get"  class="form2">
<label for="id">Ingrese el ID del usuario a modificar:</label>
<input type="text" id="Id_Usuario" name="Id_Usuario" placeholder="Id del usuario"><br><br>
<label for="tipo">Seleccione el tipo de usuario:</label>
<select id="Tipo" name="Tipo">
<option value="Usuario">Usuario</option>
<option value="Admin">Administrador</option>
</select><br><br>
<input type="submit" value="Modificar">
</form>
</div>


        <footer>
            <ul class="footer">
                2025 La biblioteca de los sueños
            </ul>
        </footer>

</body>
</html>


