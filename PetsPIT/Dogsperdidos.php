<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Perda de Animais Domésticos</title>
  <link rel="stylesheet" href="./esqueci.css" />
  <style>
    #search-form {
      display: flex;
      align-items: center;
    }

    .main {
      max-width: 1140px;
      width: 100%;
      margin: 0 auto;
    }

    a {
      text-decoration: none !important;
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
          <li><a href="Dogsperdidos.php">Encontre seu pet</a></li>
          <li><a href="login.php">Login</a></li>
          <li><a href="cadastro.php">Cadastrar-se</a></li>
        </ul>
      </nav>
    </section>
  </header>


  <main class="main">
    <form action="" method="get" id="seacrh-form">
      <div class="mt-5">
        <label for="">Pesquise o nome do seu pet</label>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="pesquise o nome do pet..."
            aria-label="Recipient's username" aria-describedby="button-addon2" name="search" value="<?php if (isset($_GET['search'])) {
              echo $_GET['search'];
            } ?>">
          <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Pesquisar</button>
        </div>
      </div>

    </form>
    <section id="content">


      <?php
      require('conexao.php');

      if (isset($_GET['search'])) {
        $filteredValues = $_GET['search'];

        $sql = "SELECT * FROM pets where nome like '%$filteredValues%' ";

        $sql_query = $mysqli->query($sql) or die($mysqli->error);

        $quantidade = $sql_query->num_rows;

        if ($quantidade <= 0) {
          echo "<p style='text-align: center; margin-top: 20px;'>Não há animais perdidos</p>";
        } else {
          while ($row = $sql_query->fetch_assoc()) {
            echo "<div class='card'>";
            echo "<img src='" . $row['imagem'] . "' alt='" . $row['nome'] . "'>";
            echo "<div class='card-body'>";
            echo "<h3>" . $row['nome'] . "</h3>";
            echo "<p id='especie'>" . $row['especie'] . "</p>";
            echo "<p>Cor: " . $row['cor'] . "</p>";
            echo "<p>Idade: " . $row['idade'] . "</p>";
            echo "<p>Último Local Visto: " . $row['ultimo_local_visto'] . "</p>";
            echo "</div>";
            echo "</div>";
          }
        }
      } else {
        $sql = "SELECT * FROM pets ";

        $sql_query = $mysqli->query($sql) or die($mysqli->error);

        $quantidade = $sql_query->num_rows;

        if ($quantidade <= 0) {
          echo "<p style='text-align: center; margin-top: 20px;'>Não há animais perdidos</p>";
        } else {
          while ($row = $sql_query->fetch_assoc()) {
            echo "<div class='card'>";
            echo "<img src='" . $row['imagem'] . "' alt='" . $row['nome'] . "'>";
            echo "<div class='card-body'>";
            echo "<h3>" . $row['nome'] . "</h3>";
            echo "<p id='especie'>" . $row['especie'] . "</p>";
            echo "<p>Cor: " . $row['cor'] . "</p>";
            echo "<p>Idade: " . $row['idade'] . "</p>";
            echo "<p>Último Local Visto: " . $row['ultimo_local_visto'] . "</p>";
            echo "</div>";
            echo "</div>";
          }
        }
      }
      ?>
    </section>
  </main>
</body>

</html>