<?php
include("middleware.php");

if (!isset($_SESSION)) {
  session_start();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Painel</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    :root {
      --red: #f26419;
      --orange: #f6ae2d;
      --dark-blue: #33658a;
      --light-blue: #86bbd8;
      --dark: #2f4858;
    }

    body {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }

    a {
      text-decoration: none;
    }

    ul,
    ol,
    li {
      list-style: none;
    }

    .container__center {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      width: 100%;
      height: 10vh;
      background: url(imgs/bg.jpg);
      background-position: center;
      background-size: cover;
    }

    .center__row {
      display: flex;
      justify-content: space-between;
      max-width: 1140px;
      width: 100%;
      align-items: center;
    }

    .nav__list {
      display: flex;
      gap: 10px;
      align-items: center;
    }

    .align__left {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: flex-start;
    }

    /* .container__center nav {
  height: 10%;
  width: 80%;
} */

    .container__center nav .logo {
      font-size: 24px;
      color: var(--orange);
    }

    .container__center nav a {
      color: var(--light-blue);
      margin: 0 20px;
    }

    .container__center nav a:hover {
      color: var(--orange);
    }

    h1 {
      font-weight: 300;
      font-size: 40px;
      letter-spacing: 2px;
      color: var(--dark);
    }

    p {
      font-size: 18px;
      letter-spacing: 2px;
      line-height: 22px;
      margin: 2rem 0;
      color: var(--dark);
    }

    .content {
      max-width: 1140px;
      margin: 20px auto 10px auto;
    }
  </style>
</head>

<body>
  <header>
    <section class="container__center">
      <nav class="center__row">
        <a href="index.html">
          <h1 class="logo">PetsPIT</h1>
        </a>
        <ul class="nav__list">
          <li><a href="privado.php">Home</a></li>
          <li><a href="cadastrar_pets.php">Cadastrar Pet</a></li>
          <li><a href="esqueci.php">Esqueci minha senha</a></li>
          <!-- <li><a href="exclusao.html">Excluir cadastro</a></li> -->
          <li><a href="editar_conta.php">Editar Conta</a></li>
          <li><a href="logout.php">Sair</a></li>
        </ul>
      </nav>
    </section>
  </header>

  <main class="content">
    <h1 style="text-align: center;">Olá
      <?php
      if (isset($_SESSION['name']) && !empty($_SESSION['name'])) {
        echo "<h1 style=\"text-align: center;\">Olá {$_SESSION['name']}</h1>";
      } else {
        echo "<p style=\"text-align: center;\">Nome não disponível</p>";
      }
      ?>
    </h1>
  </main>
</body>

</html>