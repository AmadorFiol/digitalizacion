<?php
//Configuració conexion
$servername = "test-amador-test-amador.g.aivencloud.com";
$username = "avnadmin";
$password = "AVNS_bjTACm6K5hQk8pK5y0U";
$database = "digitalizacion";
$port = 27378;

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database, $port);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];

// Inserción datos
$sql = "INSERT INTO usuarios (nombre, correo) VALUES (?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("ss", $nombre, $correo);
    if ($stmt->execute()) {
        echo "Datos guardados correctamente.";
    } else {
        echo "Error al guardar los datos: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Error en la preparación de la consulta: " . $conn->error;
}

// Cerrar conexión
$conn->close();
?>
