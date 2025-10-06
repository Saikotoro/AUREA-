<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'] ?? '';
    $nombre = explode("@", $correo)[0]; // usamos la parte antes del @ como nombre de demo
} else {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Bienvenido a PETRICOR 🌿</title>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500;700&family=Pacifico&display=swap" rel="stylesheet">

  <style>
    body {
      margin: 0;
      font-family: 'Quicksand', sans-serif;
      min-height: 100vh;
      background: linear-gradient(135deg, #a8edea, #fed6e3, #d4fc79, #96e6a1);
      background-size: 400% 400%;
      animation: fondo 12s ease infinite;
      display: flex;
      justify-content: center;
      align-items: center;
      overflow: hidden;
      color: #2c3e50;
    }

    @keyframes fondo {
      0% {background-position: 0% 50%;}
      50% {background-position: 100% 50%;}
      100% {background-position: 0% 50%;}
    }

    .caja {
      background: rgba(255, 255, 255, 0.9);
      padding: 3rem 4rem;
      border-radius: 30px;
      box-shadow: 0 10px 40px rgba(0,0,0,0.2);
      text-align: center;
      position: relative;
      z-index: 2;
      animation: aparecer 1s ease-in-out;
    }

    .caja h1 {
      font-family: 'Pacifico', cursive;
      font-size: 3rem;
      margin-bottom: 1rem;
      color: #1e5631;
    }

    .caja p {
      font-size: 1.3rem;
      margin-bottom: 2rem;
    }

    a.boton {
      display: inline-block;
      margin: 0.5rem;
      padding: 1rem 2rem;
      background: linear-gradient(45deg, #4caf50, #81c784);
      color: white;
      border-radius: 30px;
      font-weight: bold;
      text-decoration: none;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    a.boton:hover {
      transform: scale(1.08);
      box-shadow: 0 8px 25px rgba(72,183,142,0.6);
    }

    @keyframes aparecer {
      from {opacity: 0; transform: translateY(40px);}
      to {opacity: 1; transform: translateY(0);}
    }

    /* Stickers */
    .sticker {
      position: absolute;
      width: 100px;
      opacity: 0.8;
      z-index: 1;
      animation: flotar 6s ease-in-out infinite;
    }

    .planta {top: 10%; left: 5%;}
    .gota {bottom: 8%; right: 10%;}
    .sol {top: 5%; right: 15%;}
    .mariposa {bottom: 12%; left: 20%; animation-duration: 9s;}

    @keyframes flotar {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-20px); }
    }

    /* Burbujas decorativas */
    .burbuja {
      position: absolute;
      bottom: -150px;
      background: rgba(255,255,255,0.4);
      border-radius: 50%;
      animation: subir 20s infinite;
    }
    @keyframes subir {
      0% {transform: translateY(0) scale(0);}
      50% {transform: translateY(-50vh) scale(1);}
      100% {transform: translateY(-100vh) scale(0);}
    }
  </style>
</head>
<body>

  <!-- Stickers decorativos -->
  <img src="img/mariposa2.gif" class="sticker planta" alt="Sticker planta">
  <img src="img/hojas-cayendo.webp" class="sticker gota" alt="Sticker gota">
  <img src="img/mariposa1.gif" class="sticker sol" alt="Sticker sol">
  <img src="img/hojas-cayendo.webp" class="sticker mariposa" alt="Sticker mariposa">

  <!-- Caja central -->
  <div class="caja">
    <h1>¡Bienvenido a PETRICOR 🌿!</h1>
    <p>Hola <strong><?php echo htmlspecialchars($nombre); ?></strong>, tu correo es:<br><em><?php echo htmlspecialchars($correo); ?></em></p>
    <a href="usuarios/perfil.php" class="boton">Ir a tu perfil</a>
    <a href="inicio.html" class="boton">Ir al inicio</a>
  </div>

  <!-- Burbujas generadas -->
  <?php for($i=0;$i<12;$i++): ?>
    <div class="burbuja"
      style="
        width: <?=rand(20,60)?>px;
        height: <?=rand(20,60)?>px;
        left: <?=rand(0,100)?>%;
        animation-duration: <?=rand(12,25)?>s;
        animation-delay: <?=rand(0,10)?>s;">
    </div>
  <?php endfor; ?>

</body>
</html>

