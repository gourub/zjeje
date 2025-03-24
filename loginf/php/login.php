<?php
include 'conexion.php'; // Incluir la conexión a la base de datos

// Obtener datos del formulario
$email = $_POST['email'];
$password = $_POST['password'];

// Consulta para obtener el usuario
$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Obtener los datos del usuario
    $usuario = $result->fetch_assoc();
    $password_cifrado = $usuario['password'];

    // Verificar la contraseña
    if (password_verify($password, $password_cifrado)) {
        echo "Inicio de sesión exitoso. ¡Bienvenido!";
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "El usuario no existe.";
}

$conn->close(); // Cerrar conexión
?>