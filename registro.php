<?php
$servername = "localhost";
$usernameDB = "root";
$passwordDB = "";
$dbname = "proyecto";

$conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

if ($conn->connect_error) {
die("Conexión fallida: " . $conn->connect_error);
}
?>

Registro de usuario
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$contrasenia = $_POST["contrasenia"];
$tipo="Usuario";

$sql = "INSERT INTO usuarios (nombre, apellidos, contrasenia,Tipo) VALUES ('$nombre', '$apellidos', '$contrasenia','$tipo')";

if ($conn->query($sql) === TRUE) {
echo "Usuario registrado correctamente";
} else {
echo "Error al registrar usuario: " . $conn->error;
}
}

// Cerrar conexión
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
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Registro</h2>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
      <label for="nombre">Nombre</label>
      <input type="text" id="nombre" name="nombre" placeholder="Ingresa tu  nombre" required />

      <label for="apellidos">Apellidos</label>
      <input type="text" id="apellidos" name="apellidos" placeholder="Imgresa tus  apellidos" required />

      <label for="contrasenia">Contraseña</label>
      <input type="password" id="contrasenia" name="contrasenia" placeholder="Ingresa tu contraseña" required />

      <label>No olvides tu contraseña</label>
      <br>
      <button type="submit" onclick="window.location.href='inicio.php'">Registrarme</button>

    </form>
  </div>

  <script>
    
    
 
</script>

</body>
</html>