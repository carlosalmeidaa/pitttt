<?php
include_once("conexao.php");

if (
  isset($_POST["email"]) &&
  isset($_POST["password"]) &&
  isset($_POST["username"]) &&
  isset($_POST["name"]) &&
  isset($_POST["telefone"]) &&
  isset($_POST["dat_nasc"]) &&
  isset($_POST["nome_cachorro"])
) {
  if (strlen($_POST["email"]) == 0) {
    echo "<script>alert(\"Preencha seu email\")</script>";
  } else if (strlen($_POST["password"]) == 0) {
    echo "<script>alert(\"Preencha sua senha\")</script>";
  } else if (strlen($_POST["username"]) == 0) {
    echo "<script>alert(\"Preencha seu username\")</script>";
  } else if (strlen($_POST["name"]) == 0) {
    echo "<script>alert(\"Preencha seu nome\")</script>";
  } else if (strlen($_POST["telefone"]) == 0) {
    echo "<script>alert(\"Preencha seu telefone\")</script>";
  } else if (strlen($_POST["dat_nasc"]) == 0) {
    echo "<script>alert(\"Preencha seu dat_nasc\")</script>";
  } else if (strlen($_POST["nome_cachorro"]) == 0) {
    echo "<script>alert(\"Preencha seu nome_cachorro\")</script>";
  } else {

    $email = $mysqli->real_escape_string($_POST["email"]);
    $password = $mysqli->real_escape_string($_POST["password"]);
    $username = $mysqli->real_escape_string($_POST["username"]);
    $name = $mysqli->real_escape_string($_POST["name"]);
    $telefone = $mysqli->real_escape_string($_POST["telefone"]);
    $dat_nasc = $mysqli->real_escape_string($_POST["dat_nasc"]);
    $nome_cachorro = $mysqli->real_escape_string($_POST["nome_cachorro"]);

    $sql = "INSERT INTO usuarios (email, password, username, name, telefone, data_nascimento, nome_cachorro) VALUES ('$email', '$password', '$username', '$name', '$telefone', '$dat_nasc', '$nome_cachorro')";

    $sql_query = $mysqli->query($sql) or die($mysqli->error);

    if ($sql_query) {
      header("Location: login.php");
    } else {
      echo "falha ao cadastrar usuario!";
    }

  }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página de Cadastro</title>
  <!-- <link rel="stylesheet" type="text/css" href="cadastro.css"> -->
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

  <style>
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

    html,
    body {
      height: 100%;
    }

    body {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-align: center;
      align-items: center;
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #f5f5f5;
    }
  </style>
</head>

<body>
  <form class="form-signin" method="post">
    <h1 class="h3 mb-3 font-weight-normal">Registre-se na plataforma</h1>

    <label for="" class="sr-only">Nome de Usuário</label>
    <input type="text" id="" class="form-control" placeholder="username" name="username" required autofocus />

    <label for="" class="sr-only">Nome</label>
    <input type="text" id="" class="form-control" placeholder="nome" name="name" required autofocus />

    <label for="inputmail" class="sr-only">Email</label>
    <input type="email" id="" class="form-control" placeholder="email" name="email" required autofocus />

    <label for="" class="sr-only">Password</label>
    <input type="password" id="" class="form-control" placeholder="*****" name="password" required autofocus />

    <label for="" class="sr-only">Telefone</label>
    <input type="text" id="" class="form-control" placeholder="telefone" name="telefone" required autofocus />

    <label for="" class="sr-only">Data de nascimento</label>
    <input type="date" id="" class="form-control" placeholder="data de nascimento" name="dat_nasc" required autofocus />

    <label for="" class="sr-only">Nome do Cachorro</label>
    <input type="text" id="" class="form-control" placeholder="nome do seu cachorro..." name="nome_cachorro" required
      autofocus />

    <button class="btn btn-lg w-100 mt-3 btn-primary btn-block" type="submit">
      Cadastrar
    </button>
    <p class="mt-3 text-muted" style="text-align: center;">Se voce já possui uma conta?<a href="login.php"> Faça
        Login</a></p>
  </form>
</body>

</html>