<?php
session_start();
$conexion = new mysqli("localhost", "root", "", "basededatospetricor");

if ($conexion->connect_error) {
    die("❌ Conexión fallida: " . $conexion->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $apellidos = $_POST['apellidos'] ?? '';
    $edad = (int) ($_POST['edad'] ?? 0);
    $correo = $_POST['correo'] ?? '';
    $rol = $_POST['rol'] ?? '';

    if ($nombre && $apellidos && $edad > 0 && $correo && $rol) {
        $verificar = $conexion->prepare("SELECT id FROM usuarios WHERE correo = ?");
        $verificar->bind_param("s", $correo);
        $verificar->execute();
        $verificar->store_result();

        if ($verificar->num_rows > 0) {
            header("Location: error_correo_existente.php");
            exit();
        } else {
            $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, apellidos, edad, correo, rol) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("ssiss", $nombre, $apellidos, $edad, $correo, $rol);
            if ($stmt->execute()) {
                // Obtener los datos recién insertados
                $id_nuevo = $stmt->insert_id;
                $usuario_resultado = $conexion->query("SELECT * FROM usuarios WHERE id = $id_nuevo");
                $usuario = $usuario_resultado->fetch_assoc();

                $_SESSION['usuario'] = $usuario;

                header("Location: usuarios/perfil.php");
                exit();
            } else {
                header("Location: error_insercion.php");
                exit();
            }
        }
    } else {
        header("Location: error_campos.php");
        exit();
    }
} else {
    header("Location: metodo_no_permitido.php");
    exit();
}



