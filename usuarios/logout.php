<?php
session_start();
session_unset(); // limpiar todas las variables de sesión
session_destroy(); // destruir la sesión
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sesión cerrada - PETRICOR</title>
  <style>
    /* Fondo verde degradado */
    body {
      margin: 0;
      min-height: 100vh;
      background: linear-gradient(135deg, #4CAF50, #81C784);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #fff;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      overflow: hidden;
      position: relative;
    }
    h1 {
      font-size: 3rem;
      margin-bottom: 0.3em;
      text-shadow: 0 0 10px #2e7d32;
    }
    p {
      font-size: 1.3rem;
      margin-bottom: 2em;
      text-align: center;
      max-width: 400px;
      text-shadow: 0 0 5px #2e7d32;
    }
    .btn-container {
      display: flex;
      gap: 1.5em;
    }
    a.button {
      background-color: #2e7d32;
      padding: 0.9em 2em;
      border-radius: 30px;
      color: #c8e6c9;
      font-weight: 600;
      text-decoration: none;
      box-shadow: 0 4px 10px rgba(0,0,0,0.3);
      transition: background-color 0.3s ease, color 0.3s ease;
    }
    a.button:hover {
      background-color: #81c784;
      color: #1b5e20;
    }

    /* Mariposas flotantes (usando emojis como ejemplo) */
    .butterfly {
      position: absolute;
      font-size: 3rem;
      animation: float 6s ease-in-out infinite;
      user-select: none;
      opacity: 0.8;
      color: #a5d6a7;
    }
    .butterfly:nth-child(1) {
      top: 15%;
      left: 10%;
      animation-delay: 0s;
    }
    .butterfly:nth-child(2) {
      top: 30%;
      right: 15%;
      animation-delay: 2s;
    }
    .butterfly:nth-child(3) {
      bottom: 20%;
      left: 20%;
      animation-delay: 4s;
    }

    /* Animación de flotación */
    @keyframes float {
      0%, 100% { transform: translateY(0) translateX(0); }
      50% { transform: translateY(-20px) translateX(15px); }
    }

    /* Gotas de lluvia */
    .drop {
      position: absolute;
      width: 6px;
      height: 20px;
      background: #b9f6ca;
      border-radius: 3px;
      animation: dropfall linear infinite;
      opacity: 0.6;
      filter: drop-shadow(0 0 2px #80cbc4);
    }
    .drop:nth-child(4) {
      top: 10%;
      left: 25%;
      animation-duration: 3s;
      animation-delay: 0s;
    }
    .drop:nth-child(5) {
      top: 40%;
      left: 50%;
      animation-duration: 4s;
      animation-delay: 1s;
    }
    .drop:nth-child(6) {
      top: 70%;
      left: 70%;
      animation-duration: 5s;
      animation-delay: 2s;
    }

    @keyframes dropfall {
      0% { transform: translateY(0); opacity: 0.6; }
      100% { transform: translateY(100vh); opacity: 0; }
    }
  </style>
</head>
<body>
  <!-- Mariposas -->
  <div class="butterfly" aria-hidden="true">🦋</div>
  <div class="butterfly" aria-hidden="true">🦋</div>
  <div class="butterfly" aria-hidden="true">🦋</div>

  <!-- Gotas -->
  <div class="drop" aria-hidden="true"></div>
  <div class="drop" aria-hidden="true"></div>
  <div class="drop" aria-hidden="true"></div>

  <h1>¡Hasta pronto! 🌿</h1>
  <p>Has cerrado sesión exitosamente en PETRICOR. ¡Gracias por visitarnos!</p>

  <div class="btn-container">
    <a href="/PETRICOR/usuarios.html" class="button">Registrarse</a>
<a href="/PETRICOR/inicio.html" class="button">Volver a Inicio</a>

  </div>
</body>
</html>


