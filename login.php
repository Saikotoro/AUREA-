<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Iniciar Sesión - PETRICOR 🌿</title>
  <style>
    /* Reset básico */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      min-height: 100vh;
      background: linear-gradient(135deg, #2e7d32, #81c784);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #e8f5e9;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 2rem;
      position: relative;
      user-select: none;
      overflow: hidden;
    }

    /* Contenedor principal */
    .login-container {
      background: rgba(46, 125, 50, 0.85);
      padding: 3rem 4rem;
      border-radius: 25px;
      box-shadow:
        0 0 20px #4caf50,
        0 0 40px #81c784,
        0 0 60px #66bb6a;
      max-width: 420px;
      width: 100%;
      text-align: center;
      position: relative;
      z-index: 10;
    }

    /* Título */
    .login-container h1 {
      font-size: 3rem;
      margin-bottom: 1rem;
      font-weight: 900;
      text-shadow: 0 0 15px #1b5e20;
      letter-spacing: 3px;
      user-select: text;
    }

    /* Texto */
    .login-container p {
      font-size: 1.3rem;
      margin-bottom: 2rem;
      text-shadow: 0 0 8px #2e7d32;
      user-select: text;
    }

    /* Formulario */
    form {
      display: flex;
      flex-direction: column;
      gap: 1.5rem;
    }

    label {
      font-weight: 600;
      font-size: 1.1rem;
      margin-bottom: 0.3rem;
      user-select: text;
    }

    input[type="email"] {
      padding: 0.9rem 1rem;
      border-radius: 30px;
      border: none;
      font-size: 1.1rem;
      outline: none;
      box-shadow: inset 0 0 8px #81c784;
      transition: box-shadow 0.3s ease;
    }
    input[type="email"]:focus {
      box-shadow: 0 0 15px #4caf50;
    }

    button {
      background: linear-gradient(45deg, #4caf50, #81c784);
      color: #e8f5e9;
      font-weight: 700;
      font-size: 1.3rem;
      padding: 1rem 0;
      border-radius: 40px;
      border: none;
      cursor: pointer;
      box-shadow:
        0 4px 15px rgba(67,160,71,0.7),
        inset 0 -3px 0 #2e7d32;
      transition: background 0.3s ease, box-shadow 0.3s ease, transform 0.3s ease;
      user-select: none;
      position: relative;
      overflow: hidden;
    }
    button::before {
      content: "";
      position: absolute;
      width: 120%;
      height: 100%;
      top: 0;
      left: -120%;
      background: rgba(255,255,255,0.15);
      transform: skewX(-20deg);
      transition: left 0.5s ease;
      pointer-events: none;
      border-radius: 40px;
    }
    button:hover::before {
      left: 120%;
    }
    button:hover {
      background: linear-gradient(45deg, #81c784, #4caf50);
      box-shadow:
        0 6px 25px rgba(129,199,132,0.9),
        inset 0 -5px 0 #1b5e20;
      transform: scale(1.05);
      color: #d0f0c0;
    }

    /* Enlaces adicionales */
    .links {
      margin-top: 2rem;
      font-size: 1rem;
      user-select: text;
    }
    .links a {
      color: #c8e6c9;
      font-weight: 600;
      text-decoration: none;
      transition: color 0.3s ease;
    }
    .links a:hover {
      color: #a5d6a7;
      text-decoration: underline;
    }

    /* Mariposas flotantes */
    .butterfly {
      position: fixed;
      font-size: 3.5rem;
      user-select: none;
      opacity: 0.8;
      filter: drop-shadow(0 0 2px #aed581);
      animation: flutter 7s ease-in-out infinite;
      z-index: 5;
    }
    .butterfly:nth-child(1) {
      top: 20%;
      left: 5%;
      animation-delay: 0s;
    }
    .butterfly:nth-child(2) {
      top: 40%;
      right: 10%;
      animation-delay: 3s;
      animation-direction: reverse;
    }
    .butterfly:nth-child(3) {
      bottom: 15%;
      left: 15%;
      animation-delay: 5s;
    }
    @keyframes flutter {
      0%, 100% { transform: translateY(0) translateX(0) rotate(0deg); }
      25% { transform: translateY(-15px) translateX(15px) rotate(10deg); }
      50% { transform: translateY(0) translateX(30px) rotate(-10deg); }
      75% { transform: translateY(-15px) translateX(15px) rotate(10deg); }
    }

    /* Gotas de lluvia */
    .drop {
      position: fixed;
      width: 6px;
      height: 18px;
      background: linear-gradient(180deg, #b9f6ca 0%, #4caf50 100%);
      border-radius: 3px;
      animation: dropFall linear infinite;
      opacity: 0.6;
      filter: drop-shadow(0 0 4px #a5d6a7);
      z-index: 4;
    }
    .drop:nth-child(4) {
      top: 15%;
      left: 30%;
      animation-duration: 4.2s;
      animation-delay: 0s;
    }
    .drop:nth-child(5) {
      top: 50%;
      left: 60%;
      animation-duration: 5.1s;
      animation-delay: 1.2s;
    }
    .drop:nth-child(6) {
      top: 80%;
      left: 80%;
      animation-duration: 6.4s;
      animation-delay: 2.5s;
    }
    @keyframes dropFall {
      0% {
        transform: translateY(-50px);
        opacity: 0.6;
      }
      100% {
        transform: translateY(110vh);
        opacity: 0;
      }
    }

    /* Responsive */
    @media (max-width: 480px) {
      .login-container {
        padding: 2rem 2rem;
      }
      .login-container h1 {
        font-size: 2.4rem;
      }
      input[type="email"] {
        font-size: 1rem;
      }
      button {
        font-size: 1.1rem;
      }
    }
  </style>
</head>
<body>
  <!-- Mariposas -->
  <div class="butterfly" aria-hidden="true">🦋</div>
  <div class="butterfly" aria-hidden="true">🦋</div>
  <div class="butterfly" aria-hidden="true">🦋</div>

  <!-- Gotas de lluvia -->
  <div class="drop" aria-hidden="true"></div>
  <div class="drop" aria-hidden="true"></div>
  <div class="drop" aria-hidden="true"></div>

  <section class="login-container" aria-labelledby="login-title">
    <h1 id="login-title">Iniciar Sesión</h1>
    <p>Ingresa tu correo para acceder a tu cuenta PETRICOR</p>
    <form action="login_process.php" method="POST" autocomplete="off" aria-describedby="login-desc">
      <label for="email">Correo electrónico</label>
      <input type="email" id="email" name="correo" placeholder="tucorreo@ejemplo.com" required autocomplete="email" />

      <button type="submit" aria-label="Iniciar sesión">Entrar</button>
    </form>
    <div class="links">
      ¿No tienes cuenta? <a href="usuarios.html">Regístrate aquí</a><br />
      <a href="inicio.html">Volver a Inicio</a>
    </div>
  </section>
</body>
</html>



