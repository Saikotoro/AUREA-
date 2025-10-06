<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../login.php");
    exit();
}

// Conexión
$conexion = new mysqli("localhost", "root", "", "basededatospetricor");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$usuario = $_SESSION['usuario'];
$id = $usuario['id'];

// Datos enviados
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$edad = $_POST['edad'];
$correo = $_POST['correo'];
$rol = $_POST['rol'];

// Foto actual (por si no sube nueva)
$foto = isset($usuario['foto']) ? $usuario['foto'] : null;

// Si sube una nueva foto
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {
    $nombreFoto = uniqid() . "_" . basename($_FILES["foto"]["name"]);
    $rutaDestino = "../img/perfiles/" . $nombreFoto;

    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $rutaDestino)) {
        $foto = $nombreFoto; // guardamos el nombre en DB
    }
}

// Actualizar en la base de datos
$stmt = $conexion->prepare("UPDATE usuarios SET nombre=?, apellidos=?, edad=?, correo=?, rol=?, foto=? WHERE id=?");
$stmt->bind_param("ssisssi", $nombre, $apellidos, $edad, $correo, $rol, $foto, $id);

if ($stmt->execute()) {
    // Actualizar sesión
    $_SESSION['usuario'] = [
        'id' => $id,
        'nombre' => $nombre,
        'apellidos' => $apellidos,
        'edad' => $edad,
        'correo' => $correo,
        'rol' => $rol,
        'foto' => $foto
    ];
    header("Location: perfil.php");
    exit();
} else {
    echo "❌ Error al actualizar: " . $conexion->error;
}

