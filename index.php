<?php
include 'conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
   
    <title>Alta de clientes</title>
</head>
<body>

<div class="navbar">
    <a href="index.php">Inicio</a>
    <a href="usuarios.php">Registros</a>
    <a href="eventos.php">Eventos</a>
</div>

<div class="container">
    
    <form method="post" action="registro.php" id="form" name="form">
    <h2>Rellena los campos con tus datos</h2>
        <label for="nombre">Nombre (s):</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="apellido">Apellido (s):</label>
        <input type="text" id="apellido" name="apellido" required>

        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" min="0" max="99" required>

        <label for="numero">Número telefónico:</label>
        <input type="tel" id="numero" name="numero" minlength="10" maxlength="10" required>

        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required>

        <label for="pass">Contraseña:</label>
        <input type="password" id="pass" name="pass" required>
        <input type="button" class="btn" id="mostrar" value="Mostrar" onclick="mostrarContraseña()">

        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="correo" required>

        <label for="F_nacimiento">Fecha de nacimiento:</label>
        <input type="date" id="F_nacimiento" name="F_nacimiento" required>

        <button id="guardar" name="guardar">Continuar</button>
    </form>
</div>

</body>
<script src="script.js"></script>
</html>
