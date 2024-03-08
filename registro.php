<?php

include ('conexion.php');
$conexion  = conexion();

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$edad = $_POST['edad'];
$numero = $_POST['numero'];
$usuario = $_POST['usuario'];
$pass = sha1($_POST['pass']);
$correo = $_POST['correo'];
$F_nacimiento = $_POST['F_nacimiento'];

$query = "INSERT INTO clientes( nombre, apellido, edad, numero, usuario, pass, correo, F_nacimiento) VALUES ('$nombre', '$apellido', '$edad', '$numero', '$usuario', '$pass', '$correo', '$F_nacimiento')";

if(mysqli_query($conexion, $query)){
    echo "<p>Registro exitoso</p>";

    // Obtener la dirección IP del cliente
    $ip = $_SERVER['REMOTE_ADDR'];

    // Insertar registro de evento
    $accion = "Insercion de cliente";
    $detalles = "Se ha insertado un nuevo cliente con nombre: $nombre y apellido: $apellido";
    insertar_registro_evento($accion, $detalles, $ip);

    header('Location:./index.php');
}
else{
    echo "<p>Hubo un error al ejecutar la sentencia de insercion <br>($conexion->error)</p>";
}

$conexion = close();

?>
