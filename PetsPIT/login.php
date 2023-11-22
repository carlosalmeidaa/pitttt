<?php
session_start();
include_once("conexao.php");

if (isset($_POST["email"]) || isset($_POST["password"])) {
  if (strlen($_POST["email"]) == 0) {
    echo "Preencha seu email";
  } else if (strlen($_POST["password"]) == 0) {
    echo "Preencha sua senha";
  } else {

    $email = $mysqli->real_escape_string($_POST["email"]);
    $password = $mysqli->real_escape_string($_POST["password"]);

    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND password = '$password' ;";

    $sql_query = $mysqli->query($sql) or die($mysqli->error);

    $quantidade = $sql_query->num_rows;

    if ($quantidade == 1) {
      $usuario = $sql_query->fetch_assoc();

      $_SESSION['id'] = $usuario['id'];
      $_SESSION['name'] = $usuario['name'];

      if (isset($_SESSION['id']) && !empty($_SESSION['id']) && isset($_SESSION['name']) && !empty($_SESSION['name'])) {
        // Redirecionar para a página privada
        header("Location: privado.php");
        exit(); // Certifique-se de encerrar o script após o redirecionamento
      } else {
        echo "Falha ao configurar a sessão";
      }


    } else {
      echo "<script>alert(\"Email ou senha inválidos!\")</script>";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

  <style>
    a {
      text-decoration: none !important;
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

    #voltar {
      position: absolute;
      top: 5px;
      left: 5px;
    }
  </style>

</head>

<body>
  <a href="index.html" id="voltar">Voltar</a>
  <form class="form-signin" method="post">
    <h1 class="h3 mb-3 font-weight-normal">Faça Login na plataforma</h1>

    <label for="inputEmail" class="sr-only">Email</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Email" name="email" required autofocus />

    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required />

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me" /> Lembrar me
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block w-100" type="submit">
      Login
    </button>
    <p class="mt-3  text-muted" style="text-align: center;">Se você não possui uma conta<a href="cadastro.php">
        Registre-se</a></p>
  </form>
</body>

</html>