<?php
include_once("middleware.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pets Cadastrados</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
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

    .content {
      max-width: 1140px;
      margin: 20px auto 10px auto;
    }

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

    :root {
      --red: #f26419;
      --orange: #f6ae2d;
      --dark-blue: #33658a;
      --light-blue: #86bbd8;
      --dark: #2f4858;
    }

    a {
      text-decoration: none;
    }

    ul,
    ol,
    li {
      list-style: none;
    }

    .card {
      border: 1px solid #2f4858;
      overflow: hidden;
      border-radius: 10px;
      width: 250px;
      height: fit-content;
    }

    button {
      background: transparent;
      padding: 0;
      border: none;
      outline: none;
      cursor: pointer;
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

    /* 
    .card-body p {
      padding: 5px 0px;
    } */

    #content {
      padding: 30px;
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 20px;
      max-width: 1140px;
      width: 100%;
      margin: 0 auto;
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
    <div id="content">
      <?php
      require('conexao.php');


      if (!isset($_SESSION)) {
        session_start();
      }

      if (!isset($_SESSION['id'])) {
        header('Location: index.php');
      }

      $id_usuario = $_SESSION['id'];

      $sql = "SELECT * FROM pets WHERE `id_usuario` = '$id_usuario'";

      $sql_query = $mysqli->query($sql) or die($mysqli->error);

      $quantidade = $sql_query->num_rows;

      if ($quantidade <= 0) {
        echo "<p style='text-align: center; margin-top: 20px;'>Não há animais perdidos</p>";
      } else {
        while ($row = $sql_query->fetch_assoc()) {
          $id = $row['id'];
          echo "<div class='card'>";
          echo "<img src='" . $row['imagem'] . "' alt='" . $row['nome'] . "'>";
          echo "<div class='card-body'>";
          echo "<h3>" . $row['nome'] . "</h3>";
          echo "<p id='especie'>" . $row['especie'] . "</p>";
          echo "<p>Cor: " . $row['cor'] . "</p>";
          echo "<p>Idade: " . $row['idade'] . "</p>";
          echo "<p>Telefone de Contato: " . $row['telefone'] . "</p>";
          echo "<p>" . $row['ultimo_local_visto'] . "</p>";
          echo "<a href='deleta-pets.php?deleteid=" . $id . "' ><i class=\"fa-solid fa-trash\"></i> </a>";
          echo "</div>";
          echo "</div>";
        }
        // while ($row = $sql_query->fetch_assoc()) {
        //   echo "<div class='card'>";
        //   echo "<img src='" . $row['imagem'] . "' alt='" . $row['nome'] . "'>";
        //   echo "<div class='card-body'>";
        //   echo "<h3>" . $row['nome'] . "</h3>";
        //   echo "<p id='especie'>" . $row['especie'] . "</p>";
        //   echo "<p>Cor: " . $row['cor'] . "</p>";
        //   echo "<p>Idade: " . $row['idade'] . "</p>";
        //   echo "<p>" . $row['ultimo_local_visto'] . "</p>";
        //   echo "<button onclick='deletePet(" . $row['id'] . ")><i class=\"fa-solid fa-trash\"></i></button>";
        //   echo "</div>";
        //   echo "</div>";
        // }
      }
      ?>
    </div>
  </main>
  <script>
    function deletePet(petId) {
      if (confirm("Tem certeza que deseja excluir este animal?")) {
        // Enviar solicitação AJAX para excluir o pet
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "deleta-pets.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
          if (xhr.readyState == 4 && xhr.status == 200) {
            // Recarregar a página após a exclusão bem-sucedida
            window.location.reload();
          }
        };
        xhr.send("id=" + petId);
      }
    }
  </script>
</body>

</html>