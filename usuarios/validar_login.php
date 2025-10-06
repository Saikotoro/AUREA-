<?php
session_start();

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "1234", "basededatospetricor");

if ($conexion->connect_error) {
    die("❌ Conexión fallida: " . $conexion->connect_error);
}

// Verificar si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'] ?? '';

    if (!empty($correo)) {
        // Buscar al usuario por su correo
        $stmt = $conexion->prepare("SELECT id, nombre, apellidos, edad, correo, rol FROM usuarios WHERE correo = ?");
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            $usuario = $resultado->fetch_assoc();

            // Guardar los datos en la sesión
            $_SESSION['usuario'] = $usuario;

            // Redirigir a perfil
            header("Location:perfil.php");
            exit();
        } else {
            // Si no existe el correo, redirigir a error
            header("Location: login_error.html");
            exit();
        }
    } else {
        header("Location: login_error.html");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}



