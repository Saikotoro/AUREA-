<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../login.php");
    exit();
}
$usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Editar Perfil - PETRICOR</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;800&display=swap" rel="stylesheet" />
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #f0f9ff, #cce7e8);
      color: #0a3d2f;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .editar-container {
      background: #fff;
      padding: 2rem 2.5rem;
      border-radius: 20px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
      max-width: 500px;
      width: 100%;
    }

    h2 {
      text-align: center;
      font-size: 2rem;
      margin-bottom: 1.5rem;
    }

    label {
      display: block;
      margin: 1rem 0 .5rem;
      font-weight: 600;
    }

    input, select {
      width: 100%;
      padding: .6rem;
      border: 1px solid #ccc;
      border-radius: 10px;
      font-size: 1rem;
    }

    .botones {
      margin-top: 2rem;
      display: flex;
      justify-content: space-between;
    }

    .botones button, .botones a {
      background: #48b78e;
      color: white;
      border: none;
      padding: .7rem 1.5rem;
      border-radius: 30px;
      font-weight: bold;
      cursor: pointer;
      text-decoration: none;
      transition: background .3s;
    }

    .botones button:hover, .botones a:hover {
      background: #2f7b5a;
    }
  </style>
</head>
<body>

<div class="editar-container">
  <h2>Editar Perfil 🌿</h2>
  <form action="guardar_cambios.php" method="POST" enctype="multipart/form-data">
    <label>Nombre:</label>
    <input type="text" name="nombre" required value="<?php echo htmlspecialchars($usuario['nombre']); ?>">

    <label>Apellidos:</label>
    <input type="text" name="apellidos" required value="<?php echo htmlspecialchars($usuario['apellidos']); ?>">

    <label>Edad:</label>
    <input type="number" name="edad" min="1" required value="<?php echo htmlspecialchars($usuario['edad']); ?>">

    <label>Correo:</label>
    <input type="email" name="correo" required value="<?php echo htmlspecialchars($usuario['correo']); ?>">

    <label>Rol:</label>
    <select name="rol" required>
      <?php
        $roles = ['agricultor', 'docente', 'estudiante', 'otro'];
        foreach ($roles as $rol) {
          $selected = $usuario['rol'] === $rol ? 'selected' : '';
          echo "<option value=\"$rol\" $selected>" . ucfirst($rol) . "</option>";
        }
      ?>
    </select>

    <label>Foto de perfil (opcional):</label>
    <input type="file" name="foto">

    <div class="botones">
      <button type="submit">💾 Guardar cambios</button>
      <a href="perfil.php">🔙 Volver</a>
    </div>
  </form>
</div>

</body>
</html>



