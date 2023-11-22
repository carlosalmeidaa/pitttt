<?php
include("conexao.php");
include("middleware.php");


if (
  isset($_POST["nome"]) &&
  isset($_POST["especie"]) &&
  isset($_POST["cor"]) &&
  isset($_POST["idade"]) &&
  isset($_POST["ultimo_local_visto"]) &&
  isset($_POST["imagem"]) &&
  isset($_POST["telefone"])
) {
  if (strlen($_POST["nome"]) == 0) {
    echo "<script>alert(\"Preencha seu nome\")</script>";
  } else if (strlen($_POST["especie"]) == 0) {
    echo "<script>alert(\"Preencha sua especie\")</script>";
  } else if (strlen($_POST["cor"]) == 0) {
    echo "<script>alert(\"Preencha sua cor\")</script>";
  } else if (($_POST["idade"]) == 0) {
    echo "<script>alert(\"Preencha sua idade\")</script>";
  } else if (strlen($_POST["ultimo_local_visto"]) == 0) {
    echo "<script>alert(\"Preencha o ultimo local visto do pet\")</script>";
  } else if (strlen($_POST["imagem"]) == 0) {
    echo "<script>alert(\"Preencha a imagem do pet\")</script>";
  } else if (strlen($_POST["telefone"]) == 0) {
    echo "<script>alert(\"Preencha o telefone de cotnato\")</script>";
  } else {

    if (!isset($_SESSION)) {
      session_start();
    }

    $id = $_SESSION['id'];

    $nome = $mysqli->real_escape_string($_POST["nome"]);
    $especie = $mysqli->real_escape_string($_POST["especie"]);
    $cor = $mysqli->real_escape_string($_POST["cor"]);
    $idade = $mysqli->real_escape_string($_POST["idade"]);
    $quantidade_local_visto = $mysqli->real_escape_string($_POST["ultimo_local_visto"]);
    $imagem = $mysqli->real_escape_string($_POST["imagem"]);
    $telefone = $mysqli->real_escape_string($_POST["telefone"]);

    $sql = "INSERT INTO pets (nome, especie, cor, idade, ultimo_local_visto, imagem, id_usuario, telefone) VALUES ('$nome', '$especie', '$cor', '$idade', '$quantidade_local_visto', '$imagem', '$id', '$telefone');";

    $sql_query = $mysqli->query($sql) or die($mysqli->error);

    if ($sql_query) {
      echo "<script>alert(\"Pet cadastrado com sucesso!\")</script>";
    } else {
      echo "falha ao cadastrar pet!";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastrar Pets</title>

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
      text-decoration: none !important;
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

    .form {
      display: flex;
    }

    .form-signin {
      width: 100%;
      max-width: 400px;
      padding: 15px;
      margin: auto;
    }

    .form-signin .checkbox {
      font-weight: 400;
    }

    .form-signin .form-control {
      position: relative;
      box-sizing: border-box;
      height: auto;
      padding: 10px;
      font-size: 16px;
    }

    .form-signin .form-control:focus {
      z-index: 2;
    }

    .form-signin input[type="email"] {
      margin-bottom: -1px;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }

    .card {
      border: 1px solid #2f4858;
      overflow: hidden;
      border-radius: 10px;
      width: 250px;

      height: 450px;
    }

    .card img {
      width: 100%;
      height: 150px;
    }

    .card-body h3 {
      font-weight: 700;
      font-size: 24px;
    }

    .card-body {
      padding: 10px;
    }

    #especie {
      font-size: 18px;
      font-weight: 500;
      color: rgb(31, 31, 31);
    }

    .card-body p {
      padding: 5px 0px;
    }
  </style>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</head>

<body>

  <header>
    <section class="container__center">
      <nav class="center__row">
        <a href="index.html">
          <h1 class="logo">PetsPIT</h1>
        </a>
        <ul class="nav__list">
          <li><a href="index.html">Home</a></li>
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
    <form class="form-signin" method="post">
      <h1 class="h3 mb-3 font-weight-normal">Cadastre o pet</h1>

      <label for="inputEmail" class="sr-only">Nome</label>
      <input type="text" id="inputEmail" class="form-control" placeholder="nome" name="nome" required autofocus />

      <label for="inputPassword" class="sr-only">Especie</label>
      <input type="text" id="inputPassword" class="form-control" placeholder="Especie" name="especie" required />

      <label for="inputPassword" class="sr-only">Cor</label>
      <input type="text" id="inputPassword" class="form-control" placeholder="cor" name="cor" required />

      <label for="inputPassword" class="sr-only">Idade</label>
      <input type="number" id="inputPassword" class="form-control" placeholder="Idade" name="idade" required />

      <label for="inputPassword" class="sr-only">Ultimo local visto</label>
      <input type="text" id="inputPassword" class="form-control" placeholder="Ultimo local visto"
        name="ultimo_local_visto" required />

      <label for="inputPassword" class="sr-only">Telefone de Contato</label>
      <input type="text" id="inputPassword" class="form-control" placeholder="31 00000-0000" name="telefone" required />

      <label for="inputPassword" class="sr-only">Url da Imagem</label>
      <input type="text" id="inputPassword" class="form-control" placeholder="Url da imagem" name="imagem" required />

      <!-- <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me" /> Lembrar me
        </label>
      </div> -->
      <button class="btn btn-lg mt-3 btn-primary btn-block w-100" type="submit">
        Cadastrar
      </button>

      <a href="pets_cadastrados.php" style="text-align: center;">Editar Pets Cadastrados</a>
    </form>
  </main>


</body>

</html>