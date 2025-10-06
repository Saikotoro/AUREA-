<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../login.php");
    exit();
}

$usuario = $_SESSION['usuario'];
$foto = isset($usuario['foto']) && $usuario['foto'] ? "../img/perfiles/" . $usuario['foto'] : "https://cdn-icons-png.flaticon.com/512/847/847969.png";
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Perfil - PETRICOR</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../css/estilos.css">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      background: linear-gradient(135deg, #c1f0e3, #f0fcff);
      color: #0a3d2f;
      min-height: 100vh;
      overflow-x: hidden;
      position: relative;
    }

    nav {
      background: #0a3d2f;
      padding: 1rem 2rem;
      position: sticky;
      top: 0;
      z-index: 999;
    }

    nav ul {
      display: flex;
      justify-content: center;
      gap: 2rem;
      list-style: none;
      margin: 0;
      padding: 0;
    }

    nav a {
      color: #c2e9fb;
      font-weight: 600;
      font-size: 1.1rem;
      text-decoration: none;
      padding: .25rem .5rem;
      border-radius: 6px;
      transition: background .3s;
    }

    nav a:hover,
    nav a.active {
      background: #48b78e;
      color: #fff;
    }

    .perfil-container {
      max-width: 600px;
      margin: 5vh auto;
      background: #ffffffdd;
      border-radius: 25px;
      padding: 2.5rem;
      box-shadow: 0 10px 30px rgba(0, 0, 0, .2);
      text-align: center;
      position: relative;
      z-index: 2;
    }

    h1 {
      font-size: 2.5rem;
      color: #0a3d2f;
      margin-bottom: 1rem;
    }

    .perfil-container p {
      font-size: 1.2rem;
      margin: .5rem 0;
      color: #2f7b5a;
    }

    .foto-perfil {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      object-fit: cover;
      border: 4px solid #48b78e;
      margin-bottom: 1.5rem;
    }

    .botones {
      margin-top: 2rem;
    }

    .botones a, .botones button {
      display: inline-block;
      margin: 0.5rem;
      padding: 0.8rem 1.5rem;
      border-radius: 30px;
      font-size: 1rem;
      font-weight: bold;
      text-decoration: none;
      background: #48b78e;
      color: white;
      box-shadow: 0 5px 15px rgba(72, 183, 142, .4);
      transition: background .3s;
      border: none;
      cursor: pointer;
    }

    .botones a:hover, .botones button:hover {
      background: #2f7b5a;
    }

    .mariposa, .flor {
      position: absolute;
      width: 60px;
      animation: flotar 8s infinite ease-in-out;
      z-index: 1;
    }

    .mariposa { top: 40px; left: 20px; }
    .flor { bottom: 40px; right: 30px; }

    @keyframes flotar {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-15px); }
    }
  </style>
</head>
<body>
  <nav>
    <ul>
      <li><a href="../inicio.html">Inicio</a></li>
      <li><a href="../prototipo.html">Prototipo</a></li>
      <li><a href="../materiales.html">Materiales</a></li>
      <li><a href="../beneficios.html">Beneficios</a></li>
      <li><a href="../agrotradicional.html">Agro Tradicional</a></li>
      <li><a href="../nosotros.html">Nosotros</a></li>
      <li><a href="perfil.php" class="active">Perfil</a></li>
    </ul>
  </nav>

  <!-- Decoración -->
  <img src="https://cdn-icons-png.flaticon.com/512/616/616494.png" class="mariposa" alt="Decoración mariposa">
  <img src="https://cdn-icons-png.flaticon.com/512/616/616430.png" class="flor" alt="Decoración flor">

  <!-- Perfil -->
  <div class="perfil-container">
    <h1>¡Hola, <?php echo htmlspecialchars($usuario['nombre']); ?>! 🌸</h1>

    <img src="<?php echo $foto; ?>" alt="Foto de perfil" class="foto-perfil" />

    <p><strong>Nombre:</strong> <?php echo htmlspecialchars($usuario['nombre']); ?></p>
    <p><strong>Apellidos:</strong> <?php echo htmlspecialchars($usuario['apellidos']); ?></p>
    <p><strong>Edad:</strong> <?php echo htmlspecialchars($usuario['edad']); ?> años</p>
    <p><strong>Correo:</strong> <?php echo htmlspecialchars($usuario['correo']); ?></p>
    <p><strong>Rol:</strong> <?php echo ucfirst(htmlspecialchars($usuario['rol'])); ?></p>

    <div class="botones">
      <a href="editar_usuario.php">✏️ Editar perfil</a>
      <form action="logout.php" method="POST" style="display:inline;">
        <button type="submit">🚪 Cerrar sesión</button>
      </form>
    </div>
  </div>
</body>
</html>



