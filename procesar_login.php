<?php
include('conexion.php');
$conexion = conexion();

// Recuperar los datos del formulario
$usuario = $_POST['user'];
$contraseña = sha1($_POST['contra']);

// Consulta para verificar las credenciales
$query = "SELECT * FROM clientes WHERE usuario='$usuario' AND pass='$contraseña'";
$resultado = mysqli_query($conexion, $query);

if (mysqli_num_rows($resultado) == 1) {
    // Inicio de sesión exitoso
    session_start();
    $_SESSION['usuario'] = $usuario;
    header('Location: index.php'); // Redirigir a la página de inicio después del inicio de sesión
} else {
    // Si las credenciales son incorrectas
    echo "<p>Nombre de usuario o contraseña incorrectos.</p>";
}

mysqli_close($conexion);
?>
