<?php
include_once("middleware.php");
include_once("conexao.php");

if (isset($_POST["pass1"]) && isset($_POST["pass2"])) {
  if (strlen($_POST["pass1"]) == 0) {
    echo "<script>alert('Preencha sua nova senha');</script>";
  } else if (strlen($_POST["pass2"]) == 0) {
    echo "Confirme sua nova senha";
  } else {

    $pass1 = $mysqli->real_escape_string($_POST["pass1"]);
    $pass2 = $mysqli->real_escape_string($_POST["pass2"]);

    if ($pass1 == $pass2) {
      $sql = "UPDATE usuarios SET password = '$pass1' WHERE id = " . $_SESSION['id'] . ";";
      $sql_query = $mysqli->query($sql) or die($mysqli->error);

      echo "<script>alert('Senha alterada com sucesso!');</script>";
    }

  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <title>Recuperar Senha</title>
  <link rel="stylesheet" href="esqueci.css" />
  <style>
    a {
      text-decoration: none !important;
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
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</head>

<body>
  <?php
  include_once("components/header.php");
  ?>


  <div class="content">
    <form class="form-signin" method="post">
      <h1 class="h3 mb-3 font-weight-normal">Redefinir senha</h1>

      <label for="inputEmail" class="sr-only">Nova senha</label>
      <input type="password" id="inputEmail" class="form-control" placeholder="nova senha" name="pass1" required
        autofocus />

      <label for="inputPassword" class="sr-only">Confirmar senha</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="confirmar senha" name="pass2"
        required />

      <button class="btn btn-lg mt-3 btn-primary btn-block w-100" type="submit">
        Trocar senha
      </button>
    </form>
  </div>
</body>

</html>