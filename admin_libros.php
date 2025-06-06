<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="Mas_libros.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mas libros</title>
    <style>
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

$sql = "SELECT * FROM libros";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
echo "<table border='1'>";
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
echo "</table>";
} else {
echo "No hay resultados";
}

$conn->close();
?>

    

        <footer>
            <ul class="footer">
                2025 La biblioteca de los sueños
            </ul>
        </footer>

</body>
</html>

