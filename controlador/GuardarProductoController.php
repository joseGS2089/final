<?php
// Función para validar y procesar los datos del formulario
function procesarFormulario($nombre, $descripcion, $acciones) {
    // Verifica si todos los campos están presentes
    if (!isset($nombre) || !isset($descripcion) || !isset($acciones)) {
        return "Todos los campos son requeridos.";
    }

    // Conecta con la base de datos (asumiendo que ya tienes una conexión establecida)
    $conexion = new mysqli("127.0.0.1", "root", "", "proyecto");

    // Verifica si la conexión fue exitosa
    if ($conexion->connect_error) {
        return "Error de conexión: " . $conexion->connect_error;
    }

    // Prepara la consulta SQL para insertar los datos en la tabla
    $sql = "INSERT INTO producto (nombre, descripcion, acciones) VALUES (?, ?, ?)";
    $stmt = $conexion->prepare($sql);

    // Verifica si la preparación de la consulta fue exitosa
    if ($stmt === false) {
        return "Error al preparar la consulta: " . $conexion->error;
    }

    // Vincula las variables a la consulta preparada
    $stmt->bind_param("sss", $nombre, $descripcion, $acciones);

    // Ejecuta la consulta y verifica si fue exitosa
    if ($stmt->execute()) {
        return "datos agregados";
    } else {
        return "Error al ingresar datos: " . $stmt->error;
    }

    // Cierra la conexión
    $stmt->close();
    $conexion->close();
}

// Verifica si se han enviado datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesa el formulario y muestra el resultado
    echo procesarFormulario($_POST['nombre'], $_POST['descripcion'], $_POST['acciones']);
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>