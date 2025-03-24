<?php
include 'conexion.php'; // Incluir la conexión a la base de datos

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = $_POST['password'];

// Cifrar la contraseña
$password_cifrado = password_hash($password, PASSWORD_DEFAULT);

// Consulta para insertar el nuevo usuario
$sql = "INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre', '$email', '$password_cifrado')";

if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso. ¡Bienvenido!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close(); // Cerrar conexión
?>