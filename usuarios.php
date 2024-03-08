<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/sy.css">
    <title>Tabla de Clientes</title>
</head>
<body>
<div class="navbar">
    <div class="left-links">
        <a href="index.php">Inicio</a>
        <a href="usuarios.php">Registros</a>
        <a href="eventos.php">Eventos</a>
    </div>
    <?php
    // Iniciar sesión si no está iniciada
    session_start();

    // Verificar si el usuario ha iniciado sesión
    if (isset($_SESSION['usuario'])) {
        echo "<div class='usuario'>Usuario: {$_SESSION['usuario']}</div>";
        echo "<a href='cerrarSe.php' class='cerrar-sesion'>Cerrar sesión</a>";
    }
    ?>
</div>

<h2 class="h2">Registros de Clientes</h2>
<div class="table-container">
    <table border="2">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Edad</th>
            <th>Número</th>
            <th>Usuario</th>
            <th>Correo</th>
            <th>Fecha de Nacimiento</th>
            <th>Acciones</th>
        </tr>
        <?php
        include('conexion.php');
        $conexion = conexion();

        $query = "SELECT * FROM clientes";
        $result = mysqli_query($conexion, $query);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['nombre']."</td>";
                echo "<td>".$row['apellido']."</td>";
                echo "<td>".$row['edad']."</td>";
                echo "<td>".$row['numero']."</td>";
                echo "<td>".$row['usuario']."</td>";
                echo "<td>".$row['correo']."</td>";
                echo "<td>".$row['F_nacimiento']."</td>";
                echo "<td>
                    <a href='update.php?id={$row['id']}' class='my-button'>Editar</a>
                    <a href='delete.php?id={$row['id']}' class='my-button' onclick='return confirmar()'>Eliminar</a>
                          </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='10'>Error al consultar la base de datos: " . mysqli_error($conexion) . "</td></tr>";
            
        }

        mysqli_close($conexion);
        ?>
    </table>
</div>
</body>
<script src="script.js"></script>
</html>
