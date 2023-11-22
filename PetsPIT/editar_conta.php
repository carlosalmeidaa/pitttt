<?php
include_once("conexao.php");

include("middleware.php");

if (!isset($_SESSION)) {
  session_start();
}

if (
  isset($_POST["email"]) &&
  isset($_POST["password"]) &&
  isset($_POST["username"]) &&
  isset($_POST["name"]) &&
  isset($_POST["telefone"]) &&
  isset($_POST["dat_nasc"]) &&
  isset($_POST["nome_cachorro"])
) {

  $email = $mysqli->real_escape_string($_POST["email"]) or null;
  $password = $mysqli->real_escape_string($_POST["password"]) or null;
  $username = $mysqli->real_escape_string($_POST["username"]) or null;
  $name = $mysqli->real_escape_string($_POST["name"]) or null;
  $telefone = $mysqli->real_escape_string($_POST["telefone"]) or null;
  $dat_nasc = $mysqli->real_escape_string($_POST["dat_nasc"]) or null;
  $nome_cachorro = $mysqli->real_escape_string($_POST["nome_cachorro"]) or null;

  if (isset($_SESSION['id']) and empty($_SESSION['id'])) {
    die('Voce precisa estar logado para editar seu perfil');
  }

  $id = $_SESSION['id'];

  $sql = "UPDATE usuarios SET";
  $updates = [];

  if (!empty($email)) {
    $updates[] = "email = '$email'";
  }

  if (!empty($password)) {
    $updates[] = "password = '$password'";
  }

  if (!empty($username)) {
    $updates[] = "username = '$username'";
  }

  if (!empty($name)) {
    $updates[] = "name = '$name'";
  }

  if (!empty($telefone)) {
    $updates[] = "telefone = '$telefone'";
  }

  if (!empty($dat_nasc)) {
    $updates[] = "data_nascimento = '$dat_nasc'";
  }

  if (!empty($nome_cachorro)) {
    $updates[] = "nome_cachorro = '$nome_cachorro'";
  }

  $sql .= " " . implode(", ", $updates);
  $sql .= " WHERE id = '$id'";

  $sql_query = $mysqli->query($sql) or die($mysqli->error);

  // $sql = "UPDATE usuarios set email = '$email', password = '$password', username = '$username', name = '$name', telefone = '$telefone', data_nascimento = '$dat_nasc', nome_cachorro = '$nome_cachorro' WHERE id = '$id'";

  // $sql_query = $mysqli->query($sql) or die($mysqli->error);

  if ($sql_query) {
    echo "<script>alert('Alterado com sucesso!')</script>";
  } else {
    echo "falha ao cadastrar usuario!";
  }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Perfil</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    a {
      text-decoration: none !important;
    }

    ul,
    li,
    ol {
      list-style: none;
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
    <form class="form-signin" method="post">
      <h1 class="h3 mb-3 font-weight-normal">Editar Perfil</h1>

      <label for="" class="sr-only">Nome de Usuário</label>
      <input type="text" id="" class="form-control" placeholder="username" name="username" autofocus />

      <label for="" class="sr-only">Nome</label>
      <input type="text" id="" class="form-control" placeholder="nome" name="name" autofocus />

      <label for="inputmail" class="sr-only">Email</label>
      <input type="email" id="" class="form-control" placeholder="email" name="email" autofocus />

      <label for="" class="sr-only">Password</label>
      <input type="password" id="" class="form-control" placeholder="*****" name="password" autofocus />

      <label for="" class="sr-only">Telefone</label>
      <input type="text" id="" class="form-control" placeholder="telefone" name="telefone" autofocus />

      <label for="" class="sr-only">Data de nascimento</label>
      <input type="date" id="" class="form-control" placeholder="data de nascimento" name="dat_nasc" autofocus />

      <label for="" class="sr-only">Nome do Cachorro</label>
      <input type="text" id="" class="form-control" placeholder="nome do seu cachorro..." name="nome_cachorro"
        autofocus />

      <button class="btn btn-lg w-100 mt-3 btn-primary btn-block" type="submit">
        Atualizar
      </button>

    </form>

    <form action="deletar-conta.php">
      <button class="btn btn-lg w-100 mt-3 btn-danger btn-block" type="submit">
        Deletar Conta
      </button>
    </form>
  </main>
</body>

</html>