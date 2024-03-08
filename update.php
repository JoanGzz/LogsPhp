<?php
include("conexion.php");
$conexion = conexion();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesar el formulario de editar usuario
    $id = $_POST["id"];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $numero = $_POST['numero'];
    $usuario = $_POST['usuario'];
    $correo = $_POST['correo'];
    $F_nacimiento = $_POST['F_nacimiento'];

    // Obtener los valores anteriores del usuario
    $query_antiguo = "SELECT * FROM clientes WHERE id='$id'";
    $result_antiguo = mysqli_query($conexion, $query_antiguo);
    $fila_antigua = mysqli_fetch_assoc($result_antiguo);

    // Realizar la actualización
    $query = "UPDATE clientes SET nombre='$nombre', apellido='$apellido', edad='$edad', numero='$numero', usuario='$usuario', pass='$pass', correo='$correo', F_nacimiento='$F_nacimiento' WHERE id='$id'";
    $result = mysqli_query($conexion, $query);
    if ($result) {
        // Comparar valores antiguos y nuevos para obtener detalles de actualización
        $detalles = "Se ha actualizado el usuario con ID: $id";
        foreach ($fila_antigua as $campo => $valor_antiguo) {
            $valor_nuevo = $$campo; // Obtener el valor nuevo de la variable
            if ($valor_antiguo != $valor_nuevo) {
                $detalles .= ", En el campo '$campo', Se cambio el valor: '$valor_antiguo' por '$valor_nuevo'";
            }
        }
        
        // Registro del evento de actualización
        $accion = "Actualizacion de usuario";
        $ip = $_SERVER['REMOTE_ADDR'];
        insertar_registro_evento($accion, $detalles, $ip);

        header("Location: usuarios.php");
        exit();
    } else {
        echo "Error al editar el usuario: " . mysqli_error($conexion);
    }
} elseif (isset($_GET["id"])) {

    $id = $_GET["id"];
    $query = "SELECT * FROM clientes WHERE id='$id'";
    $result = mysqli_query($conexion, $query);

    if ($result && mysqli_num_rows($result) == 1) {
       
        $fila = mysqli_fetch_assoc($result);
        $nombre = $fila["nombre"];
        $apellido = $fila["apellido"];
        $edad = $fila["edad"];
        $numero = $fila["numero"];
        $usuario = $fila["usuario"];
        $correo = $fila["correo"];
        $F_nacimiento = $fila["F_nacimiento"];
        
    } else {
        echo "Error al obtener datos del usuario: " . mysqli_error($conexion);
        exit();
    }
} else {
    header("Location: usuarios.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/stUp.css">
    <title>Editar usuario</title>
</head>
<body>
    <div class="container">
        <h2>Editar usuario</h2>
        <form method="post" action="update.php">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $apellido; ?>" required>
            </div>
            <div class="form-group">
                <label for="edad">Edad:</label>
                <input type="number" class="form-control" id="edad" name="edad" value="<?php echo $edad; ?>" required>
            </div>
            <div class="form-group">
                <label for="numero">Numero:</label>
                <input type="number" class="form-control" id="numero" name="numero" value="<?php echo $numero; ?>" required>
            </div>
            <div class="form-group">
                <label for="usuario">Usuario:</label>
                <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $usuario; ?>" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $correo; ?>" required>
            </div>
            <div class="form-group">
                <label for="F_nacimiento">F. Nacimiento:</label>
                <input type="date" class="form-control" id="F_nacimiento" name="F_nacimiento" value="<?php echo $F_nacimiento; ?>" required>
            </div>
            <div class="butt">
            <button type="submit" class="btn btn-primary" onclick='return confirmar()'>Guardar Cambios</button>
            
            <a href="usuarios.php" class="btn btn-secondary">Volver</a>
            </div>
        </form>
        
    </div>
</body>
</html>
<script src="script.js"></script>
