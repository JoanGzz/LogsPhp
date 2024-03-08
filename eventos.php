<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Eventos</title>
    <link rel="stylesheet" href="style/sy.css">
</head>
<body>
    <div class="navbar">
    <a href="index.php">Inicio</a>
    <a href="usuarios.php">Registros</a>
    <a href="eventos.php">Eventos</a>
    </div>
    <h2 style="text-align: center";>Lista de Eventos Registrados</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Acción</th>
                <th>Detalles</th>
                <th>IP</th>
                <th>Fecha y Hora</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include('conexion.php');
            $conexion = conexion();

            $query = "SELECT * FROM eventos";
            $result = mysqli_query($conexion, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['accion'] . "</td>";
                    echo "<td>" . $row['detalles'] . "</td>";
                    echo "<td>" . $row['ip'] . "</td>";
                    echo "<td>" . $row['fecha_hora'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No se encontraron eventos registrados.</td></tr>";
            }

            mysqli_close($conexion);
            ?>
        </tbody>
    </table>
</body>
</html>
