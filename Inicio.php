<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyecto";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$nombre = $_POST["Nombre"];
$contrasenia = $_POST["Contrasenia"];

$sql = "SELECT * FROM usuarios WHERE Nombre = '$nombre' AND Contrasenia = '$contrasenia'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
$row = $result->fetch_assoc();
$tipo = $row["Tipo"];

if ($tipo == "Admin") {
header("Location:usuarios.php");
exit();
} elseif ($tipo == "Usuario") {
header("Location:index.html");
exit();
}
} else {
echo "<script>alert('Datos incorrectos');</script>";
}
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Formulario de Usuario</title>
  <style>
    body {
        font-family: Bookman Old Style;
      color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .form-container {
      background: rgba(255, 255, 255, 0.1);
      padding: 2rem 3rem;
      border-radius: 12px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
      width: 320px;
    }

    h2 {
      text-align: center;
      margin-bottom: 1.5rem;
      font-weight: 700;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: #000;
    }

    label {
      display: block;
      color: #000;
      margin-bottom: 0.25rem;
      font-weight: 600;
      font-size: 0.9rem;
    }

    input[type="text"], select {
    width: 100%;
    height: 40px;
    margin-bottom: 20px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    }

    input[type="password"], select {
    width: 100%;
    height: 40px;
    margin-bottom: 20px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    }

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
    
    button[type="submit"] {
    width: 100%;
    height: 40px;
    background-color: #b0a292;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    }
    
    button[type="submit"]:hover {
    background-color: #b8ac9e;
    }

    a{
        text-decoration: none;
        color: #000;
    }

  </style>

</head>
<body>
  <div class="form-container">
    <h2>Inicio de Sesion</h2>

    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
      <label for="Nombre">Nombre:</label>
      <input type="text" id="Nombre" name="Nombre"><br><br>

      <label for="contrasenia">Contraseña:</label>
      <input type="password" id="Contrasenia" name="Contrasenia"><br><br>

      <input type="submit" value="Iniciar sesion">

      <br><br>
      <a href="registro.php">No tengo cuenta</a>

      </form>



  </div>

  <script>
    
    
 
</script>

</body>
</html>