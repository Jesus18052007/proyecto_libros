<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyecto_libros";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
die("Conexión fallida: " . $conn->connect_error);
}

$nombre = $_POST['nombre'];
$contrasenia = $_POST['contrasenia'];

$sql = "SELECT * FROM usuarios WHERE nombre = '$nombre' AND contrasenia = '$contrasenia'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
$row = $result->fetch_assoc();
$exito = true;
$rol = $row['rol'];
} else {
$exito = false;
$rol = '';
}

$conn->close();

echo json_encode(array('exito' => $exito, 'rol' => $rol));
?>