<?php
$servername="localhost";
$username="root";
$password="";
$dbname="proyecto";

$conn=new mysqli($servername, $username,$password, $dbname);

if($conn->connect_error){
    die("conexion fallida:". $conn->connect_error);
}
if($_SERVER["REQUEST_METHOD"]== "POST"){
    $Nombre_del_libro=$_POST["Titulo_del_libro"];
    $Genero=$_POST["Genero"];
    $Autor=$_POST["Autor"];
    $solicitante=$_POST["Nombre_del_solicitante"];


    $sql="INSERT INTO solicitarlibro(Titulo_del_libro,Genero,Autor,Nombre_del_solicitante)VALUES('$Nombre_del_libro','$Genero','$Autor','$solicitante')";

    if($conn->query($sql)=== TRUE){
        echo"Libro registrado con exito!";
        
    }else{
        echo "Error al regsitar libro:". $conn->error;
    }
}
$conn->close();
?>