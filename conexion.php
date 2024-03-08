<?php
  

 
  function conexion(){
      $mysqli_conexion = new mysqli("localhost", "root", "", "register");
      if($mysqli_conexion->connect_errno){
          echo "Error al conectarse con la base de datos: " . $mysqli_conexion->connect_error;
          exit;
      }
      return $mysqli_conexion;
  }

function insertar_registro_evento($accion, $detalles, $ip) {
  $conexion = conexion(); // llama conexion() que devuelve la conexión a la base de datos

  $accion = $conexion->real_escape_string($accion);
  $detalles = $conexion->real_escape_string($detalles);
  $ip = $conexion->real_escape_string($ip);

  $query = "INSERT INTO eventos (accion, detalles, ip) VALUES ('$accion', '$detalles', '$ip')";

  if ($conexion->query($query) === TRUE) {
      echo "Registro de evento insertado correctamente.";
  } else {
      echo "Error al insertar el registro de evento: " . $conexion->error;
  }

  $conexion->close();
}

?>
