<?php
include('conexion.php');
$conexion = conexion();

if (isset($_GET["id"])) {
    // Eliminar el usuario
    $id = $_GET["id"];
    $query = "DELETE FROM clientes WHERE id='$id'";
    $result = mysqli_query($conexion, $query);

    if ($result) {
        // Registro del evento de eliminación
        $accion = "Eliminación de usuario";
        $detalles = "Se ha eliminado el usuario con ID: $id";
        $ip = $_SERVER['REMOTE_ADDR'];
        insertar_registro_evento($accion, $detalles, $ip);

        header("Location: usuarios.php");
        exit();
    } else {
        echo "Error al eliminar el cliente: " . mysqli_error($conexion);
    }
} else {
    header("Location: usuarios.php");
    exit();
}
?>
